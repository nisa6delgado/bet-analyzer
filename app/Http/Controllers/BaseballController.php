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
        $now = now()->utc()->format("Y-m-d\TH:i:s\Z");
        $players = Baseball::where('time', '>=', $now)->get();
        return view('baseball.index', compact('players'));
    }
}
