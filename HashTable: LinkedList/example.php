<?php

require_once __DIR__ . "/CollisionResolver/ResolverInterface.php";
require_once __DIR__ . "/hashTable.php";
require_once __DIR__ . "/hashFunction.php";
require_once __DIR__ . "/CollisionResolver/CollisionResolverLinkedList.php";
require_once __DIR__ . "/CollisionResolver/Node.php";
require_once __DIR__ . "/CollisionResolver/linkedList.php";

$hashTableLenght = 12;
$hashTable = new HashTable($hashTableLenght, new CollisionResolverLinkedList());

$str1 = "Ada";
$str2 = "Max";
$str3 = "Aad";

$hashFunction1 = new hashFunction($str1, $hashTableLenght);
$hashTable->write($hashFunction1(), $str1);

$hashFunction2 = new hashFunction($str2, $hashTableLenght);
$hashTable->write($hashFunction2(), $str2);

$hashFunction3 = new hashFunction($str3, $hashTableLenght);
$hashTable->write($hashFunction3(), $str3);

$hashTable->read($hashFunction1(), $str1);
$hashTable->read($hashFunction2(), $str2);
$hashTable->read($hashFunction3(), $str3);
