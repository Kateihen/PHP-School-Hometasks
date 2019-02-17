<?php

class symmetryTest
{
    private $input;
    private $fullArr;
    private $half;
    private $stack;
    private $top = 0;
    private $queue;
    private $head = 0;

    public function __construct($value)
    {
        $this->input = $value;
        $this->fullArr = str_split($this->input);
        $this->split($this->fullArr);
    }

    private function split($value)
    {
        $this->half = count($value) / 2;
        if(count($value) % 2) {
            echo 'Not symmetrical. Please, try again.' . PHP_EOL;
        } else {
            for ($i = 0; $i <= $this->half - 1; $i++){
                $this->queue[$i] = $this->fullArr[$i];
            }
            for ($k = $this->half, $b = count($value) - 1; $k <= $b; $k++) {
                $this->stack[$this->top++] = $this->fullArr[$k];
            }
            $this->symmetry();
        }
    }

    public function symmetry()
    {
        if ($this->queue[$this->head] === $this->stack[--$this->top]) {
            $this->head++;
            // var_dump($this->top);
            if ($this->top < 0) {
                echo 'Symmetrical! Congratulations!' . PHP_EOL;
            } else {
                $this->symmetry();
            }
        } else {
            echo 'Sorry, not symmetrycal. Please, try again.' . PHP_EOL;
        }
    }
}

if (!isset($argv[1])) {
    echo "Please, enter a string." . PHP_EOL;
} else {
    $obj = new symmetryTest($argv[1]);
}
