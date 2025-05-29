<?php

namespace App\Livewire\Vehicle;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class FetchVehicleDetails extends Component
{
    public $taxStatus = '-';
    public $taxDueDate = '-';
    public $motStatus = '-';
    public $motExpiryDate = '-';
    public $make = '-';
    public $yearOfManufacture = '-';
    public $engineCapacity = '-';
    public $co2Emissions = '-';
    public $fuelType = '-';
    public $colour = '-';
    public $typeApproval = '-';
    public $revenueWeight = '-';
    public $model = '-';
    public $hasOutstandingRecall = '-';

    #[On('searched')]
    public function fetch($vrn): void
    {
        $vehicleData = Http::withHeaders(['x-api-key' => config('services.ves.key')])
            ->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
                'registrationNumber' => $vrn
            ]);

        if ($vehicleData->successful()) {
            $this->dispatch('valid');
        }

        $this->taxStatus = $vehicleData->json('taxStatus') ?? 'Not Found';
        $this->taxDueDate = $vehicleData->json('taxDueDate') ?? 'Not Found';
        $this->motStatus = $vehicleData->json('motStatus') ?? 'Not Found';
        $this->motExpiryDate = $vehicleData->json('motExpiryDate') ?? 'Not Found';
        $this->make = $vehicleData->json('make') ?? 'Not Found';
        $this->yearOfManufacture = $vehicleData->json('yearOfManufacture') ?? 'Not Found';
        $this->engineCapacity = $vehicleData->json('engineCapacity') ?? 'Not Found';
        $this->co2Emissions = $vehicleData->json('co2Emissions') ?? 'Not Found';
        $this->fuelType = $vehicleData->json('fuelType') ?? 'Not Found';
        $this->colour = $vehicleData->json('colour') ?? 'Not Found';
        $this->typeApproval = $vehicleData->json('typeApproval') ?? 'Not Found';
        $this->revenueWeight = $vehicleData->json('revenueWeight') ?? 'Not Found';

        if (Cache::get('motToken')) {
            $motToken = Cache::get('motToken');
        } else {
            $motToken = Http::asForm()
                ->post('https://login.microsoftonline.com/a455b827-244f-4c97-b5b4-ce5d13b4d00c/oauth2/v2.0/token', [
                    'grant_type' => 'client_credentials',
                    'client_id' => config('services.mot.id'),
                    'client_secret' => config('services.mot.secret'),
                    'scope' => 'https://tapi.dvsa.gov.uk/.default'
                ]);
            $motToken = $motToken->json()['access_token'];
            Cache::put('motToken', $motToken, now()->addMinutes(60));
        }

        $motHistory = Http::withToken($motToken)
            ->withHeader('X-API-Key', config('services.mot.key'))
            ->get("https://history.mot.api.gov.uk/v1/trade/vehicles/registration/$vrn");

        $this->model = $motHistory->json('model') ?? 'Not Found';
        $this->hasOutstandingRecall = $motHistory->json('hasOutstandingRecall') ?? 'Not Found';

        $this->dispatch('fetched', $motHistory->json('motTests'));
        $this->storeApiData($vrn);
    }

    public function storeApiData($vrn): void
    {
        $apiData = json_encode(
            $this->only('make', 'model', 'fuelType', 'yearOfManufacture', 'engineCapacity'));

        Vehicle::query()->where('vrn', $vrn)
            ->update(['api_data' => $apiData]);
    }

    public function render(): View
    {
        return view('livewire.vehicle.fetch-vehicle-details');
    }
}
