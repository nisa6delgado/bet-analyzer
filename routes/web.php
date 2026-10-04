<?php

use App\Http\Controllers\BaseballController;
use App\Http\Controllers\BasketballController;
use App\Http\Controllers\FootballController;
use App\Http\Controllers\HockeyController;
use App\Http\Controllers\SoccerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/soccer')->name('home');

Route::get('/baseball', BaseballController::class)->name('baseball');
Route::get('/basketball', BasketballController::class)->name('basketball');
Route::get('/football', FootballController::class)->name('football');
Route::get('/hockey', HockeyController::class)->name('hockey');
Route::get('/soccer/{id?}', SoccerController::class)->name('soccer');

