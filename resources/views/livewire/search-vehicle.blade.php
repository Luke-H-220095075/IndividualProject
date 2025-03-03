<form wire:submit="search">
    <flux:input.group class="p-2">
        <div class="flex-1">
            <flux:input type="text" id="vrn" wire:model="vrn" placeholder="SE45 RCH" />
            <p class="text-sm ml-2 mt-0.5 text-red-500">@error('vrn') {{ $message }} @enderror</p>
        </div>


        <flux:button type="submit" icon="magnifying-glass">Search VRN</flux:button>
    </flux:input.group>
    <p class="text-center w-full pt-10">Recent searches go here</p>
</form>
