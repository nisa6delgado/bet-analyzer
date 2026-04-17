<?php

namespace App\Http\Controllers;

use App\Models\MLB\Baseball;
use Illuminate\Http\Request;

class BaseballController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $players = Baseball::get();
        return view('baseball.index', compact('players'));
    }
}
