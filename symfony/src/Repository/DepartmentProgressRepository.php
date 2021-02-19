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

    // /**
    //  * @return DepartmentProgress[] Returns an array of DepartmentProgress objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DepartmentProgress
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
