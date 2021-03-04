<?php

namespace App\Repository;

use App\Entity\Department;
use Doctrine\ORM\EntityRepository;

/**
 * @method Department|null find($id, $lockMode = null, $lockVersion = null)
 * @method Department|null findOneBy(array $criteria, array $orderBy = null)
 * @method Department[]    findAll()
 * @method Department[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentRepository extends EntityRepository
{
    public function getAllDepartmentNames(): array
    {
        return array_column($this->createQueryBuilder('department')
            ->select('department.name')
            ->andWhere('department IS NOT NULL')
            ->getQuery()
            ->getResult(),
            'name');
    }

    public function getDepartmentIdByName($name): int
    {
        return $this->createQueryBuilder('department')
            ->select('department.id')
            ->andWhere('department.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getResult()[0]['id'];
    }
}
