<?php

require_once __DIR__ . "/ResolverInterface.php";

class CollisionResolverPlus1 implements ResolverInterface
{
    public function resolve($index, $hranilishche, $size)
    {
        $flag = false;
        for ($j = $index + 1; ;$j++) {
            if ($j >= $size) {
                if ($flag) {
                    trow Exception('Our table is full.');
                }
                $j = 0;
                $flag = true;
            }
            if (isset($hranilishche[$j]) && !empty($hranilishche[$j])) {
                continue;
            } else {
                return $j;
            }
        }
    }

    public function resolveRead($index, $hranilishche, $size)
    {
        $flag = false;
        for ($j = $index + 1; ;$j++) {
            if ($j >= $size) {
                if ($flag) {
                    trow Exception('There is no such element in the table.');
                    }
                $j = 0;
                $flag = true;
            }
            if ($storage[$j] == $value) {
                return $j;
            }
        }
    }
}
