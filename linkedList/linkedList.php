<?php

require_once __DIR__ . "/separateNode.php";

class linkedList extends separateNode
{
    private $head = null;
    private $tail = null;

    public function append($value)
    {
        $newElement = new separateNode();
        $newElement->setValue($value);

        if(!empty($this->head)) {
            $this->tail->setNext($newElement);
            $newElement->setPrevious($this->tail);
            $this->tail = $newElement;

        } else {
            $this->head = $newElement;
            $this->tail = $newElement;
        }
    }

    public function prepend($value)
    {
        $newElement = new separateNode();
        $newElement->setValue($value);

        if(!empty($this->head)) {
            $newElement->setNext($this->head);
            $this->head->setPrevious($newElement);
            $this->head = $newElement;
        } else {
            $this->head = $newElement;
            $this->tail = $newElement;
        }
    }

    public function deleteFromHead()
    {
        if(empty($this->head)) {
            throw new RunTimeException("List is empty.");
        } else {
            $n = $this->head->getNext();
            $this->head = $n;
            $this->head->setPrevious(null);
        }
    }

    public function deleteFromEnd()
    {
        if(!empty($this->head)) {
            $prev = $this->tail->getPrevious();
            $this->tail = $prev;
            $this->tail->setNext(null);
            
        } else {
            echo 'List is empty.' . PHP_EOL;
        }
    }

    public function search($item)
    {
        $current = $this->head;
        while(!($item === $current->getValue())) {
            $current = $current->getNext();
        }
        return $current;
    }

    public function insertAfterItem($value, $item)
    {
        $newElement = new separateNode();
        $newElement->setValue($value);

        $current = $this->search($item);

        if (!empty($current->getNext())) {
            $n = $current->getNext();
            $newElement->setNext($n);
            $n->setPrevious($newElement);
            $newElement->setPrevious($current);
        } else {
            $newElement->setPrevious($current);
            $current->setNext($newElement);
        }
    }

    public function insertBeforeItem($value, $item)
    {
        $newElement = new separateNode();
        $newElement->setValue($value);

        $current = $this->search($item);

        $newElement->setNext($current);
        $current->setPrevious($newElement);
        $prev = $current->getPrevious();
        $prev->setNext($newElement);
        $newElement->setPrevious($prev);
    }

    public function delete($item)
    {
        $current = $this->search($item);

        $prev = $current->getPrevious();
        $n = $current->getNext();
        if (!empty($n)) {
            $n->setPrevious($prev);
        }
        $prev->setNext($n);
        unset($current);
    }
}
