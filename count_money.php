<?php

$x = $argv[1];
$money = array();

function get_money(int $a)
{
    if ($a / 500 >= 1) {
        $mod1 = $a % 500;
        $n500 = intval($a / 500);
        $money[500] = $n500;
        $a = $mod1;
    }

    if ($a / 200 >= 1) {
        $mod2 = $a % 200;
        $n200 = intval($a / 200);
        $money[200] = $n200;
        $a = $mod2;
    }

    if ($a / 100 >= 1) {
        $mod3 = $a % 100;
        $n100 = intval($a / 100);
        $money[100] = $n100;
        $a = $mod3;
    }

    if ($a / 50 >= 1) {
        $mod4 = $a % 50;
        $n50 = intval($a / 50);
        $money[50] = $n50;
        $a = $mod4;
    }

    if ($a / 20 >= 1) {
        $mod5 = $a % 20;
        $n20 = intval($a / 20);
        $money[20] = $n20;
        $a = $mod5;
    }

    if ($a / 10 >= 1) {
        $mod6 = $a % 10;
        $n10 = intval($a / 10);
        $money[10] = $n10;
        $a = $mod6;
    }

    if ($a / 5 >= 1) {
        $mod7 = $a % 5;
        $n5 = intval($a / 5);
        $money[5] = $n5;
        $a = $mod7;
    }

    if ($a / 2 >= 1) {
        $mod8 = $a % 2;
        $n2 = intval($a / 2);
        $money[2] = $n2;
        $a = $mod8;
    }

    if ($a / 1 >= 1) {
        $money[1] = $a;
    }
    echo json_encode($money, JSON_PRETTY_PRINT);
}

if ($x > 100000) {
	echo "Sorry, the maximum sum is 100 000 UAH. Please, enter another sum or use another ATM.";
} else {
	get_money($x);
}
