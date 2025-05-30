<?php

namespace App\Livewire\Invoice;

use App\Models\Invoice;
use Livewire\Attributes\On;
use Livewire\Component;

class InvoiceTable extends Component
{
    public $invoices = [];

    public function mount(): void
    {
        $this->fetchInvoices();
    }

    #[On('invoiceCreated')]
    public function fetchInvoices(): void
    {
        $this->invoices = Invoice::all();
    }

    public function deleteInvoice($id): void
    {
        $invoice = Invoice::query()->find($id);

        $invoice->booking()->update(['invoice_id' => null]);
        $invoice->delete();

        $this->fetchInvoices();
        $this->dispatch('invoiceDeleted');
    }

    public function render()
    {
        return view('livewire.invoice.invoice-table');
    }
}
