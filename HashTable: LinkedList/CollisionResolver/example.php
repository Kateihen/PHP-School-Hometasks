<?php

require_once __DIR__ . "/ResolverInterface.php";
require_once __DIR__ . "/hashTable.php";
require_once __DIR__ . "/hashFunction.php";
require_once __DIR__ . "/CollisionResolverLinkedList.php";
require_once __DIR__ . "/Node.php";
require_once __DIR__ . "/linkedList.php";

$hashTableLenght = 12;
$hashTable = new HashTable($hashTableLenght, new CollisionResolverLinkedList());

$str1 = "Ada";
$str2 = "Max";
$str3 = "Aad";
$str4 = "Lex";
$str5 = "Til";

$hashFunction = new hashFunction($string, $hashTableLenght);

$hashTable->write($hashFunction(), $str1);
$hashTable->write($hashFunction(), $str2);
$hashTable->write($hashFunction(), $str3);
$hashTable->write($hashFunction(), $str4);
$hashTable->write($hashFunction(), $str5);

$res = $hashTable->read($hashFunction(), $str2);
var_dump($res);
