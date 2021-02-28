<?php

namespace App\Repository;

use App\Entity\DepartmentProgress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DepartmentProgress|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartmentProgress|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartmentProgress[]    findAll()
 * @method DepartmentProgress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentProgressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DepartmentProgress::class);
    }
}
