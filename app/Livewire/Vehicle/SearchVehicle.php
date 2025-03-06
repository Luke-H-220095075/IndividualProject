<?php

namespace App\Livewire\Vehicle;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SearchVehicle extends Component
{
    #[Validate('required|filled', as: 'VRN')]
    public $vrn = '';

    public function usePrevious($vrn): void
    {
        $this->vrn = $vrn;
        $this->search();
    }

    public function search(): void
    {
        $this->validate();

        $this->vrn = strtoupper($this->vrn);
        $this->vrn = str_replace(' ', '', $this->vrn);

        $vehicle = Vehicle::firstOrCreate(['vrn' => $this->vrn]);
        $vehicle->save();

        $user = Auth::user();
        $user->searches()->syncWithoutDetaching([$vehicle->id]);

        $this->dispatch('searched', vrn: $this->vrn);
    }

    public function render()
    {
        return view('livewire.vehicle.search-vehicle');
    }
}
