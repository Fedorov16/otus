<?php

namespace App\Repository;

use App\Entity\Department;
use App\Entity\Discipline;
use App\Entity\Progress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Progress|null find($id, $lockMode = null, $lockVersion = null)
 * @method Progress|null findOneBy(array $criteria, array $orderBy = null)
 * @method Progress[]    findAll()
 * @method Progress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Progress::class);
    }

    public function getProgressByDisciplineName($disciplineName): array
    {
        return $this->createQueryBuilder('progress')
            ->select('discipline.name', 'department.name', 'progress.level', 'progress.necessaryLevel')
            ->innerJoin(Discipline::class, 'discipline', 'with', 'discipline.id = progress.discipline')
            ->innerJoin(Department::class, 'department', 'with', 'department.id = discipline.department')
            ->andWhere('discipline.name = :disciplineName')
            ->setParameter('disciplineName', $disciplineName)
            ->getQuery()
            ->getResult();
    }
}
