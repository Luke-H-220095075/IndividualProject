@use(Carbon\Carbon)
<div class="flex h-full justify-center items-center text-center p-2">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-2 gap-y-2 text-sm justify-center items-center">
        <label>Item</label>
        <label>Total</label>

        <flux:separator class="col-span-full"></flux:separator>

        <p>Labour Costs</p>
        <flux:input wire:model="labourCost" wire:change="calculateTotal"></flux:input>

        <p>Part Costs</p>
        <p>£{{ number_format($partsCost, 2) }}</p>

        <flux:separator class="col-span-full"></flux:separator>

        <p>Total Costs</p>
        <p>£{{ number_format($totalCost, 2) }}</p>
    </div>
</div>


