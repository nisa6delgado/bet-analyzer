<?php

namespace App\Http\Controllers;

use App\Models\Hockey;
use Illuminate\Http\Request;

class HockeyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $matches = Hockey::whereDate('created_at', now()->format('Y-m-d'))->get();

        $teams = Hockey::get()->pluck('home')->toArray();
        $teams = array_unique($teams);

        return view('hockey.index', compact('matches', 'teams'));
    }
}
