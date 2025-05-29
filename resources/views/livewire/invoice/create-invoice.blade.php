<div class="p-2">
    <flux:select wire:model="bookingId" label="Booking">
        <flux:select.option value="{{ null }}"></flux:select.option>
        @foreach($bookings as $booking)
            <flux:select.option value="{{ $booking->id }}">
                {{ $booking->type. ' - ' .$booking->vehicle->vrn}}
            </flux:select.option>
        @endforeach
    </flux:select>
</div>
