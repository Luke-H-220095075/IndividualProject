<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class CustomerTable extends Component
{
    public $customers = [];

    public function mount()
    {
        $this->customers = Customer::all();
    }

    public function render()
    {
        return view('livewire.customer.customer-table');
    }
}
