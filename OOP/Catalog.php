<?php
require_once __DIR__ . "/Car.php";

class Catalog
{
	private $cars = [];

	public function addCar(Car $car)
	{
		$this->cars[] = $car;
	}

	public function getAllCarsInfo()
	{
			return $this->cars;
	}

    public function getCarInfo(Car $car)
    {
        $ind = array_search($car, $this->cars);
        return $this->cars[$ind]->getInfo();
    }
}
