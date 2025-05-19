<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectCustomer extends Component
{
    public $name = '';
    public $phone = '';
    public $email = '';
    public $address = '';
    public $customers = [];
    public $customerId = null;
    public $customerVehicles = [];


    public function mount(): void
    {
        $this->customers = Customer::all();
        $this->fetchCustomerVehicles();
    }

    public function fillInputs(): void
    {
        $customer = Customer::query()->find($this->customerId);
        $this->name = $customer->name ?? '';
        $this->phone = $customer->phone ?? '';
        $this->email = $customer->email ?? '';
        $this->address = $customer->address ?? '';

        $this->fetchCustomerVehicles();
        $this->dispatch('customerSelected', $this->customerId);
    }

    #[On('vehicleAssigned')]
    public function fetchCustomerVehicles(): void
    {
        $customer = Customer::query()->where('id', $this->customerId)->first();
        $this->customerVehicles = $customer->vehicles ?? [];
    }

    public function saveCustomer(): void
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

    public function render(): View
    {
        return view('livewire.customer.select-customer');
    }
}
