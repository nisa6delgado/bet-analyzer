<?php

namespace App\Http\Controllers;

use App\Models\MLB\Player;
use Illuminate\Http\Request;

class BaseballController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $players = Player::get();
        return view('baseball.index');
    }
}
