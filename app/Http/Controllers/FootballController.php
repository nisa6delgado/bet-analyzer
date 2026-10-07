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
        $games = Football::whereDate('created_at', now()->format('Y-m-d'))->get();
        return view('football.index', compact('games'));
    }
}
