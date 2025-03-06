<?php

namespace App\Livewire\Vehicle;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class FetchVehicleDetails extends Component
{
    public $colour = '';
    public $make = '';

    #[On('searched')]
    public function fetch($vrn)
    {
        $response = Http::withHeaders(['x-api-key' => config('services.ves.key')])
            ->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
                'registrationNumber' => $vrn
            ]);

        $this->colour = $response->json('colour');
        $this->make = $response->json('make');
    }

    public function render()
    {
        return view('livewire.vehicle.fetch-vehicle-details');
    }
}
