<?php

function bases($splits)
{
    $result = 0;

    foreach ($splits as $split) {
        if ($split['stat']['totalBases'] > 1) {
            $result = $result + 1;
        }
    }

    return $result . ' de ' . 15;
}
