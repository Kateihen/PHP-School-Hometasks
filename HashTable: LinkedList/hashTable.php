<?php

require_once __DIR__ . "/hashFunction.php";
require_once __DIR__ . "/CollisionResolver/ResolverInterface.php";

class HashTable
{
    public $storage = [];
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
            $this->storage = $this->collisionResolver->resolve($index, $this->storage, $value);
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
            $listNode = $this->collisionResolver->resolveRead($index, $this->storage, $value);
            print_r($listNode) . PHP_EOL;
        }
    }
}
