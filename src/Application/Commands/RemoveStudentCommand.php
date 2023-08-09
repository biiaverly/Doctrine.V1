<?php

declare(strict_types=1);

namespace  Src\Application\Commands;

use Src\Infrastructure\Model\Student;
use Src\Domain\Service\StudentService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RemoveStudentCommand extends Command
{
    protected static $defaultName = 'delete:student';

    protected function configure()
    {
        $this->setDescription('Insert a cpf')
            ->addArgument('cpf', InputArgument::REQUIRED, 'new cpf');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cpf = $input->getArgument('cpf');
        $service = new StudentService();
        $sucess = $service->removeStudent($cpf);
        if($sucess==false)
        {
            $output->writeln('The student dont exist.');
            return 1;
        }
        $output->write('------------------');
        $output->writeln('Aluno removido');
        $output->write('------------------');

        $output->writeln('A lista de alunos e: ');
        $service->listStudents();

       return 0;
    }   
}