<?php

namespace App\Livewire\Invoice;

use App\Models\Part;
use Livewire\Component;

class SelectParts extends Component
{
    public $parts = [];
    public $partId = '';
    public $selectedParts = [];

    public function mount(): void
    {
        $this->parts = Part::all();
    }

    public function addPart(): void
    {
        $part = Part::query()->find($this->partId);

        $this->selectedParts[] = $part;
    }

    public function render()
    {
        return view('livewire.invoice.select-parts');
    }
}
