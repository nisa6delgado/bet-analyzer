<?php

function prop($splits, $prop)
{
    $propT = 0;
    $propL15 = 0;
    $line = 0;

    if ($prop == 'bases') {
        $prop = 'totalBases';
        $line = 1;
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
