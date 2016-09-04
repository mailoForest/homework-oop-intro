<?php

class Computer 
{
	private $name;
	private $year;
	private $price;
	private $hardDiskMemory;
	private $freeMemory;
	private $operationSystem;
	private $isNotebook;
	
	
	public function __construct($year, $price, $hardDiscMemory, $freeMemory, $operationSystem, $isNotebook, $name)
	{
		$this->year = $year;
		$this->price = $price;
		$this->hardDiskMemory = $hardDiscMemory;
		$this->freeMemory = $freeMemory;
		$this->operationSystem = $operationSystem;
		$this->isNotebook = is_bool($isNotebook) ? $isNotebook : true;
		$this->name = $name;
	}
	
	public function changeOperationSystem ($newOperationSystem)
	{
		$this->operationSystem = $newOperationSystem;
	}
	public function useMemory($memory)
	{
		if ($this->freeMemory < $memory) {
			echo "Not enough free memory on $this->name!", PHP_EOL;
			return;
		} 
			$this->freeMemory -= $memory;
	}
}