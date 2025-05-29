<div class="p-2">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <flux:select wire:model="partId" wire:change="addPart" label="Part">
        <flux:select.option value="{{ null }}"></flux:select.option>
        @foreach($parts as $part)
            <flux:select.option value="{{ $part->id }}">{{ $part->type }}</flux:select.option>
        @endforeach
    </flux:select>

    <flux:separator class="my-2"></flux:separator>

    <div class="grid grid-cols-2 text-sm text-center">
        <label for="type">Type</label>
        <label for="price">Price</label>

        @if($selectedParts)
            @foreach($selectedParts as $part)
                <p id="type">{{ $part->type }}</p>
                <p id="price">{{ $part->price }}</p>
            @endforeach
        @else
            <p class="col-span-2">No parts selected</p>
        @endif

    </div>
</div>
