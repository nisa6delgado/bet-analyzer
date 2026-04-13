<?php

use App\Http\Controllers\SoccerController;
use App\Http\Controllers\BasketballController;
use App\Http\Controllers\BaseballController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/soccer')->name('home');

Route::get('/soccer', SoccerController::class)->name('soccer');
Route::get('/basketball', BasketballController::class)->name('basketball');
Route::get('/baseball', BaseballController::class)->name('baseball');
