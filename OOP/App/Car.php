<?php
namespace App;

abstract class Car
{
    protected $type;
    protected $brand;
    protected $year;
    protected $model;
    protected $vinCode;

    public function setBrand(string $b)
    {
        $this->brand = $b;
    }

    public function setYear(int $y)
    {
        if ($y > 1672 && $y < date("Y")) {
            $this->year = $y;
        } else {
            throw new Exception("Wrong year.");
        }
    }
    
    public function setModel(string $m)
    {
        $this->model = $m;
    }
    
    public function setVinCode(string $v)
    {
        if (strlen($v) < 11 || strlen($v) > 17) {
            throw new Exception("Wrong VIN-code.");
        } else {
            $this->vinCode = $v;
        }
    }

    abstract public function getInfo();
}
