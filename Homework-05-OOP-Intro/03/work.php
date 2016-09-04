<?php

require_once 'autoload.php';

use Employee\Employee;

$worker1 = new Employee('Rihanna');
$worker2 = new Employee('Drake');
$worker3 = new Employee('Iggy Azalea');

$worker1->setCurrentTask('work, work, work, work, work, work, work', 7);
$worker1->setHoursLeft(9);

$worker2->setCurrentTask('Help Rihanna work', 5);
$worker2->setHoursLeft(2);

$worker3->setCurrentTask('Work', 10);
$worker3->setHoursLeft(10);

$worker1->work();
$worker2->work();
$worker3->work();