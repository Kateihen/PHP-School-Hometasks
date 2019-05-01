<?php

require_once __DIR__ . "/ResolverInterface.php";

class CollisionResolverPlus1 implements ResolverInterface
{
    public function resolve($index, $hranilishche, $value, $size)
    {
        $flag = false;
        for ($newIn = $index + 1; ;$newIn++) {
            if ($newIn >= $size) {
                if ($flag) {
                    throw new Exception('Our table is full.');
                }
                $newIn = 0;
                $flag = true;
            }
            if (isset($hranilishche[$newIn]) && !empty($hranilishche[$newIn])) {
                continue;
            } else {
                break;
            }

        }
        $hranilishche[$newIn] = $value;
        return $hranilishche;
    }

    public function resolveRead($index, $hranilishche, $value, $size)
    {
        $flag = false;
        for ($newIn = $index + 1; ;$newIn++) {
            if ($newIn >= $size) {
                if ($flag) {
                    throw new Exception('There is no such element in the table.');
                    }
                $newIn = 0;
                $flag = true;
            }
            if ($hranilishche[$newIn] == $value) {
                $info = [
                    'index' => $newIn,
                    'value' => $value,
                    ];
                return $info;
            }
        }
    }
}
