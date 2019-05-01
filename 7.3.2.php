<?php

class bracesSymmetry 
{
    private $braces;
    private $openBraces = ['(', '{', '[', '<',];
    private $closeBraces = [
        '(' => ')',
        '{' => '}',
        '[' => ']',
        '<' => '>',
        ];
    private $balance = [];
    public $result;

    public function __construct($value)
    {
        $this->braces = $value;
        $this->areValidBraces($this->braces);
    }

    private function areValidBraces($braces)
    {
        if ($braces === '') {
            $this->result = true;
            var_dump($this->result);

        } elseif (!is_string($braces)) {
            echo 'Not a string. Please, try again.' . PHP_EOL;
        }

        for ($i = 0; $i < strlen($braces); $i++) {

            if (!(in_array($braces[$i], $this->openBraces)
               || in_array($braces[$i], $this->closeBraces))) {
                echo 'Invalid string. Please, try again.' . PHP_EOL;

            } elseif (in_array($braces[$i], $this->openBraces)) {
               array_push($this->balance, $braces[$i]);

            } elseif ($braces[$i] == $this->closeBraces[array_pop($this->balance)]) {
               continue;

            } else {
               $this->result = false;
               array_push($this->balance, $braces[$i]);
            }
        }
        if (count($this->balance) === 0) {
            $this->result = true;
        }
        var_dump($this->result);
    }
}

$obj = new bracesSymmetry('{[(<>)]}');
