<?php

require_once __DIR__."./treeNode.php";

class binaryTree extends treeNode
{
    private $root;
    private $parent;
    private $current;

    public function insert()
    {
        $newElement = new treeNode();
        $newElement->setValue($value);

        if(!empty($this->root)){
            $this->addNode($newElement, $this->current, $this->parent);
        } else {
            $this->root = $newElement;
            $this->current = $this->root;
            $this->parent = $this->root;
        }
    }

    public function addNode($newElement, &$current, &$parent)
    {           
        while(!empty($this->current)) {
            if ($newElement->getValue() < $this->current->getValue()) {
                $this->parent = $this->current;
                $this->current = $this->current->getLChild();
                $this->addNode($newElement, $this->current, $this->parent);
            } else {
                $this->parent = $this->current;
                $this->current = $this->current->getRChild();
                $this->addNode($newElement, $this->current, $this->parent);
            }
        }
        $this->current = $newElement;
        $newElement->setAncestor($this->parent);
        if ($newElement->getValue() < $this->parent->getValue()) {
            $this->parent->setLChild($newElement);
        } else {
            $this->parent->setRChild($newElement);
        }
    }

    private function find($root, $level, &$maxLevel, $data)
    {
        if (!empty($this->root)) {
            $this->find($this->root->getLChild(), ++$level, $maxLevel, $data);
            if ($level > $maxLevel) {
                $maxLevel = $level;
                $data = $this->root->getValue;
            }
            $this->find($this->root->getRChild(), $level, $maxLevel, $data);
        }
    }

    public function deepestNode()
    {
        $data = null;
        $maxLevel = -1;

        $this->find($this->root, 0, $maxLevel, $data);
        var_dump($data);
    }
}
