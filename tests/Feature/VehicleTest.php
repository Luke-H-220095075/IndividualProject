<?php

use App\Models\User;

beforeEach(function () {
    $user = User::factory()->create();
    $this->actingAs($user);
});

test('vehicle page is accessible', function () {
    $response = $this->get('/dashboard');
    $response->assertStatus(200);
});

//test('vehicle can be searched', function () {
//    $this->get('/dashboard')->assertSeeLivewire('vehicle');
//});
