<?php

require_once __DIR__ . "/hashFunction.php";

class HashTable
{
    private $storage = [];
    private $hashTableMaxLenght;
    private $collisionResolver;

    public function __construct($hashTableMaxLenght, ResolverInterface $collisionResolver)
    {
        $this->hashTableMaxLenght = $hashTableMaxLenght;
        $this->collisionResolver = $collisionResolver;
    }

    public function write($index, $value)
    {
        if(isset($this->storage[$index]) && !empty($this->storage[$index])) {
            $newIndex = $this->collisionResolver->resolve($index, $this->storage, $this->hashTableMaxLenght);
            $this->storage[$newIndex] = $value;
        } else {
            $this->storage[$index] = $value;
        }
    }

    public function read($index, $value)
    {
        if($this->storage[$index] == $value) {
            echo $index . ' : ' . $value . PHP_EOL;
        } else {
            $newIndex = $this->collisionResolver->resolveRead($index, $this->storage; $this->hashTableMaxLenght);
            echo $newIndex . ' : ' . $value . PHP_EOL;
            }
        }
    }
}
