<?php

namespace App\Livewire\Invoice;

use App\Models\Booking;
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

        if ($this->parts->count() == 0) {
            $this->parts = [];
        }
    }

    public function addPart(): void
    {
        $part = Part::query()->find($this->partId);

        $this->selectedParts[] = $part;

        $this->parts = Part::query()->whereNot('id', $this->partId)->get();
    }

    public function render()
    {
        return view('livewire.invoice.select-parts');
    }
}
