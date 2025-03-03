<form wire:submit="search">
    <flux:input.group class="p-2 mb-2">
        <div class="flex-1">
            <flux:input type="text" id="vrn" wire:model="vrn" placeholder="SE45 RCH" />
            <p class="text-sm ml-2 mt-0.5 text-red-500">@error('vrn') {{ $message }} @enderror</p>
        </div>


        <flux:button type="submit" icon="magnifying-glass">Search VRN</flux:button>
    </flux:input.group>
    <div class="text-center w-full grid grid-cols-2">
        @foreach(auth()->user()->searches as $search)
            <p><span wire:click="usePrevious('{{ $search->vrn }}')" class="cursor-pointer">{{ $search->vrn }}</span></p>
        @endforeach
    </div>
</form>
