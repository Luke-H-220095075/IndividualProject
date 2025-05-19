<?php

namespace App\Livewire\Customer;

use App\Models\Vehicle;
use Illuminate\View\View;
use Livewire\Component;

class CustomerVehicles extends Component
{
    public $unassignedVehicles = [];

    public function mount(): void
    {
        $this->fetchUnassignedVehicles();
    }

    public function fetchUnassignedVehicles(): void
    {
        $this->unassignedVehicles = Vehicle::query()->where('customer_id', null)->get();
    }

    public function render(): View
    {
        return view('livewire.customer.customer-vehicles');
    }
}
