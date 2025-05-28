@use(Carbon\Carbon)
<div class="text-xs text-center p-2 overflow-auto h-full">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-7 gap-y-2 my-2 items-center">
        <label for="type">Type</label>
        <label for="description">Description</label>
        <label for="date">Date</label>
        <label for="time">Time</label>
        <label for="customer">Customer</label>
        <label for="vehicle">Vehicle</label>

        <hr class="col-span-full mx-8">

        @if($bookings)
            @foreach($bookings as $booking)
                <p id="type">{{ $booking->type }}</p>
                <p id="description">{{ filled($booking->description) ? $booking->description : '-'}}</p>
                <p id="date">{{ Carbon::parse($booking->date)->format('d-m-Y') }}</p>
                <p id="time">{{ Carbon::parse($booking->time)->format('H:i') }}</p>
                <p id="customer">{{ filled($booking->customer?->name) ? $booking->customer?->name : '-' }}</p>
                <p id="vehicle">{{ $booking->vehicle->vrn }}</p>
                <p wire:click="deleteBooking({{ $booking->id }})" class="text-red-500 cursor-pointer">Delete</p>

                @if(!$loop->last)
                    <hr class="col-span-full mx-8 border-gray-500">
                @endif
            @endforeach
        @else
            <p class="col-span-full">No bookings found</p>
        @endif
    </div>
</div>
