<?php

namespace App\Livewire\Vehicle;

use Livewire\Attributes\On;
use Livewire\Component;

class DisplayMotTests extends Component
{
    public $motTests = [];

    #[On('fetched')]
    public function fetch($motTests): void
    {
        $this->motTests = $motTests;
    }

    public function render()
    {
        return view('livewire.vehicle.display-mot-tests');
    }
}
