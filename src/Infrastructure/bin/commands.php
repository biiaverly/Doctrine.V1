<?php


require_once __DIR__ . '/../../../vendor/autoload.php';

use Src\Application\Commands\CreateStudentCommand;
use Src\Application\Commands\RemoveStudentCommand;
use Src\Application\Commands\RenameStudentCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new CreateStudentCommand());
$application->add(new RemoveStudentCommand());
$application->add(new RenameStudentCommand());

$application->run();