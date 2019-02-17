<?php

class bracesSymmetry 
{
    private $braces;
    private $balance = [];
    public $result;

    public function __construct($value)
    {
        $this->braces = $value;
        $this->areValidBraces($this->braces);
    }

    public function areValidBraces($braces) 
    {
        if ($this->braces === '') {
            $this->result = true;
            var_dump($this->result);
        } elseif (!is_string($this->braces)) {
            echo 'Not a string. Please, try again.' . PHP_EOL;
        }

        for ($i = 0; $i < strlen($this->braces); $i++) {
           if (!($this->braces[$i] === '(' || $this->braces[$i] === ')'
               || $this->braces[$i] === '{' || $this->braces[$i] === '}' 
            || $this->braces[$i] === '[' || $this->braces[$i] === ']'
            || $this->braces[$i] === '<' || $this->braces[$i] === '>')) {
                echo 'Invalid string. Please, try again.' . PHP_EOL;
            } elseif ($this->braces[$i] === '(' || $this->braces[$i] === '{' 
            || $this->braces[$i] === '[' || $this->braces[$i] === '<') {
                array_push($this->balance, $this->braces[$i]);
            } elseif ($this->braces[$i] === ')') {
                if (array_pop($this->balance) !== '(') {
                    $this->result = false;
                    var_dump($this->result);
                }
            } elseif ($this->braces[$i] === '}') {
                if (array_pop($this->balance) !== '{') {
                    $this->result = false;
                    var_dump($this->result);
                }
            } elseif ($this->braces[$i] === ']') {
                if (array_pop($this->balance) !== '[') {
                    $this->result = false;
                    var_dump($this->result);
                }
                array_push($this->balance, $this->braces[$i]);
            } elseif ($this->braces[$i] === '>') {
                if (array_pop($this->balance) !== '<') {
                    $this->result = false;
                    var_dump($this->result);
                }
                array_push($this->balance, $this->braces[$i]);
            }
        }
        if (count($this->balance) == 0) {
            $this->result = true;
            var_dump($this->result);
        }
    }
}

if (!isset($argv[1])) {
    echo 'Please, enter some braces.' . PHP_EOL;
} else {
    $obj = new bracesSymmetry($argv[1]);
}
