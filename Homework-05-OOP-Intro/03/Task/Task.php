<?php

namespace Task;

class Task
{
	private $name;
	private $workingHours;
	
	public function __construct($name, $workingHours)
	{
		if (empty($name) || !is_numeric($workingHours)){
			throw new \Exception("You must enter a name! The working hours must be numeric!");
		}
		$this->name = $name;
		$this->workingHours = $workingHours;
	}
	
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		if (empty($name)){
			throw new \Exception("You must enter a name!");
		}
		$this->name = $name;
	}
	
	public function getWorkingHours()
	{
		return $this->workingHours;
	}
	public function setWorkingHours($workingHours)
	{
		if (!is_numeric($workingHours)){
			throw new \Exception('The working hours must be numeric!');
		}
		$this->workingHours = $workingHours;
	}
}