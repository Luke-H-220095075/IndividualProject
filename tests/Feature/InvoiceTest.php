<?php

use App\Livewire\Invoice\CreateInvoice;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Vehicle;

beforeEach(function () {
    $user = User::factory()->create();
    $this->actingAs($user);
});

test('invoicing page is accessible', function () {
    $response = $this->get('/invoicing');
    $response->assertStatus(200);
});

test('invoices can be created', function () {
    $vehicle = Vehicle::query()->create(['vrn' => 'test']);

    $booking = Booking::query()->create([
        'type' => 'MOT',
        'date' => '2000-01-01',
        'time' => '08:00:00',
    ]);
    $booking->vehicle()->associate($vehicle)->save();

    Livewire::test(CreateInvoice::class)
        ->set('selectedBooking', $booking)
        ->call('createInvoice')
        ->assertDispatched('invoiceCreated');

    $this->assertEquals(1, Invoice::count());
});
