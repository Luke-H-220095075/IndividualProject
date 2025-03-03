<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SearchVehicle extends Component
{
    #[Validate('required| ')]
    public $vrn = '';

    public function search() {
        $this->validate();

        $vehicle = Vehicle::firstOrCreate(['vrn' => $this->vrn]);

        $vehicle->save();
    }

    public function render()
    {
        return view('livewire.search-vehicle');
    }
}
