@use(Carbon\Carbon)
<div class="text-xs text-center p-2 overflow-auto h-full">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-4 gap-y-2 my-2 items-center">
        <label for="type">Type</label>
        <label for="description">Description</label>
        <label for="date">Date</label>
        <label for="time">Time</label>

        <hr class="col-span-full mx-8">

        @if($bookings)
            @foreach($bookings as $booking)
                <p id="type">{{ $booking->type }}</p>
                <p id="description">{{ $booking->description }}</p>
                <p id="date">{{ $booking->date }}</p>
                <p id="time">{{ Carbon::parse($booking->time)->format('H:i') }}</p>

                @if(!$loop->last)
                    <hr class="col-span-full mx-8 border-gray-500">
                @endif
            @endforeach
        @else
            <p class="col-span-full">No bookings found</p>
        @endif
    </div>
</div>
