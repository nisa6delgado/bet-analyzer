<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class BaseballController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $url = 'https://statsapi.mlb.com';

        $response = Http::get($url . '/api/v1/schedule?sportId=1');

        foreach ($response->object()->dates[0]->games as $game) {
            $response = Http::get($url . $game->link);

            foreach ($response->object()->gameData->players as $player) {
                if ($player->primaryPosition->code != 1) {
                    $response = Http::get($url . $player->link);
                }
            }
        }

        return view('baseball.index');
    }
}
