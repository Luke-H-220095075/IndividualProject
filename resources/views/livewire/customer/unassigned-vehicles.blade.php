<div class="p-2">
    <flux:heading class="text-center">Unassigned Vehicles</flux:heading>
    <div class="text-center w-full h-96 grid grid-cols-3 gap-y-3 overflow-scroll py-2">
        @if($customerId != null)
            @foreach($vehicles as $vehicle)
                <flux:badge wire:click="assignVehicle({{ $vehicle->id }})" variant="solid" color="yellow" class="justify-self-center self-center w-fit h-fit cursor-pointer">
                    {{ $vehicle->vrn }}
                </flux:badge>
            @endforeach
        @else
            <p class="col-span-3 self-center">Cannot assign vehicles to new customer</p>
        @endif
    </div>
</div>
