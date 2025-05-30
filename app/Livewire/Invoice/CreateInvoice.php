<?php

namespace App\Livewire\Invoice;

use App\Models\Booking;
use App\Models\Invoice;
use Livewire\Component;

class CreateInvoice extends Component
{
    public $bookings = [];
    public $bookingId = '';
    public $selectedBooking = null;

    public function mount(): void
    {
        $this->bookings = Booking::query()->where('invoice_id', null)
            ->orderBy('date')->orderBy('time')->get();
    }

    public function fetchBooking(): void
    {
        $this->selectedBooking = Booking::query()->find($this->bookingId);

        $this->dispatch('bookingFetched', $this->bookingId);
    }

    public function createInvoice(): void
    {
        $invoice = Invoice::query()->create([
            'title' => $this->selectedBooking->type. ' - ' .$this->selectedBooking->vehicle->vrn,
        ]);

        $invoice->booking()->save($this->selectedBooking);

        $this->dispatch('invoiceCreated', $invoice->id);
    }

    public function render()
    {
        return view('livewire.invoice.create-invoice');
    }
}
