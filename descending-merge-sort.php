<?php

$a = [4, 7, 1, 3, -8, 0, 2, 6];

echo 'Before sorting: ' . PHP_EOL;
echo json_encode($a) . PHP_EOL;

function merge(&$a, $p, $q, $r)
{
    $n1 = $q - $p + 1;
    $n2 = $r - $q;

    $L = [];
    $R = [];

    for ($i = 1; $i <= $n1; $i++) {
        $L[$i] = $a[$p + $i - 1];
    }
    for ($j = 1; $j <= $n2; $j++) {
        $R[$j] = $a[$q + $j];
    }

    $L[$n1 + 1] = -10000000;
    $R[$n2 + 1] = -10000000;
    
    $i = 1;
    $j = 1;

    for ($k = $p; $k <= $r; $k++) {
        if($L[$i] >= $R[$j]) {
            $a[$k] = $L[$i];
            $i = $i + 1;
        } else {
            $a[$k] = $R[$j];
            $j = $j + 1;
        }
    }
}

function mergeSort(&$a, $p, $r)
{
    if($p < $r) {
        $q = floor(($p + $r) / 2);
        mergeSort($a, $p, $q);
        mergeSort($a, $q + 1, $r);
        merge($a, $p, $q, $r);
    }
}

mergeSort($a, 0, count($a) - 1);

echo 'After sorting: ' . PHP_EOL;
echo json_encode($a);
