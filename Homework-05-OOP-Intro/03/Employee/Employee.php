<?php

namespace Employee;

use Task\Task;

class Employee
{
	private $name;
	private $currentTask;
	private $hoursLeft;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		if (empty($name)){
			throw new \Exception('You must enter a name!');
		}
		$this->name = $name;
	}
	
	public function getHoursLeft()
	{
		return $this->hoursLeft;
	}
	public function setHoursLeft($hoursLeft)
	{
		if (!is_numeric($hoursLeft)){
			throw new \Exception('You must enter a number!');
		}
		$this->hoursLeft = $hoursLeft;
	}
	
	public function getCurrentTask()
	{
		return $this->currentTask;
	}
	public function setCurrentTask($name, $workingHours)
	{
		$this->currentTask = new Task($name, $workingHours);
	}
	
	public function work()
	{
		$hoursLeft = $this->getHoursLeft();
		$workingHours = $this->currentTask->getWorkingHours();
		
		if ($hoursLeft > $workingHours){
			$this->setHoursLeft($hoursLeft - $workingHours);
			$this->currentTask->setWorkingHours(0);
			//return "The task is done. The hours left till the end of the day: $hoursLeft.";
		}
		if ($hoursLeft < $workingHours){
			$this->currentTask->setWorkingHours($workingHours - $hoursLeft);
			$this->setHoursLeft(0);
			//return "The work day is over. There are $workingHours hours left to complete the task.";
		}
		if ($hoursLeft == $workingHours){
			$this->currentTask->setWorkingHours(0);
			$this->setHoursLeft(0);
			//return "The work day is over and the task is completed.";
		}
		echo $this->showReport();
		return;
	}
	public function showReport ()
	{
		return sprintf('
				Name:                                        %s
				Task name:                                   %s
				Hours left till the end of the working day:  %02d
				Hours left till completion of the task:      %02d
				', $this->name, $this->currentTask->getName(),
				$this->getHoursLeft(), $this->currentTask->getWorkingHours());
	}
}