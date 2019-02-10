<?php

$rib = $argv[1];

function snake($r)
{
    $edge = $r;
    $r2 = $r ** 2 - $r;
    for ($i = 1; $i <= $r; $i++) {
        echo $i . ' ';
        for ($j = $i; $j <= $r2; ) {
            $j += ($edge * 2 - 1);
            echo $j . ' ';
            if ($j <= $r2) {
                $j += $r - ($edge - $i);
                echo $j . ' ';
            }
        }
        echo PHP_EOL;
        $edge--;
    }
}

if (!isset($rib)) {
    echo "Please, enter a number.";
} elseif (!is_numeric($rib)) {
    echo "Please, enter a number.";
} else {
    snake($rib);
}
