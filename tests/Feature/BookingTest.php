<?php

use App\Livewire\Booking\CreateBooking;
use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;

beforeEach(function () {
    $user = User::factory()->create();
    $this->actingAs($user);
});

test('booking page is accessible', function () {
    $response = $this->get('/booking');
    $response->assertStatus(200);
});

test('bookings can be created', function () {
    $vehicle = Vehicle::query()->create(['vrn' => 'test']);

    Livewire::test(CreateBooking::class)
        ->set('type', 'MOT')
        ->set('date', '2000-01-01')
        ->set('time', '08:00:00')
        ->set('vehicleId', $vehicle->id)
        ->call('createBooking')
        ->assertDispatched('bookingCreated');

    $this->assertEquals(1, Booking::count());
});
