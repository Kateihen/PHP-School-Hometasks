<?php

class separateNode
{
    private $value;
    private $next = null;
    private $previous = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
    	return $this->value;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }
  
    public function getNext()
    {
        return $this->next;
    }

    public function setPrevious($previous)
    {
        $this->previous = $previous;
    }

    public function getPrevious()
    {
        return $this->previous;
    }
}
