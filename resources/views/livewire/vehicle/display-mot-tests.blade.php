@use(Carbon\Carbon)
<div class="text-xs text-center p-2 overflow-auto h-full">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-5 gap-y-2 my-2 items-center">
        <label for="dateCompleted">Date Completed</label>
        <label for="result">Result</label>
        <label for="odometerReading">Odometer Reading</label>
        <label class="col-span-2">Defects</label>

        <hr class="col-span-full mx-8">

        @if($motTests)
            @foreach($motTests as $motTest)
                <p id="dateCompleted">{{ Carbon::parse($motTest['completedDate'])->format('d-m-Y') ?? '-' }}</p>
                <p id="result">{{ $motTest['testResult'] ?? '-' }}</p>
                <p id="odometerReading">{{ $motTest['odometerValue']. ' ' .$motTest['odometerUnit'] ?? '-' }}</p>

                <div class="col-span-2 grid grid-cols-2 gap-y-2 items-center">
                    @if($motTest['defects'])
                        @foreach($motTest['defects'] as $defect)
                            <p>{{ $defect['text'] }}</p>
                            <p>{{ $defect['type'] }}</p>
                        @endforeach
                    @else
                        <p class="col-span-full">No defects found for this test</p>
                    @endif
                </div>

                @if(!$loop->last)
                    <hr class="col-span-full mx-8 border-gray-500">
                @endif
            @endforeach
        @else
            <p class="col-span-full">No MOT history found</p>
        @endif
    </div>
</div>

