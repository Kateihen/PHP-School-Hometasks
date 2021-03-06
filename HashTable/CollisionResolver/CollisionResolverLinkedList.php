<?php

require_once __DIR__ . "/ResolverInterface.php";
require_once __DIR__ . "/linkedList.php";

class CollisionResolverLinkedList implements ResolverInterface
{
    public function resolve($index, $hranilishche, $value, $size)
    {
        $initialValue = $hranilishche[$index];
        $hranilishche[$index] = new linkedList();
        $hranilishche[$index]->insert($initialValue);
        $hranilishche[$index]->insert($value);
        return $hranilishche;
    }

    public function resolveRead($index, $hranilishche, $value, $size)
    {
        $NodeInList = $hranilishche[$index]->search($value);
        return $NodeInList;
    }
}
