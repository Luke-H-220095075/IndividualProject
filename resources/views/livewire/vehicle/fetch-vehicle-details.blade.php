<div class="text-xs text-center p-2 overflow-auto h-full">
    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="grid grid-cols-3 my-2">
        <label for="make">Make</label>
        <label for="model">Model</label>
        <label for="colour">Colour</label>
        <p id="make">{{ $make }}</p>
        <p id="model">{{ $model }}</p>
        <p id="colour">{{ $colour }}</p>
    </div>

    <div class="grid grid-cols-2 mb-2">
        <label for="motStatus">MOT Status</label>
        <label for="motExpiryDate">MOT Expiry Date</label>
        <p id="motStatus">{{ $motStatus }}</p>
        <p id="motExpiryDate">{{ $motExpiryDate }}</p>
    </div>

    <div class="grid grid-cols-2 mb-2">
        <label for="taxStatus">Tax Status</label>
        <label for="taxDueDate">Tax Due Date</label>
        <p id="taxStatus">{{ $taxStatus }}</p>
        <p id="taxDueDate">{{ $taxDueDate }}</p>
    </div>

    <div class="grid grid-cols-2 mb-2">
        <label for="yearOfManufacture">Year of Manufacture</label>
        <label for="engineCapacity">Engine Capacity</label>
        <p id="yearOfManufacture">{{ $yearOfManufacture }}</p>
        <p id="engineCapacity">{{ $engineCapacity }}</p>
    </div>

    <div class="grid grid-cols-2 mb-2">
        <label for="fuelType">Fuel Type</label>
        <label for="co2Emissions">CO2 Emissions</label>
        <p>{{ $co2Emissions }}</p>
        <p>{{ $fuelType }}</p>
    </div>

    <div class="grid grid-cols-2 mb-2">
        <label for="hasOutstandingRecall">Has Outstanding Recall</label>
        <label for="typeApproval">Type Approval</label>
        <p id="hasOutstandingRecall">{{ $hasOutstandingRecall }}</p>
        <p id="typeApproval">{{ $typeApproval }}</p>
    </div>

{{--    @if($motTests)--}}
{{--        @foreach($motTests as $motTest)--}}
{{--            <p>Test: {{ $motTest['testResult'] }}</p>--}}
{{--        @endforeach--}}
{{--    @endif--}}
</div>
