<?php
namespace App;

class PassengerCar extends Car
{
    protected $type = 'Passenger car';
    private $package;

    public function setPackage(string $p)
    {
        $this->package = $p;
    }

    public function getInfo() : array
    {
        $info = [
            'Type' => $this->type,
            'Brand' => $this->brand,
            'Model' => $this->model,
            'Year' => $this->year,
            'VIN-Code' => $this->vinCode,
            'Package' => $this->package,
        ];
        return $info;
    }
}
