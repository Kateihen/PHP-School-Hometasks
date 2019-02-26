<?php

class linkedList
{
    private $head = null;
    private $tail = null;

    public function append($value)
    {
        $newElement = new separateNode($value);

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
        $newElement = new separateNode($value);

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
        }
        $this->head = $this->head->getNext();
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
        $newElement = new separateNode($value);

        $this->search($item)

        if (!empty($current->getNext())) {
            $n = $current->getNext();
            $newElement->setNext() = $n;
            $n->setPrevious($newElement);
        }
        $newElement->setPrevious($current);
        $current->setNext($newElement);
    }

    public function insertBeforeItem($value, $item)
    {
        $newElement = new separateNode($value);

        $this->search($item)

        $newElement->setNext($current);
        $prev = $current->getPrevious();
        $current->setPrevious($newElement);
        $prev->setNext($newElement);
        $newElement->setPrevious($prev);
        }
    }

    public function delete($item)
    {
        $this->search($item);
        $n = $current->getNext();
        $prev = $current->getPrevious();
        $prev->setNext($n);
        $nextEl->setPrevious($prev);
        unset($current);
    }
}
