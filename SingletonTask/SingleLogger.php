<?php

final class SingleLogger
{
    private static $instances = [];
    private $logFile;

    private function __construct()
    {
        $this->logFile = fopen('Logs', 'a');
    }

    private function __clon() {}

    private function __wakeup()
    {
        throw new Exception("Cannot serialise Singletone.");
    }

    public static function getLogger() : SingleLogger
    {
        $cls = static::class;
        if (!isset(static::$instances[$cls])) {
            static::$instances[$cls] = new static;
        }
        return static::$instances[$cls];
    }

    public function writeLog($message)
    {
        $date = date('Y-m-d-G-i-s');
        fwrite($this->logFile, "$date: $message \n");
    }

    public static function log($message)
    {
        $logger = static::getLogger();
        $logger->writeLog($message);
    }

}
