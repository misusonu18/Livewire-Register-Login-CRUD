<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::get('/home', Home::class)->name('home')->middleware('auth');
Route::group(['middleware'=>'guest'], function () {
    Route::get('/register', Register::class);
    Route::get('/login', Login::class)->name('login');
});
