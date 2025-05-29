<?php

namespace App\Livewire\Invoice;

use Livewire\Attributes\On;
use Livewire\Component;

class PriceSummary extends Component
{
    public $labourCost = '';
    public $partsCost = '';
    public $totalCost = 0;

    #[On('priceSent')]
    public function calculatePartCosts($price): void
    {
        if ($this->partsCost == '') {
            $this->partsCost = 0;
        }

        $this->partsCost += $price;
        $this->calculateTotal($price);
    }

    public function calculateTotal($price = null): void
    {
        $this->totalCost = $this->labourCost;

        if ($price) {
            $this->totalCost += $price;
        }
    }

    public function render()
    {
        return view('livewire.invoice.price-summary');
    }
}
