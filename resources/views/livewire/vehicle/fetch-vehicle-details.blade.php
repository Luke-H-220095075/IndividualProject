<div class="p-2 overflow-auto h-full">
    <p>Make: {{ $make }}</p>
    <p>Model: {{ $model }}</p>
    <p>Colour: {{ $colour }}</p>
    <p>Tax Status: {{ $taxStatus }}</p>
    <p>Tax Due Date: {{ $taxDueDate }}</p>
    <p>MOT Status: {{ $motStatus }}</p>
    <p>MOT Expiry Date: {{ $motExpiryDate }}</p>
    <p>Year of Manufacture: {{ $yearOfManufacture }}</p>
    <p>Engine Capacity: {{ $engineCapacity }}</p>
    <p>CO2 Emissions: {{ $co2Emissions }}</p>
    <p>Fuel Type: {{ $fuelType }}</p>
    <p>Type Approval: {{ $typeApproval }}</p>
    <p>Has Outstanding Recall: {{ $hasOutstandingRecall }}</p>
    @if($motTests)
        @foreach($motTests as $motTest)
            <p>Test: {{ $motTest['testResult'] }}</p>
        @endforeach
    @endif
</div>
