<?php

use Communication\GSM;

require_once 'autoload.php';

$gsm1 = new GSM('motorola');
$gsm1->insertSimCard('0874123456');
new GSM('123');
$gsm2 = new GSM('siemens');
$gsm2->insertSimCard('0874123458');

$gsm1->call($gsm2, 10);
//$gsm1->call($gsm1, 10); //Uncaught exception 'Exception' with message 'You can't call yourself from your number.'
$gsm2->call($gsm1, 80);

var_dump($gsm1, $gsm2);

var_dump($gsm1->printInfoForTheLastIncomingCall());
var_dump($gsm1->printInfoForTheLastOutgoingCall());

var_dump($gsm1->getMobileNumber());
var_dump($gsm1->getOutgoingCallsDuration());
var_dump($gsm1->getSumForCall(0.33));
$gsm1->removeSimCard();
var_dump($gsm1);

$gsm1->insertSimCard('0895664897');
var_dump($gsm1);