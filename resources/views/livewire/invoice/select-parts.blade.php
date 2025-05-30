<div class="p-2 h-56 overflow-scroll">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-3 text-center gap-2 text-sm">
        <label>Part</label>
        <label>Price</label>
        <label></label>

        <flux:checkbox.group class="col-span-3 grid grid-cols-3" wire:model="selectedParts" wire:change="sendParts">
            @foreach($parts as $part)
                <flux:checkbox value="{{ $part->id }}" label="{{ $part->type }}"></flux:checkbox>
                <p>£{{ number_format($part->price, 2) }}</p>
                <p wire:click="deletePart({{ $part->id }})" class="text-red-500 cursor-pointer">Delete</p>
            @endforeach
        </flux:checkbox.group>
    </div>

    <flux:separator class="mb-2"></flux:separator>

    <div class="flex justify-end">
        <flux:button wire:click="openPartModal" :disabled="$vehicleData == []">Add new part</flux:button>
    </div>

    <flux:modal name="addNewPart">
        <form wire:submit="createPart" class="space-y-6">
            <flux:heading size="lg">Add New Part</flux:heading>
            <flux:input wire:model="type" label="Type" />
            <flux:input wire:model="price" label="Price" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit">Create</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
