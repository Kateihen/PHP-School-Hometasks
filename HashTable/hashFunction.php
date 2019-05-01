<?php

class HashFunction
{
	private $valueToHash;
	private $hashTableLength;

	public function __construct($valueToHash, $hashTableLength)
	{
		$this->valueToHash = $valueToHash;
		$this->hashTableLength = $hashTableLength;
	}

	public function __invoke()
	{
		$sumOfAsciiCodes = 0;

		for ($i = 0, $strlen = strlen($this->valueToHash); $i < $strlen; $i++) {
			$letter = $this->valueToHash[$i];
			$sumOfAsciiCodes += ord($letter);
		}
		return $sumOfAsciiCodes % $this->hashTableLength;
	}
}
