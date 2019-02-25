<?php

$a = [2, 67, 7, 13, 8, 1, 4];

function myFunc($a, $n)
{
	$a2 = [];
	for($i = 0, $k = count($a); $i < $k; $i++) {
		foreach($a as $key => $value) {
			if ($i < $key && $a[$i] + $value == $n) {
				$temp = [$i, $key];
				$a2[] = $temp;
			}
		}
	}
	echo json_encode($a2) . PHP_EOL;
}

myFunc($a, 9);
