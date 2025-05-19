<div class="p-2">
    <flux:heading class="text-center">Customer Vehicle(s)</flux:heading>
    <div class="text-center w-full h-44 grid grid-cols-2 gap-y-3 overflow-scroll py-2">
        @foreach($vehicles as $vehicle)
            <flux:badge variant="solid" color="yellow" class="justify-self-center self-center w-fit h-fit cursor-pointer">
                {{ $vehicle->vrn }}
            </flux:badge>
        @endforeach
    </div>

    <flux:separator class="my-2"></flux:separator>

    <flux:heading class="text-center">Customer Vehicle(s)</flux:heading>
    <div class="text-center w-full h-44 grid grid-cols-2 gap-y-3 overflow-scroll py-2">
        @foreach($vehicles as $vehicle)
            <flux:badge variant="solid" color="yellow" class="justify-self-center self-center w-fit h-fit cursor-pointer">
                {{ $vehicle->vrn }}
            </flux:badge>
        @endforeach
    </div>
</div>
