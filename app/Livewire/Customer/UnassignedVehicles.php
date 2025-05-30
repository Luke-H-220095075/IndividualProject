<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class UnassignedVehicles extends Component
{
    public $vehicles = [];
    public $customerId = null;

    public function mount(): void
    {
        $this->fetchVehicles();
    }

    #[On('vehicleUnassigned')]
    public function fetchVehicles(): void
    {
        $this->vehicles = Vehicle::query()->where('customer_id', null)->get();
    }

    #[On('customerSelected')]
    public function setCustomerId($id): void
    {
        $this->customerId = $id;
    }

    public function assignVehicle($vehicleId): void
    {
        if ($this->customerId != null) {
            $customer = Customer::query()->find($this->customerId);
            $vehicle = Vehicle::query()->find($vehicleId);
            $customer->vehicles()->save($vehicle);

            $this->fetchVehicles();
            $this->dispatch('vehicleAssigned');
        }
    }

    #[On('customerDeleted')]
    public function customerDeleted(): void
    {
        $this->reset();
        $this->mount();
    }

    public function render(): View
    {
        return view('livewire.customer.unassigned-vehicles');
    }
}
