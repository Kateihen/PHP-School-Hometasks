<?php

require_once __DIR__ . "/treeNode.php";

class binaryTree extends treeNode
{
    private $root;
    private $parent;

    public function insert()
    {
        $newElement = new treeNode();
        $newElement->setValue($value);

        if(!empty($this->root)){
            $current = $this->root;
            $parent = null;
            $this->addNode($newElement, $current, $parent);
        } else {
            $this->root = $newElement;
        }
    }

    public function addNode($newElement, &$current, &$parent)
    {           
        if(!empty($current)) {
            if ($newElement->getValue() < $current->getValue()) {
                $parent = $current;
                $current = $current->getLChild();
                $this->addNode($newElement, $current, $parent);
            } else {
                $parent = $current;
                $current = $current->getRChild();
                $this->addNode($newElement, $current, $parent);
            }
        } else {
            $current = $newElement;
            $newElement->setAncestor($parent);
            if ($newElement->getValue() < $parent->getValue()) {
                $parent->setLChild($newElement);
            } else {
            $parent->setRChild($newElement);
            }
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
