<?php

require_once __DIR__ . "/ResolverInterface.php";
require_once __DIR__ . "/linkedList.php";

class CollisionResolverLinkedList implements ResolverInterface
{
    public function resolve($index, $hranilishche, $size)
    {
        $newList = new linkedList();
        $newList->insert($hranilishche[$index]);
        $newList->insert($value);

    }

    public function resolveRead($index, $hranilishche)
    {
        $newList = $hranilishche[$index];
        return $newList->search($value);
    }
}
