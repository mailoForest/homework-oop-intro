<?php

require_once 'autoload.php';

$computer1 = new Computer(2016, 1500, 1000, 980, 'Windows 10', 1, 'Acer Aspire');
$computer2 = new Computer(2015, 1000, 512, 512, 'none', false, 'Lenovo WorkStation');

$computer1->changeOperationSystem('Ubunto');
$computer2->useMemory(100);
$computer1->useMemory(1000);
var_dump($computer1, $computer2);