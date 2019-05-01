<?php

require_once __DIR__ . "/Node.php";

class linkedList extends Node
{
    private $head;
    private $tail;
    private $count = 0;

    public function insert($value)
    {
        $newElement = new Node();
        $newElement->setValue($value);

        if(!empty($this->head)) {
            $this->tail->setNext($newElement);
            $this->tail = $newElement;

        } else {
            $this->head = $newElement;
            $this->tail = $newElement;
        }

        $this->count++;
        $newElement->setPosition($this->count);
    }

    public function search($value)
    {
        $current = $this->head;
        while(!($value == $current->getValue())) {
            $current = $current->getNext();
        }
        return $current;
    }
}
