<?php

namespace App\Http\Controllers;

use App\Models\Football;
use Illuminate\Http\Request;

class FootballController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $matches = Football::whereDate('created_at', now()->format('Y-m-d'))->get();

        $teams = Football::get()->pluck('home')->toArray();
        $teams = array_unique($teams);

        return view('football.index', compact('matches', 'teams'));
    }
}
