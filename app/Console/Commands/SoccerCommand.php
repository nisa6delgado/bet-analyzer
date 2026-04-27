<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:soccer')]
#[Description('Command description')]
class SoccerCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
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

        foreach (collect($response->object()->response) as $match) {
            Soccer::create([
                'date' => $match->fixture->date,
                'league' => $match->league,
                'teams' => $match->teams,
            ]);
        }
    }
}
