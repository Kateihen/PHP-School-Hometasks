<?php
namespace App;

class Truck extends Car
{
	protected $type = 'Truck';
	private $loadCapacity;

	public function setLoadCapacity(int $c)
	{
		if ($c > 9000 || $c < 60000) {
			$this->loadCapacity = $c;
		} else {
			throw new Exception("Load Capacity is wrong.");
		}
	}

	public function getInfo() : array
    {
        $info = [
            'Type' => $this->type,
            'Brand' => $this->brand,
            'Model' => $this->model,
            'Year' => $this->year,
            'VIN-Code' => $this->vinCode,
            'Load Capacity' => $this->loadCapacity,
        ];
        return $info;
    }
}
