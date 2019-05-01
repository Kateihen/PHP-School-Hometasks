<?php

class Node
{
	private $value;
	private $next;
	private $position;

	public function setValue($value)
	{
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function setNext($next)
	{
		$this->next = $next;
	}

	public function getNext()
	{
		return $this->next;
	}

	public function setPosition($position)
	{
		$this->position = $position;
	}

	public function getPosition()
	{
		return $this->position;
	}
}
