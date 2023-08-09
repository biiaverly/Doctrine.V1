<?php

declare(strict_types=1);

namespace  Src\Application\Commands;

use Src\Infrastructure\Model\Student;
use Src\Domain\Service\StudentService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateStudentCommand extends Command
{
    protected static $defaultName = 'insert:student';

    protected function configure()
    {
        $this->setDescription('Insert a new student')
            ->addArgument('student', InputArgument::REQUIRED, 'new student')
            ->addArgument('cpf', InputArgument::REQUIRED, 'new cpf');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $newstudent = $input->getArgument('student');
        $cpf = $input->getArgument('cpf');

        $student = new Student($newstudent,$cpf);

        $service = new StudentService;
        $service->newStudent($student);
        $output->writeln('Aluno ' . $newstudent . ' included.');

        $output->writeln('A lista de alunos e: ');
        $service->listStudents();


        return 0;
    }   
}