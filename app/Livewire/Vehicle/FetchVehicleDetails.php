<?php

namespace App\Livewire\Vehicle;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class FetchVehicleDetails extends Component
{
    public $colour = '';
    public $make = '';

    protected $listeners = ['searched' => 'fetch'];

    public function fetch()
    {
        $response = Http::withHeaders(['x-api-key' => config('services.ves.key')])
            ->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
                'registrationNumber' => 'FG59WHT'
            ]);

        $this->colour = $response->json('colour');
        $this->make = $response->json('make');
    }

    public function render()
    {
        return view('livewire.vehicle.fetch-vehicle-details');
    }
}
