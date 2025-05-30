<?php

namespace App\Livewire\Invoice;

use App\Models\Invoice;
use App\Models\Part;
use Livewire\Attributes\On;
use Livewire\Component;

class PriceSummary extends Component
{
    public $labourCost = 0;
    public $partsCost = 0;
    public $totalCost = 0;

    #[On('partsSent')]
    public function calculatePartCosts($partIds): void
    {
        $parts = Part::query()->whereIn('id', $partIds)->get('price');

        $this->partsCost = $parts->sum('price');

        $this->calculateTotal();
    }

    public function calculateTotal($price = null): void
    {
        $this->totalCost = $this->labourCost;

        $this->totalCost += $this->partsCost;
    }

    #[On('invoiceCreated')]
    public function saveTotal($id): void
    {
        Invoice::query()->find($id)->update(['total' => $this->totalCost]);
    }

    public function render()
    {
        return view('livewire.invoice.price-summary');
    }
}
