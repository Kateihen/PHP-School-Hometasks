<?php

require_once __DIR__ . "/SingleLogger.php";

SingleLogger::log('Started');

$l1 = SingleLogger::getLogger();
$l2 = SingleLogger::getLogger();

if($l1 === $l2) {
    SingleLogger::log('Singleton logger has only one instance.');
} else {
    SingleLogger::log('SingleLogger has more than one instance - something went wrong.');
}

SingleLogger::log('Finished');
