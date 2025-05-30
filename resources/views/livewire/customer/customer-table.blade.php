@use(Carbon\Carbon)
<div class="text-xs text-center p-2 overflow-auto h-full">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-5 gap-y-2 my-2 items-center">
        <label for="name">Name</label>
        <label for="phone">Phone</label>
        <label for="email">Email</label>
        <label for="address">Address</label>
        <label></label>

        <hr class="col-span-full mx-8">

        @if($customers)
            @foreach($customers as $customer)
                <p id="type">{{ $customer->name }}</p>
                <p id="description">{{ $customer->phone ?? '-' }}</p>
                <p id="date">{{ $customer->email ?? '-' }}</p>
                <p id="time">{{ $customer->address ?? '-' }}</p>
                @if($customer->bookings()->count() == 0)
                    <p wire:click="deleteCustomer({{ $customer->id }})" class="text-red-500 cursor-pointer">Delete</p>
                @else
                    <p>Not Deletable</p>
                @endif
                @if(!$loop->last)
                    <hr class="col-span-full mx-8 border-gray-500">
                @endif
            @endforeach
        @else
            <p class="col-span-full">No customers found</p>
        @endif
    </div>
</div>

