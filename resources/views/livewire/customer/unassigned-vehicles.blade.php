<div class="p-2">
    <flux:heading class="text-center">Unassigned Vehicles</flux:heading>
    <div class="text-center w-full h-96 grid grid-cols-3 gap-y-3 overflow-scroll py-2">
        @foreach($vehicles as $vehicle)
            <flux:badge variant="solid" color="yellow" class="justify-self-center self-center w-fit h-fit cursor-pointer">
                {{ $vehicle->vrn }}
            </flux:badge>
        @endforeach
    </div>
</div>
