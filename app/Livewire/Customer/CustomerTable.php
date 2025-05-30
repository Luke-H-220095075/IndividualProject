<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerTable extends Component
{
    public $customers = [];

    public function mount(): void
    {
        $this->fetchCustomers();
    }

    #[On('customerCreated')]
    public function fetchCustomers(): void
    {
        $this->customers = Customer::all();
    }

    public function deleteCustomer($id): void
    {
        $customer = Customer::query()->find($id);

        $customer->vehicles()->update(['customer_id' => null]);
        $customer->delete();

        $this->fetchCustomers();
        $this->dispatch('customerDeleted');
    }

    public function render()
    {
        return view('livewire.customer.customer-table');
    }
}
