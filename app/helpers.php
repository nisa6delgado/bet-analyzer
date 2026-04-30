<?php

function goals($data, $market)
{
    $total_home = 0;
    $total_away = 0;

    foreach ($data->home as $item) {
        $total = $item->goals->home + $item->goals->away;

        if ($market == '1.5') {
            if ($total > 1.5) {
                $total_home++;
            }
        }
    }

    if ($total_home >= (count($data->home) / 2)) {
        $class_home = 'text-emerald-400';
    } else {
        $class_home = 'text-red-400';
    }

    foreach ($data->away as $item) {
        $total = $item->goals->home + $item->goals->away;

        if ($market == '1.5') {
            if ($total > 1.5) {
                $total_away++;
            }
        }
    }

    if ($total_away >= (count($data->away) / 2)) {
        $class_away = 'text-emerald-400';
    } else {
        $class_away = 'text-red-400';
    }

    $result = '<div class="font-black ' . $class_home . '">' . $total_home . ' de ' . count($data->home) . '</div>';
    $result .= '<div class="font-black ' . $class_away . '">' . $total_away . ' de ' . count($data->away) . '</div>';

    return $result;
}

function prop($splits, $prop)
{
    $propT = 0;
    $propL15 = 0;
    $line = 0;

    if ($prop == 'rbi') {
        $line = request()->rbi ?? 1;
    }

    if ($prop == 'bases') {
        $prop = 'totalBases';
        $line = request()->bases ?? 1;
    }

    if ($prop == 'ip') {
        $prop = 'inningsPitched';
        $line = request()->ip ?? 4.9;
    }

    if ($prop == 'k') {
        $prop = 'strikeOuts';
        $line = request()->k ?? 4;
    }

    if ($prop == 'bb') {
        $prop = 'baseOnBalls';
        $line = request()->bb ?? 2;
    }

    if ($prop == 'r') {
        $prop = 'runs';
        $line = request()->r ?? 2;
    }

    if ($prop == 'h') {
        $prop = 'hits';

        if (isset($splits[0]['stat']['era'])) {
            $line = request()->h ?? 3;
        } else {
            $line = request()->h ?? 0;
        }
    }

    if ($prop == 'hr') {
        $prop = 'homeRuns';
    }

    foreach ($splits as $split) {
        if (isset($split['stat'][$prop])) {
            if ($split['stat'][$prop] > $line) {
                $propT = $propT + 1;
            }
        }
    }

    if ($propT >= count($splits) / 2) {
        $colorT = 'text-emerald-400';
    } else {
        $colorT = 'text-red-400';
    }

    $result = '<div class="font-black">T: <span class="' . $colorT . '">' . $propT . ' de ' . count($splits) . '</span></div>';

    $splits = array_splice($splits, -15);

    foreach ($splits as $split) {
        if (isset($split['stat'][$prop])) {
            if ($split['stat'][$prop] > $line) {
                $propL15 = $propL15 + 1;
            }
        }
    }

    if ($propL15 >= count($splits) / 2) {
        $colorL15 = 'text-emerald-400';
    } else {
        $colorL15 = 'text-red-400';
    }

    $result .= '<div class="font-black">U15: <span class="' . $colorL15 . '">' . $propL15 . ' de ' . count($splits) . '</span></div>';

    return $result;
}
