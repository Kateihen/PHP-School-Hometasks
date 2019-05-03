<?php
use App\{Truck, PassengerCar, Catalog};

require_once __DIR__ . "/vendor/autoload.php";

$carreraGT = new PassengerCar();

$carreraGT->setBrand('Porsche');
$carreraGT->setModel('Carrera GT');
$carreraGT->setYear(2006);
$carreraGT->setVinCode('1HGBH41JXMN109186');
$carreraGT->setPackage('Premium');

$columbia = new Truck();

$columbia->setBrand('Freightline');
$columbia->setModel('CL Columbia');
$columbia->setYear(2010);
$columbia->setVinCode('3HIG4BY4OU2BO8974');
$columbia->setLoadCapacity(45000);

$cat = new Catalog();
$cat->addCar($carreraGT);
$cat->addCar($columbia);
print_r($cat->getAllCarsInfo());
echo json_encode($cat->getCarInfo($columbia));
