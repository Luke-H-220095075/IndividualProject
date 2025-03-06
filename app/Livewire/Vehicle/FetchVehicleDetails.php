<?php

namespace App\Livewire\Vehicle;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class FetchVehicleDetails extends Component
{
    public $taxStatus = '';
    public $taxDueDate = '';
    public $motStatus = '';
    public $motExpiryDate = '';
    public $make = '';
    public $yearOfManufacture = '';
    public $engineCapacity = '';
    public $co2Emissions = '';
    public $fuelType = '';
    public $colour = '';
    public $typeApproval = '';
    public $revenueWeight = '';

    #[On('searched')]
    public function fetch($vrn)
    {
        $response = Http::withHeaders(['x-api-key' => config('services.ves.key')])
            ->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
                'registrationNumber' => $vrn
            ]);

        if ($response->successful()) {
            $this->dispatch('valid');
        }

        $this->taxStatus = $response->json('taxStatus') ?? 'Not Found';
        $this->taxDueDate = $response->json('taxDueDate') ?? 'Not Found';
        $this->motStatus = $response->json('motStatus') ?? 'Not Found';
        $this->motExpiryDate = $response->json('motExpiryDate') ?? 'Not Found';
        $this->make = $response->json('make') ?? 'Not Found';
        $this->yearOfManufacture = $response->json('yearOfManufacture') ?? 'Not Found';
        $this->engineCapacity = $response->json('engineCapacity') ?? 'Not Found';
        $this->co2Emissions = $response->json('co2Emissions') ?? 'Not Found';
        $this->fuelType = $response->json('fuelType') ?? 'Not Found';
        $this->colour = $response->json('colour') ?? 'Not Found';
        $this->typeApproval = $response->json('typeApproval') ?? 'Not Found';
        $this->revenueWeight = $response->json('revenueWeight') ?? 'Not Found';
    }

    public function render()
    {
        return view('livewire.vehicle.fetch-vehicle-details');
    }
}
