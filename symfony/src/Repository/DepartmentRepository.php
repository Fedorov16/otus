<?php

namespace App\Repository;

use App\Entity\Department;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;

/**
 * @method Department|null find($id, $lockMode = null, $lockVersion = null)
 * @method Department|null findOneBy(array $criteria, array $orderBy = null)
 * @method Department[]    findAll()
 * @method Department[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentRepository extends EntityRepository
{
    public function getAllDepartments(): array
    {
        $qb = $this->createQueryBuilder('department');
        return $qb
            ->andWhere($qb->expr()->isNull('department.isDeleted'))
            ->getQuery()
            ->getResult();
    }

    public function getAllDepartmentNames(): array
    {
        $qb = $this->createQueryBuilder('department');
        return array_column($qb
            ->select('department.name')
            ->andWhere('department IS NOT NULL')
            ->andWhere($qb->expr()->isNull('department.isDeleted'))
            ->getQuery()
            ->getResult(),
            'name');
    }

    public function getDepartmentByName(string $name)
    {
        $qb = $this->createQueryBuilder('department');
        return $qb
            ->andWhere($qb->expr()->eq($qb->expr()->lower('department.name'), ':name'))
            ->setParameter('name', strtolower($name))
            ->getQuery()
            ->getResult();
    }

    public function getDepartmentById(int $id)
    {
        $qb = $this->createQueryBuilder('department');
        return $qb
            ->andWhere('department.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    public function getDepartmentByUserId(int $id)
    {
        $qb = $this->createQueryBuilder('department');
        return $qb
            ->innerJoin(User::class, 'user', 'with', 'department.id = user.department')
            ->andWhere('user.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }
}
