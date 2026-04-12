<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class SoccerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $headers = ['x-apisports-key' => env('API_FOOTBALL_KEY')];

        $date = now()->format('Y-m-d');
        $datetime = now()->format("Y-m-d\TH:i:sP");

        $params = [
            'date' => $date,
            'timezone' => 'America/Caracas',
            'status' => 'NS',
        ];

        $response = Http::withHeaders($headers)
            ->get('https://v3.football.api-sports.io/fixtures', $params);

        $matches = collect($response->object()->response);
        $matches = $matches->where('fixture.date', '>', $datetime);

        $perPage = 100;
        $currentPage = $request->input('page', 1);

        $currentPageItems = $matches->forPage($currentPage, $perPage);

        $matches = new LengthAwarePaginator(
            $currentPageItems,
            $matches->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query()
            ]
        );

        return view('soccer.index', compact('matches'));
    }
}
