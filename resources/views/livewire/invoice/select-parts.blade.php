<div class="p-2">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-2 text-center gap-2 text-sm">
        <label>Part</label>
        <label>Price</label>

        <flux:checkbox.group class="col-span-2 grid grid-cols-2" wire:model="selectedParts" wire:change="sendParts">
            @foreach($parts as $part)
                <flux:checkbox class="ml-12" value="{{ $part->id }}" label="{{ $part->type }}"></flux:checkbox>
                <p>{{ $part->price }}</p>
            @endforeach
        </flux:checkbox.group>
    </div>
</div>
