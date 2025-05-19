<?php

namespace App\Livewire\Customer;

use App\Models\Vehicle;
use Livewire\Component;

class CustomerVehicles extends Component
{
    public $vehicles = [];

    public function mount()
    {
        $this->vehicles = Vehicle::all();
    }

    public function render()
    {
        return view('livewire.customer.customer-vehicles');
    }
}
