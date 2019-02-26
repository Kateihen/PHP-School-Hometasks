<?php

$linkedList = new linkedList();

$linkedList->append("1hello");
$linkedList->append("2hello");
$linkedList->append("3hello");
$linkedList->prepend("0hello");
$linkedList->deleteFromEnd();
$linkedList->deleteFromHead();
$linkedList->search("2hello");
$linkedList->delete();
