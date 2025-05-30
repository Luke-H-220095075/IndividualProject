@use(Carbon\Carbon)
<div class="text-xs text-center p-2 overflow-auto h-full">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-3 gap-y-2 my-2 items-center">
        <label for="title">Title</label>
        <label for="total">Total</label>
        <label></label>

        <hr class="col-span-full mx-8">

        @if($invoices)
            @foreach($invoices as $invoice)
                <p id="title">{{ $invoice->title }}</p>
                <p id="total">{{ number_format($invoice->total, 2) }}</p>
                <p wire:click="deleteInvoice({{ $invoice->id }})" class="text-red-500 cursor-pointer">Delete</p>

                @if(!$loop->last)
                    <hr class="col-span-full mx-8 border-gray-500">
                @endif
            @endforeach
        @else
            <p class="col-span-full">No invoices found</p>
        @endif
    </div>
</div>

