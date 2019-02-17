<?php

class twoQueuesOneStack
{
    private $queue1 = [];
    private $queue2 = [];
    private $head1 = 0;
    private $head2 = 0;
    private $tail1 = 0;
    private $tail2 = 0;

    public function in($value)
    {
        $this->queue1[$this->tail1++] = $value;
    }

    public function isEmpty()
    {
        return $this->head1 === $this->tail1 && $this->head2 === $this->tail2;
    }

    public function out()
    {
        if($this->isEmpty()) {
            throw new RuntimeException('Stack is empty!');
        }
        if($this->tail1 >= 0 && $this->tail2 === 0) {
            while($this->tail1 > 0) {
                $this->queue2[$this->tail2++] = $this->queue1[--$this->tail1];
            }
            return $this->queue2[$this->head2++];
        } else {
            return $this->queue2[$this->head2++];
        }
    }
}

$obj = new twoQueuesOneStack;
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
