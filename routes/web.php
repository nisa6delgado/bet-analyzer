<?php

use App\Http\Controllers\SoccerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/soccer', SoccerController::class);
