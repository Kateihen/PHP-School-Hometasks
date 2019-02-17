<?php

$a = [3, 9, 16, -5, 23, 48, 38];

echo 'Before sorting: ' . PHP_EOL;
echo json_encode($a) . PHP_EOL;

function bubble(&$a)
{
    $l = count($a);
    for ($i = 0; $i < $l; $i++) {
        for ($j = $l - 1; $j > $i; $j--) {
            if ($a[$j] < $a[$j - 1]) {
                $temp = $a[$j];
                $a[$j] = $a[$j - 1];
                $a[$j - 1] = $temp;
            }
        }
    }
}

bubble($a);
echo 'After sorting: ' . PHP_EOL;
echo json_encode($a); //I don't understand why there's 'null' at the beginnign of the list :(
