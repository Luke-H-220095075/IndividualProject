@use(Carbon\Carbon)
<div class="text-xs text-center p-2 overflow-auto h-full">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-5 gap-y-2 my-2 items-center">
        <label for="title">Title</label>
        <label for="parts">Parts</label>
        <label for="labour">Labour</label>
        <label for="total">Total</label>
        <label></label>

        <hr class="col-span-full mx-8">

        @if($invoices)
            @foreach($invoices as $invoice)
                @php($labourCost = $invoice->total)
                <p id="title">{{ $invoice->title }}</p>

                <div>
                    @foreach(json_decode($invoice->parts) as $part)
                        @php($labourCost -= $part->price)
                        <p id="parts">{{ $part->type. ' - £' .$part->price }}</p>
                    @endforeach
                </div>

                <p id="labour">£{{ number_format($labourCost, 2) }}</p>

                <p id="total">£{{ number_format($invoice->total, 2) }}</p>

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

