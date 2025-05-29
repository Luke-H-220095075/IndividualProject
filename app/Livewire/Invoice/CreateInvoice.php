<?php

namespace App\Livewire\Invoice;

use App\Models\Booking;
use App\Models\Invoice;
use Livewire\Component;

class CreateInvoice extends Component
{
    public $bookings = [];
    public $bookingId = '';
    public $booking = null;

    public function mount(): void
    {
        $this->bookings = Booking::query()->where('invoice_id', null)
            ->orderBy('date')->orderBy('time')->get();
    }

    public function fetchBooking(): void
    {
        $this->booking = Booking::query()->find($this->bookingId);
    }

    public function createInvoice(): void
    {
        $invoice = Invoice::query()->create([
            'title' => $this->booking->type. ' - ' .$this->booking->vehicle->vrn,
        ]);

        $invoice->booking()->save($this->booking);
    }

    public function render()
    {
        return view('livewire.invoice.create-invoice');
    }
}
