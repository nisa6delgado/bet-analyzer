<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Soccer;

#[Signature('app:soccer {date?}')]
#[Description('Seed soccer data')]
class SoccerCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $headers = ['x-apisports-key' => env('API_FOOTBALL_KEY')];

        $date = $this->argument('date') ?? now()->format('Y-m-d');
        $datetime = now()->format("Y-m-d\TH:i:sP");

        if ($this->argument('date') && now()->format('Y-m-d') > $this->argument('date')) {
            $this->error('Sólo puede consultar fechas futuras');
        }

        $params = [
            'date' => $date,
            'timezone' => 'America/Caracas',
            'status' => 'NS',
        ];

        $response = Http::withHeaders($headers)
            ->get('https://v3.football.api-sports.io/fixtures', $params);

        foreach (collect($response->object()->response) as $match) {
            Soccer::updateOrCreate(
                ['foreign_id' => $match->fixture->id],
                [
                    'date' => $match->fixture->date,
                    'league' => $match->league,
                    'teams' => $match->teams,
                ]
            );
        }
    }
}
