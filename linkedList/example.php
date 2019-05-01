<?php
require_once __DIR__ . "/separateNode.php";
require_once __DIR__ . "/linkedList.php";

$linkedList = new linkedList();

$linkedList->append('1hello');
$linkedList->append('2hello');
$linkedList->append('3hello');
$linkedList->prepend('0hello');
$linkedList->deleteFromEnd();
$linkedList->deleteFromHead();
$res = $linkedList->search("2hello");
var_dump($res);
$linkedList->delete('2hello');
$res1 = $linkedList->search("1hello");
var_dump($res1);
