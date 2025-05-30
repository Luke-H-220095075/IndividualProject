<?php

namespace App\Livewire\Invoice;

use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Part;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectParts extends Component
{
    public $parts = [];
    public $partId = '';
    public $selectedParts = [];

    #[On('bookingFetched')]
    public function fetchParts($id): void
    {
        $booking = Booking::query()->find($id);
        $vehicleData = json_decode($booking->vehicle->api_data);

        $this->parts = Part::query()->where('make', $vehicleData->make)
            ->where('model', $vehicleData->model)
            ->where('fuelType', $vehicleData->fuelType)
            ->get();
    }

    public function sendParts(): void
    {
        $this->dispatch('partsSent', $this->selectedParts);
    }

    #[On('invoiceCreated')]
    public function saveParts($id): void
    {
        Invoice::query()->find($id)->update(['parts' => json_encode($this->selectedParts)]);
    }

    public function render()
    {
        return view('livewire.invoice.select-parts');
    }
}
