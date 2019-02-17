<?php

class twoStacksOneQueue
{
    private $stack1 = [];
    private $stack2 = [];
    private $top1 = 0;
    private $top2 = 0;

    public function in($value)
    {
        $this->stack1[$this->top1++] = $value;
    }

    public function isEmpty()
    {
        return $this->top1 === 0 && $this->top2 === 0;
    }

    public function out()
    {
        if($this->isEmpty()) {
            throw new RuntimeException('Queue is empty!');
        }
        if($this->top1 >= 0 && $this->top2 === 0) {
            while($this->top1 > 0) {
                $this->stack2[$this->top2++] = $this->stack1[--$this->top1];
            }
            return $this->stack2[--$this->top2];
        } else {
            return $this->stack2[--$this->top2];
        }

    }
}

$obj = new twoStacksOneQueue;
$obj->in(9);
$obj->in('abrakadabra');
$obj->in(12);
$obj->in('abc');
$obj->in(8);
$obj->in('cba');
var_dump($obj->out());
var_dump($obj->out());
var_dump($obj->out());
var_dump($obj->out());
var_dump($obj->out());
var_dump($obj->out());
var_dump($obj->out());
