<form wire:submit="createBooking" class="p-2">
    <div class="grid grid-cols-7 gap-2 items-baseline">
        <flux:select wire:model="type" label="Type" description="Required">
            <flux:select.option value="{{ null }}"></flux:select.option>
            <flux:select.option>MOT</flux:select.option>
            <flux:select.option>Service</flux:select.option>
            <flux:select.option>Repair</flux:select.option>
        </flux:select>

        <div class="col-span-2">
            <flux:textarea wire:model="description" type="text" label="Description" description="Optional" rows="2"/>
        </div>

        <flux:input wire:model="date" wire:change="fetchTimes" type="date" label="Date" description="Required"
                    min="{{ \Carbon\Carbon::now()->toDateString() }}"></flux:input>

        <flux:select :disabled="empty($times)" wire:model="time" label="Time" description="Required">
            <flux:select.option value="{{ null }}"></flux:select.option>
            @foreach($times as $time)
                <flux:select.option>{{ $time }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:select wire:model="customerId" wire:change="fetchVehicles" label="Customer" description="Optional">
            <flux:select.option value="{{ null }}"></flux:select.option>
            @foreach($customers as $customer)
                <flux:select.option value="{{ $customer->id }}">{{ $customer->name }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:select wire:model="vehicleId" label="Vehicle" description="Required">
            <flux:select.option value="{{ null }}"></flux:select.option>
            @foreach($vehicles as $vehicle)
                <flux:select.option value="{{ $vehicle->id }}">{{ $vehicle->vrn }}</flux:select.option>
            @endforeach
        </flux:select>
    </div>

    <flux:separator class="mt-4 mb-2"></flux:separator>

    <div class="flex justify-end">
        <flux:button type="submit">Create</flux:button>
    </div>
</form>
