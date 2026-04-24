<?php

namespace App\Http\Controllers;

use App\Models\Baseball;
use Illuminate\Http\Request;

class BaseballController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $now = now()
            ->utc()
            ->format("Y-m-d\TH:i:s\Z");

        $team = $request->team;

        $players = Baseball::where('time', '>=', $now)
            ->when($team, function ($query) use ($team) {
                $query->where('team', $team);
            })
            ->get();

        $teams = $players->pluck('team')
            ->unique()
            ->sort();

        return view('baseball.index', compact('players', 'teams'));
    }
}
