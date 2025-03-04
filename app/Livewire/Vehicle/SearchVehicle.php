<?php

namespace App\Livewire\Vehicle;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SearchVehicle extends Component
{
    #[Validate('required| ')]
    public $vrn = '';

    public function usePrevious($vrn)
    {
        $this->vrn = $vrn;
    }

    public function search()
    {
        $this->validate();

        $vehicle = Vehicle::firstOrCreate(['vrn' => $this->vrn]);
        $vehicle->save();

        $user = Auth::user();
        $user->searches()->syncWithoutDetaching([$vehicle->id]);
    }

    public function render()
    {
        return view('livewire.vehicle.search-vehicle');
    }
}
