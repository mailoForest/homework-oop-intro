<?php

namespace Communication;

class Call 
{
	private $priceForAMinute;
	private $caller;
	private $receiver;
	private $duration;
	
	public function __construct($caller, $receiver, $duration)
	{
		$this->caller = $caller;
		$this->receiver = $receiver;
		$this->duration = $duration;
	}
	
	public function getPriceForAMinute()
	{
		return $this->priceForAMinute;
	}
	public function setPriceForAMinute($priceForAMinute)
	{
		$this->priceForAMinute = $priceForAMinute;
	}
	

	public function getCaller()
	{
		return $this->caller;
	}
	public function setCaller($caller)
	{
		$this->caller = $caller;
	}
	
	public function getReceiver()
	{
		return $this->receiver;
	}
	public function setReceiver($receiver)
	{
		$this->receiver = $receiver;
	}
	
	public function getDuration()
	{
		return $this->duration;
	}
	public function setDuration($duration)
	{
		if ($duration > 0 && $duration <= 120){
			$this->duration = $duration;
		}
	}
	
}