<form wire:submit="search">
    <flux:input.group class="p-2">
        <div class="flex-1">
            <flux:input type="text" id="vrn" wire:model="vrn" placeholder="SE45RCH" />
            <p class="text-sm ml-2 mt-0.5 text-red-500">@error('vrn') {{ $message }} @enderror</p>
        </div>


        <flux:button type="submit" icon="magnifying-glass">Search VRN</flux:button>
    </flux:input.group>
    <div class="text-center w-full grid grid-cols-2 gap-y-3 overflow-hidden py-1">
        @foreach(auth()->user()->searches as $search)
            <flux:badge wire:click="usePrevious('{{ $search->vrn }}')" variant="solid" color="yellow" class="justify-self-center self-center w-fit h-fit cursor-pointer">
                {{ $search->vrn }}
            </flux:badge>
        @endforeach
    </div>
</form>
