<?php

namespace App\Livewire\Customer;

use App\Models\Vehicle;
use Illuminate\View\View;
use Livewire\Component;

class UnassignedVehicles extends Component
{
    public $vehicles = [];

    public function mount(): void
    {
        $this->fetchVehicles();
    }

    public function fetchVehicles(): void
    {
        $this->vehicles = Vehicle::query()->where('customer_id', null)->get();
    }

    public function render(): View
    {
        return view('livewire.customer.unassigned-vehicles');
    }
}
