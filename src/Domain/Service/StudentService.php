<?php

declare(strict_types=1);

namespace  Src\Domain\Service;

use Src\Infrastructure\Model\Student;
use Src\Infrastructure\EntityManagerCreator;
use Src\Infrastructure\Persistence\StudentRepository;

class StudentService
{
    public $doctrineRepository;

    public function __construct()
    {
        $this->doctrineRepository = new StudentRepository();
    }

    public function newStudent(Student $student)
    {
        $this->doctrineRepository->insertStudent($student);

        return true;
    }

    public function listStudents()
    {
        $list = $this->doctrineRepository->listAll();
        foreach ($list as $student)
        {
            echo "ID: $student->id \n Nome: $student->name \n";
        }
    }

    public function findId()
    {
        $student = $this->doctrineRepository->findId(1);
        return $student;
    }
    
}