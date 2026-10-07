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
        $games = Hockey::whereDate('created_at', now()->format('Y-m-d'))->get();
        return view('hockey.index', compact('games'));
    }
}
