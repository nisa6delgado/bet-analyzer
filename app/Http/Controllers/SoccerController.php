<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use App\Models\Soccer;

class SoccerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id = '')
    {
        if ($id) {
            $headers = ['x-apisports-key' => env('API_FOOTBALL_KEY')];

            $params = [
                'id' => $id,
                'timezone' => 'America/Caracas',
            ];

            $response = Http::withHeaders($headers)
                ->get('https://v3.football.api-sports.io/fixtures', $params);

            $fixture = $response->object()->response[0];

            $params = [
                'timezone' => 'America/Caracas',
                'team' => $fixture->teams->home->id,
                'season' => $fixture->league->season,
                'status' => 'FT'
            ];

            $response = Http::withHeaders($headers)
                ->get('https://v3.football.api-sports.io/fixtures', $params);

            $home = $response->object()->response;

            $params['team'] = $fixture->teams->away->id;

            $response = Http::withHeaders($headers)
                ->get('https://v3.football.api-sports.io/fixtures', $params);

            $away = $response->object()->response;

            $results = json_encode([
                'home' => $home,
                'away' => $away,
            ]);

            Soccer::where('foreign_id', $id)
                ->update(['results' => $results]);

            return redirect('/soccer#match-' . $id);
        }

        $league = $request->league;

        $matches = Soccer::where('date', '>', now()->format("Y-m-d\TH:i:s-04:00"))
            ->when($league, function ($query) use ($league) {
                $query->whereLike('league', '%' . $league . '%');
            })
            ->get();

        $leagues = [];

        foreach ($matches as $match) {
            $league = $match->league->name;
            
            if ($match->league->country != 'World') {
                $league = $league . ' - ' . $match->league->country;
            }

            if (! in_array($league, $leagues)) {
                $leagues[] = $league;
            }
        }
        
        return view('soccer.index', compact('id', 'matches', 'leagues'));
    }
}
