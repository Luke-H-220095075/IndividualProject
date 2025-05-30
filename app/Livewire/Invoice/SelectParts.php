<?php

namespace App\Livewire\Invoice;

use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Part;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectParts extends Component
{
    public $parts = [];
    public $partId = '';
    public $selectedParts = [];
    public $type = '';
    public $price = null;
    public $vehicleData = [];
    public $bookingId = '';

    #[On('bookingFetched')]
    public function fetchParts($id): void
    {
        $this->bookingId = $id;
        $booking = Booking::query()->find($id);

        if ($booking) {
            $this->vehicleData = json_decode($booking->vehicle->api_data);

            $this->parts = Part::query()->where('make', $this->vehicleData->make)
                ->where('model', $this->vehicleData->model)
                ->where('fuelType', $this->vehicleData->fuelType)
                ->get();
        } else {
            $this->vehicleData = [];
            $this->parts = [];
        }
    }

    public function openPartModal(): void
    {
        Flux::modal('addNewPart')->show();
    }

    public function createPart(): void
    {
        Part::query()->create([
            'type' => $this->type,
            'price' => $this->price,
            'make' => $this->vehicleData->make,
            'model' => $this->vehicleData->model,
            'fuelType' => $this->vehicleData->fuelType,
        ]);

        $this->fetchParts($this->bookingId);
        $this->reset('type', 'price');

        Flux::modal('addNewPart')->close();
    }

    public function sendParts(): void
    {
        $this->dispatch('partsSent', $this->selectedParts);
    }

    #[On('invoiceCreated')]
    public function saveParts($id): void
    {
        $parts = Part::query()->whereIn('id', $this->selectedParts)->get();

        Invoice::query()->find($id)->update(['parts' => json_encode($parts)]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.invoice.select-parts');
    }
}
