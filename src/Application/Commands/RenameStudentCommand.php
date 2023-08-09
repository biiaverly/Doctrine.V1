<?php


namespace  Src\Application\Commands;

use Src\Infrastructure\Model\Student;
use Src\Domain\Service\StudentService;
use Src\Infrastructure\EntityManagerCreator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RenameStudentCommand extends Command
{
    protected static $defaultName = 'rename:student';

    protected function configure()
    {
        $this->setDescription('Rename Student by cpf')
            ->addArgument('cpf', InputArgument::REQUIRED, 'new cpf')
            ->addArgument('newName', InputArgument::REQUIRED, 'new Name');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cpf = $input->getArgument('cpf');
        $newName = $input->getArgument('newName');
        $service = new StudentService();
        $oldname = $service->findByCpf($cpf)->name;
        $nome = $service->renameStudent($cpf,$newName);
        $output->writeln('Student renamed from '.$oldname.' to '.$newName);

       return 0;
    }   
}