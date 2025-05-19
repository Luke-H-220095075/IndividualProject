<form wire:submit="saveCustomer" class="p-2">
    <flux:label class="pl-1 pb-2" for="selectCustomer">Select Customer</flux:label>
    <flux:select id="selectCustomer" wire:model="customerId" wire:key="customer-{{ $customerId }}" wire:change="fillInputs">
        <flux:select.option value="{{ null }}">Add New Customer</flux:select.option>
        @foreach($customers as $customer)
            <flux:select.option value="{{ $customer->id }}">{{ $customer->name }}</flux:select.option>
        @endforeach
    </flux:select>

    <flux:separator class="mt-4"></flux:separator>

    <div class="px-2 pt-3">
        <div class="grid grid-cols-3 gap-2 pb-3">
            <flux:input wire:model="name" type="text" label="Name" description="Required"/>
            <flux:input wire:model="phone" type="text" mask="99999 999999" label="Phone" description="Optional"/>
            <flux:input wire:model="email" type="email" label="Email" description="Optional"/>
        </div>

        <div class="grid grid-cols-2 gap-2">
            <flux:textarea wire:model="address" type="text" label="Address" rows="3" description="Optional"/>
            <div>
                <flux:heading class="text-center">Customer Vehicle(s)</flux:heading>
                <div class="text-center w-full h-30 grid grid-cols-2 gap-y-3 overflow-scroll py-2">
                    @if(filled($customerVehicles))
                        @foreach($customerVehicles as $vehicle)
                            <flux:badge variant="solid" color="yellow" class="justify-self-center self-center w-fit h-fit cursor-pointer">
                                {{ $vehicle->vrn }}
                            </flux:badge>
                        @endforeach
                    @else
                        <p class="col-span-2 self-center">No vehicles found for this customer</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <flux:separator class="mt-4 mb-2"></flux:separator>

    <div class="flex justify-end">
        <flux:button type="submit">Save</flux:button>
    </div>
</form>
