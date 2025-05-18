<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class SelectCustomer extends Component
{
    public $name = '';
    public $phone = '';
    public $email = '';
    public $address = '';
    public $customers = [];
    public $customerId = null;


    public function mount()
    {
        $this->customers = Customer::all();
    }

    public function fillInputs()
    {
        $customer = Customer::query()->find($this->customerId);
        $this->name = $customer->name ?? '';
        $this->phone = $customer->phone ?? '';
        $this->email = $customer->email ?? '';
        $this->address = $customer->address ?? '';
    }

    public function saveCustomer()
    {
        $customer = Customer::query()->updateOrCreate(['id' => $this->customerId], [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
        ]);

        $this->mount();
        $this->customerId = $customer->id;
    }

    public function render()
    {
        return view('livewire.customer.select-customer');
    }
}
