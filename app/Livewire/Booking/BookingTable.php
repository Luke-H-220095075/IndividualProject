<?php

namespace App\Livewire\Booking;

use App\Models\Booking;
use Livewire\Component;

class BookingTable extends Component
{
    public $bookings = [];

    public function mount(): void
    {
        $this->bookings = Booking::all();
    }

    public function render()
    {
        return view('livewire.booking.booking-table');
    }
}
