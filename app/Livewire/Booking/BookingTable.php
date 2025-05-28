<?php

namespace App\Livewire\Booking;

use App\Models\Booking;
use Livewire\Attributes\On;
use Livewire\Component;

class BookingTable extends Component
{
    public $bookings = [];

    public function mount(): void
    {
        $this->fetchBookings();
    }

    #[On('bookingCreated')]
    public function fetchBookings(): void
    {
        $this->bookings = Booking::query()->orderBy('date')->orderBy('time')->get();
    }

    public function deleteBooking($id): void
    {
        Booking::query()->where('id', $id)->delete();

        $this->fetchBookings();
    }

    public function render()
    {
        return view('livewire.booking.booking-table');
    }
}
