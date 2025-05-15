<?php

namespace App\Livewire\Vehicle;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SearchVehicle extends Component
{
    #[Validate('required|filled', as: 'VRN')]
    public $vrn = '';

    public function search(): void
    {
        $this->validate();

        $this->vrn = strtoupper($this->vrn);
        $this->vrn = str_replace(' ', '', $this->vrn);

        $this->dispatch('searched', $this->vrn);
    }

    #[On('valid')]
    public function saveVehicle(): void
    {
        $vehicle = Vehicle::firstOrCreate(['vrn' => $this->vrn]);

        $user = Auth::user();
        $user->searches()->syncWithoutDetaching([$vehicle->id]);
    }

    public function usePrevious($vrn): void
    {
        $this->vrn = $vrn;
        $this->search();
    }

    public function render()
    {
        return view('livewire.vehicle.search-vehicle');
    }
}
