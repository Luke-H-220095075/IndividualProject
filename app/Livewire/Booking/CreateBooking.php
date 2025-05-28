<?php

namespace App\Livewire\Booking;

use App\Models\Customer;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\View\View;
use Livewire\Component;

class CreateBooking extends Component
{
    public $customers = [];
    public $vehicles = [];
    public $type = '';
    public $description = '';
    public $date = '';
    public $time = '';
    public $customerId = null;
    public $vehicleId = null;

    public function mount(): void
    {
        $this->customers = Customer::all();
        $this->fetchVehicles();
    }

    public function fetchVehicles(): void
    {
        $this->vehicles = Vehicle::query()
            ->where('customer_id', empty($this->customerId) ? null : $this->customerId)->get();
    }

    public function createBooking(): void
    {
        $booking = Booking::query()->create([
            'type' => $this->type,
            'description' => $this->description,
            'date' => $this->date,
            'time' => $this->time,
        ]);

        $customer = Customer::query()->find($this->customerId);
        $vehicle = Vehicle::query()->find($this->vehicleId);

        $booking->customer()->associate($customer);
        $booking->vehicle()->associate($vehicle);
        $booking->save();
    }

    public function render(): View
    {
        return view('livewire.booking.create-booking');
    }
}
