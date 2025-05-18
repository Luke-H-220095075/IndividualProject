<form wire:submit="saveCustomer" class="p-2">
    <flux:label class="pl-1 pb-2" for="selectCustomer">Select Customer</flux:label>
    <flux:select id="selectCustomer" wire:model="customerId" wire:change="fillInputs">
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
        <flux:textarea wire:model="address" type="text" label="Address" rows="3" description="Optional"/>
    </div>

    <flux:separator class="mt-4 mb-2"></flux:separator>

    <div class="flex justify-end">
        <flux:button type="submit">Save</flux:button>
    </div>
</form>
