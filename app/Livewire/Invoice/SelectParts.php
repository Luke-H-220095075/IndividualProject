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

    public function addPart(): void
    {
        $part = Part::query()->find($this->partId);

        if ($part !== null) {
            $this->selectedParts[] = $part;



            $this->sendPartPrices($part->price);
        }
    }

    public function removePart($id):void
    {
        $part = Part::query()->find($id);

        $this->selectedParts = array_diff($this->selectedParts, [$part]);

        $this->sendPartPrices($part->price);
    }

    public function sendPartPrices($price): void
    {
        $this->dispatch('priceSent', $price);
    }

    #[On('bookingCreated')]
    public function saveParts($id): void
    {
        Invoice::query()->find($id)->update(['parts' => json_encode($this->selectedParts)]);
    }

    public function render()
    {
        return view('livewire.invoice.select-parts');
    }
}
