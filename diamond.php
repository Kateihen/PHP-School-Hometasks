<?php

$height = $argv[1];

function diamond($h)
{
    $half = $mid = ($h - 1) / 2;
    for ($i = 0; $i <= $mid; $i++) {
        for ($j = 0; $j < $half; $j++) {
            echo ' ';
        }
        for ($k = 0; $k < $h - $half * 2; $k++) {
            echo '*';
        }
        echo PHP_EOL;
        $half--;
    }
    $half++;
    for ($i = 0; $i < $mid; $i++) {
        $half++;
        for ($j = 0; $j < $half; $j++) {
            echo ' ';
        }
        for ($k = $h - $half * 2; $k > 0; $k--) {
            echo '*';
        }
        echo PHP_EOL;
    }
}

if (!isset($height)) {
    echo "Please, enter a number.";
} elseif (!is_numeric($height)) {
    echo "Please, enter an odd number.";
} elseif (!($height % 2)) {
    echo "Please, enter a number that is odd.";
} else {
    diamond($height);
}
