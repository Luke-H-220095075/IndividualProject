<?php

namespace App\Livewire\Invoice;

use App\Models\Booking;
use Livewire\Component;

class CreateInvoice extends Component
{
    public $bookings = [];
    public $bookingId = '';

    public function mount(): void
    {
        $this->bookings = Booking::query()
            ->orderBy('date')->orderBy('time')->get();
    }

    public function render()
    {
        return view('livewire.invoice.create-invoice');
    }
}
