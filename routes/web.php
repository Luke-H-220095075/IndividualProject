<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('customer', 'customer')
    ->middleware(['auth', 'verified'])
    ->name('customer');

Route::view('booking', 'booking')
    ->middleware(['auth', 'verified'])
    ->name('booking');

Route::view('invoicing', 'invoicing')
    ->middleware(['auth', 'verified'])
    ->name('invoicing');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
