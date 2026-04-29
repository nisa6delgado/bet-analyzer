<?php

use App\Http\Controllers\SoccerController;
use App\Http\Controllers\BasketballController;
use App\Http\Controllers\BaseballController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/soccer')->name('home');

Route::get('/soccer/{id?}', SoccerController::class)->name('soccer');
Route::get('/basketball', BasketballController::class)->name('basketball');
Route::get('/baseball', BaseballController::class)->name('baseball');

Route::get('/test', function () {
    $content = file_get_contents('https://www.football-data.co.uk/mmz4281/2526/E0.csv');

    $result = [];
    
    foreach (explode("\n", $content) as $line) {
        $match = request()->get('match');
        $teams = explode(' vs ', $match);
        $fields = explode(',', $line);

        if ($line != '') {
            if ($fields[3] == $teams[0]) {
                if (! isset($result[$teams[0]]['home']['total'])) {
                    $result[$teams[0]]['home']['total'] = 1;
                } else {
                    $result[$teams[0]]['home']['total']++;
                }

                if ($fields[5] + $fields[6] >= 1.5) {
                    if (! isset($result[$teams[0]]['home']['1.5'])) {
                        $result[$teams[0]]['home']['1.5'] = 1;
                    } else {
                        $result[$teams[0]]['home']['1.5']++;
                    }
                }

                if ($fields[5] + $fields[6] >= 2.5) {
                    if (! isset($result[$teams[0]]['home']['2.5'])) {
                        $result[$teams[0]]['home']['2.5'] = 1;
                    } else {
                        $result[$teams[0]]['home']['2.5']++;
                    }
                }
            }

            if ($fields[4] == $teams[0]) {
                if (! isset($result[$teams[0]]['away']['total'])) {
                    $result[$teams[0]]['away']['total'] = 1;
                } else {
                    $result[$teams[0]]['away']['total']++;
                }

                if ($fields[5] + $fields[6] >= 1.5) {
                    if (! isset($result[$teams[0]]['away']['1.5'])) {
                        $result[$teams[0]]['away']['1.5'] = 1;
                    } else {
                        $result[$teams[0]]['away']['1.5']++;
                    }
                }

                if ($fields[5] + $fields[6] >= 2.5) {
                    if (! isset($result[$teams[0]]['away']['2.5'])) {
                        $result[$teams[0]]['away']['2.5'] = 1;
                    } else {
                        $result[$teams[0]]['away']['2.5']++;
                    }
                }
            }

            if ($fields[3] == $teams[1]) {
                if (! isset($result[$teams[1]]['home']['total'])) {
                    $result[$teams[1]]['home']['total'] = 1;
                } else {
                    $result[$teams[1]]['home']['total']++;
                }

                if ($fields[5] + $fields[6] >= 1.5) {
                    if (! isset($result[$teams[1]]['home']['1.5'])) {
                        $result[$teams[1]]['home']['1.5'] = 1;
                    } else {
                        $result[$teams[1]]['home']['1.5']++;
                    }
                }

                if ($fields[5] + $fields[6] >= 2.5) {
                    if (! isset($result[$teams[1]]['home']['2.5'])) {
                        $result[$teams[1]]['home']['2.5'] = 1;
                    } else {
                        $result[$teams[1]]['home']['2.5']++;
                    }
                }
            }

            if ($fields[4] == $teams[1]) {
                if (! isset($result[$teams[1]]['away']['total'])) {
                    $result[$teams[1]]['away']['total'] = 1;
                } else {
                    $result[$teams[1]]['away']['total']++;
                }

                if ($fields[5] + $fields[6] >= 1.5) {
                    if (! isset($result[$teams[1]]['away']['1.5'])) {
                        $result[$teams[1]]['away']['1.5'] = 1;
                    } else {
                        $result[$teams[1]]['away']['1.5']++;
                    }
                }

                if ($fields[5] + $fields[6] >= 2.5) {
                    if (! isset($result[$teams[1]]['away']['2.5'])) {
                        $result[$teams[1]]['away']['2.5'] = 1;
                    } else {
                        $result[$teams[1]]['away']['2.5']++;
                    }
                }
            }
        }
    }
    
    dd($result);
});
