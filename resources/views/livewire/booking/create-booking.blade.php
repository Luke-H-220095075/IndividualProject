<form wire:submit="createInvoice" class="p-2">
    <div class="grid grid-cols-6 gap-2">
        <flux:select wire:model="type" label="Type" placeholder="Select a type">
            <flux:select.option>MOT</flux:select.option>
            <flux:select.option>Service</flux:select.option>
            <flux:select.option>Repair</flux:select.option>
        </flux:select>

        <div class="col-span-2">
            <flux:textarea wire:model="description" type="text" label="Description" rows="2"/>
        </div>

        <flux:input wire:model="amount" type="float" label="Amount"></flux:input>

        <flux:select id="selectCustomer" wire:model="customerId" wire:change="fetchVehicles" label="Customer">
            <flux:select.option value="{{ null }}">Walk In Customer</flux:select.option>
            @foreach($customers as $customer)
                <flux:select.option value="{{ $customer->id }}">{{ $customer->name }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:select id="selectVehicle" wire:model="vehicleId" label="Vehicle">
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
