<?php

use App\Http\Controllers\BaseballController;
use App\Http\Controllers\BasketballController;
use App\Http\Controllers\SoccerController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/soccer')->name('home');

Route::get('/soccer/{id?}', SoccerController::class)->name('soccer');
Route::get('/basketball', BasketballController::class)->name('basketball');
Route::get('/baseball', BaseballController::class)->name('baseball');

Route::get('/test', function () {
    $url = 'https://statsapi.mlb.com';

    $games = Http::get($url . '/api/v1/schedule?sportId=1');
    $games = $games->object();


    $result = [];

    foreach ($games->dates[0]->games as $game) {
        $feed = Http::get($url . $game->link);
        $feed = $feed->object();

        dd($url . $feed->gameData->probablePitchers->away->link . '/stats');

        $people = Http::get($url . $feed->gameData->probablePitchers->away->link . '/stats');
        $people = $people->object();

        dd($people);

        $result[] = [
            'teams' => $game->teams,
            'pitchers' => $feed->gameData->probablePitchers,
        ];
    }

    return $result;
});
