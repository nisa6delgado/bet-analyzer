<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Baseball as Model;

#[Signature('app:baseball')]
#[Description('Seed baseball data')]
class Baseball extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'https://statsapi.mlb.com';

        $response = Http::get($url . '/api/v1/schedule?sportId=1');

        Model::truncate();

        foreach ($response->object()->dates[0]->games as $game) {
            $response = Http::get($url . $game->link);

            foreach ($response->object()->gameData->players as $player) {
                if ($player->primaryPosition->code != 1) {
                    $response = Http::get($url . $player->link . '/stats?stats=gameLog');

                    if ($response->object()->stats) {
                        $name = $response->object()->stats[0]->splits[0]->player->fullName;
                        $team = $response->object()->stats[0]->splits[0]->team->name;
                    
                        foreach ($response->object()->stats[0]->splits as $split) {
                            $splits[] = [
                                'date' => $split->date,
                                'opponent' => $split->opponent->name,
                                'stat' => $split->stat,
                                'position' => implode(', ', array_column($split->positionsPlayed, 'abbreviation')),
                                'home' => $split->isHome,
                                'win' => $split->isWin,
                            ];
                        }

                        Model::create([
                            'name' => $name,
                            'team' => $team,
                            'splits' => $splits,
                        ]);
                    }
                }
            }
        }
    }
}
