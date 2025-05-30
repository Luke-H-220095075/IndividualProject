<?php

use App\Livewire\Vehicle\SearchVehicle;
use App\Models\User;
use App\Models\Vehicle;

beforeEach(function () {
    $user = User::factory()->create();
    $this->actingAs($user);
});

test('vehicle page is accessible', function () {
    $response = $this->get('/dashboard');
    $response->assertStatus(200);
});

test('vehicle can be searched', function () {
    Livewire::test(SearchVehicle::class)
        ->set('vrn', 'FG59WHT')
        ->call('search')
        ->assertDispatched('searched', 'FG59WHT');
});

test('vehicle can be saved if valid', function () {
    Livewire::test(SearchVehicle::class)
        ->set('vrn', 'FG59WHT')
        ->call('saveVehicle');

    $this->assertEquals(1, Vehicle::count());
});
