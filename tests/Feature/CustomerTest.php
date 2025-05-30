<?php

use App\Livewire\Customer\SelectCustomer;
use App\Models\Customer;
use App\Models\User;
use function Pest\Laravel\call;

beforeEach(function () {
    $user = User::factory()->create();
    $this->actingAs($user);
});

test('customer page is accessible', function () {
    $response = $this->get('/customer');
    $response->assertStatus(200);
});

test('customers can be created', function () {
    Livewire::test(SelectCustomer::class)
        ->set('name', 'testName')
        ->call('saveCustomer')
        ->assertDispatched('customerSelected')
        ->assertDispatched('customerCreated');

    $this->assertEquals(1, Customer::count());
});
