<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/', \App\Http\Livewire\Input::class)->name('home');



Route::get('/pokemon', \App\Http\Livewire\Deck::class)->name('pokemon');

Route::get('/users', \App\Http\Livewire\Users::class)->name('users');

Route::get('/profile', \App\Http\Livewire\Profile::class)->name('profile');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
