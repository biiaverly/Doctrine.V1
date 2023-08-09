<?php


require_once __DIR__ . '/../../../vendor/autoload.php';

use Src\Application\Commands\CreateStudentCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new CreateStudentCommand());
$application->run();