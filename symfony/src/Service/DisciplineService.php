<?php

namespace App\Service;

use App\Entity\Discipline;
use Doctrine\ORM\EntityManagerInterface;

class DisciplineService
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function getAllDisciplines(): array
    {
       return $this->em->getRepository(Discipline::class)->getAllDisciplines();
    }

    public function saveDiscipline(string $name): ?int
    {

        $discipline = new Discipline();
        $discipline->setName($name);

        $this->em->persist($discipline);
        $this->em->flush();

        return $discipline->getId();
    }

    public function isDisciplineExistByName($name): bool
    {
        return !empty($this->em->getRepository(Discipline::class)->getDisciplineByName($name));
    }

    public function updateDisciplineById(int $disciplineId, string $name): bool
    {
        $discipline = $this->em->getRepository(Discipline::class)->find($disciplineId);
        if ($discipline === null) {
            return false;
        }

        $discipline->setName($name);
        $this->em->flush();

        return true;
    }

    public function deleteDisciplineById(int $disciplineId): bool
    {
        $discipline = $this->em->getRepository(Discipline::class)->find($disciplineId);
        if ($discipline === null) {
            return false;
        }

        $discipline->setIsDeleted(true);
        $this->em->flush();

        return true;
    }
}
