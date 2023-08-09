<?php

declare(strict_types=1);

namespace  Src\Infrastructure\Persistence;

use Src\Infrastructure\Model\Student;
use Src\Infrastructure\EntityManagerCreator;

class StudentRepository
{
    public $entityManager;

    public function __construct()
    {   $entityManagerCreator = new EntityManagerCreator;
        $this->entityManager = $entityManagerCreator->createEntityManager();
    }

    public function insertStudent(Student $student)
    {
        $this->entityManager->persist($student);
        $this->entityManager->flush();

        return true;
    }

    /** @var Student[] $listStudents */

    public function listAll()
    {
        $studentRepository = $this->entityManager->getRepository(Student::class);
        $listStudents = $studentRepository->findAll();
        return  $listStudents;
    }


    public function findId()
    {
        $studentRepository = $this->entityManager->getRepository(Student::class);
        $listStudents = $studentRepository->find(2);
        return  $listStudents;
    }
}