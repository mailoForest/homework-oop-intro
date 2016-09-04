<?php

namespace Communication;

use Communication\Call;

class GSM 
{
	private $model;
	
	private $hasSim;
	private $simMobileNumber;
	
	private $lastIncomingCall;
	private $lastOutgoingCall;
	
	private $outgoingCallsDuration;
	
	public function __construct($model)
	{
		$this->model = $model;
		$this->hasSim = false;
	}
	
	public function getMobileNumber() 
	{
		return $this->simMobileNumber;
	}
	public function getOutgoingCallsDuration()
	{
		return $this->outgoingCallsDuration;
	}
	
	public function insertSimCard($simMobileNumber)
	{
		$mobileNumberPattern = '/08[7-9][0-9]{7}/';
		$result = preg_match($mobileNumberPattern, $simMobileNumber);
		
		$this->simMobileNumber = $result ? $simMobileNumber : '';
		$this->hasSim = $result ? true : false;
	}
	
	public function removeSimCard()
	{
		$this->simMobileNumber = '';
		$this->hasSim = false;
	}
	
	public function call(GSM $receiver, $duration)
	{
		if ($duration < 0 || $duration > 120){
			throw new \Exception('The duration must be between 0 and 120 minutes.');
		}
		if ($this->simMobileNumber == $receiver->simMobileNumber){
			throw new \Exception('You can\'t call yourself from your number.');
		}
		if (!$this->hasSim || !$receiver->hasSim){
			throw new \Exception('The duration must be between 0 and 120 mintes.');
		}
		
		$call = new Call($this->getMobileNumber(), $receiver->getMobileNumber(), $duration);
		$this->lastOutgoingCall = $duration;
		$receiver->lastIncomingCall = $call->getDuration();
		$this->outgoingCallsDuration += $call->getDuration();
		$receiver->outgoingCallsDuration += $call->getDuration();
	}
	public function getSumForCall($priceForAMinute)
	{
		return $this->outgoingCallsDuration*$priceForAMinute . ' lv.';
	}
	
	public function printInfoForTheLastOutgoingCall()
	{
		return sprintf('The last outgoing call was %s minutes with number %s.', $this->lastOutgoingCall, $this->getMobileNumber());
	}
	public function printInfoForTheLastIncomingCall()
	{
		return sprintf('The last incoming call was %s minutes with number %s.', $this->lastIncomingCall, $this->getMobileNumber());
	}
}