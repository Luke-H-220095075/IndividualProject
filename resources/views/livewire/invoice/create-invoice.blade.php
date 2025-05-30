@use(Carbon\Carbon)
<form wire:submit="createInvoice" class="p-2">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <flux:select wire:model="bookingId" wire:change="fetchBooking" label="Booking">
        <flux:select.option value="{{ null }}"></flux:select.option>
        @foreach($bookings as $booking)
            <flux:select.option value="{{ $booking->id }}">
                {{ $booking->type. ' - ' .$booking->vehicle->vrn}}
            </flux:select.option>
        @endforeach
    </flux:select>

    <flux:separator class="my-2"></flux:separator>

    <div class="grid grid-cols-2 text-sm text-center">
        <div class="col-span-2">
            <label for="description">Description</label>
            <p id="description">{{ $selectedBooking->description ?? '-' }}</p>
        </div>

        <div>
            <label for="customer">Customer</label>
            <p id="customer">{{ $selectedBooking->customer->name ?? '-' }}</p>
        </div>

        <div>
            <label for="timeslot">Timeslot</label>
            <p id="timeslot">
                {{ filled($selectedBooking)
                    ? $selectedBooking->date. ' - ' .Carbon::parse($selectedBooking->time)->format('H:i')
                    : '-'
                }}
            </p>
        </div>
    </div>

    <flux:separator class="my-2"></flux:separator>

    <div class="flex justify-end">
        <flux:button type="submit">Create</flux:button>
    </div>
</form>
