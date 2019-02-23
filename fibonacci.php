<?php

function fibonacci($x) 
{
	$j = 1;
	$k = 0;
	for ($i = 0; $i <= $x - 1; $i++) {
		$temp = $j;
		$j += $k;
		$k = $temp;
	}
	if ($x = 0) {
		var_dump($j);
	}
	if($x < 0) {
		echo "No result";
	}
	var_dump($j);
}

fibonacci(8);
