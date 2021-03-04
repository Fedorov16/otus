<?php

namespace App\Repository;

use App\Entity\Discipline;
use Doctrine\ORM\EntityRepository;

/**
 * @method Discipline|null find($id, $lockMode = null, $lockVersion = null)
 * @method Discipline|null findOneBy(array $criteria, array $orderBy = null)
 * @method Discipline[]    findAll()
 * @method Discipline[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisciplineRepository extends EntityRepository
{
    public function getDisciplinesByDepartmentId($id): array
    {
        return array_column($this->createQueryBuilder('discipline')
            ->select('discipline.name')
            ->andWhere('discipline.department = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult(), 'name');
    }

    public function getAllDisciplineIds(): array
    {
        return array_column($this->createQueryBuilder('discipline')
            ->select('discipline.id')
            ->getQuery()
            ->getResult(),
            'id');
    }
}
