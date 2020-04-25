<?php

use Crunz\Schedule;

$schedule = new Schedule();

// Helloworld
$schedule->run('echo Helloworld!')
    ->appendOutputTo('/var/log/shield/Helloworld.log')
    ->dailyAt('00:00')
    ->description('Helloworld.');

// IMPORTANT: You must return the schedule object
return $schedule;
