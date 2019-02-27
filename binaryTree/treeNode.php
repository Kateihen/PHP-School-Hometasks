<?php

class treeNode
{
    private $value;
    private $lChild = null;
    private $rChild = null;
    private $ancestor = null;

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setLChild($lChild)
    {
        $this->lChild = $lChild;
    }

    public function getLChild()
    {
        return $this->lChild;
    }

    public function setRChild($rChild)
    {
        $this->rChild = $rChild;
    }

    public function getRChild()
    {
        return $this->rChild;
    }

    public function setAncestor($ancestor)
    {
        $this->ancestor = $ancestor;
    }
}
