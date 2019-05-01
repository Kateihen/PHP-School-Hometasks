<?php

require_once __DIR__ . "/hashFunction.php";
require_once __DIR__ . "/CollisionResolver/ResolverInterface.php";

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
            $this->storage = $this->collisionResolver->resolve($index, $this->storage, $value, $this->hashTableMaxLenght);
        } else {
            $this->storage[$index] = $value;
        }
    }

    public function read($index, $value)
    {
        if($this->storage[$index] == $value) {
            $info = [
                'index' => $index,
                'value' => $value,
                ];
            echo json_encode($info) . PHP_EOL;
        } else {
            $elem = $this->collisionResolver->resolveRead($index, $this->storage, $value, $this->hashTableMaxLenght);
            print_r($elem) . PHP_EOL;
        }
    }
}
