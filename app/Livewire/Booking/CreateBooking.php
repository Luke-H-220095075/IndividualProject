<?php

namespace App\Livewire\Booking;

use App\Models\Customer;
use App\Models\Booking;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\View\View;
use Label84\HoursHelper\Facades\HoursHelper;
use Livewire\Component;

class CreateBooking extends Component
{
    public $customers = [];
    public $vehicles = [];
    public $times = [];
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

    public function fetchTimes(): void
    {
        $bookingTimes = Booking::query()->where('date', $this->date)->get('time');

        $takenTimes = $bookingTimes->map(function ($time) {
            return [$time->time, Carbon::parse($time->time)->addMinutes(59)->toTimeString()];
        })->toArray();

        $takenTimes[] = ['12:30', '13:29'];

        $times = HoursHelper::create('08:30', '17:00', 60, 'H:i', $takenTimes);
        $this->times = $times->toArray();
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
