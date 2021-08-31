<?php

namespace App\Repository;

use App\Entity\Department;
use App\Entity\Discipline;
use App\Entity\Progress;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;

/**
 * @method Progress|null find($id, $lockMode = null, $lockVersion = null)
 * @method Progress|null findOneBy(array $criteria, array $orderBy = null)
 * @method Progress[]    findAll()
 * @method Progress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgressRepository extends EntityRepository
{
    public function getProgressByDisciplineName(string $disciplineName): array
    {
        return $this->createQueryBuilder('progress')
            ->select('discipline.name', 'department.name', 'progress.level', 'progress.necessaryLevel')
            ->innerJoin(Discipline::class, 'discipline', 'with', 'discipline.id = progress.discipline')
            ->andWhere('discipline.name = :disciplineName')
            ->setParameter('disciplineName', $disciplineName)
            ->getQuery()
            ->getResult();
    }

    public function getProgressByUserId(int $userId): array
    {
        return $this->createQueryBuilder('progress')
            ->select('user.email', 'discipline.name', 'progress.level', 'progress.necessaryLevel', 'progress.percent')
            ->innerJoin(Discipline::class, 'discipline', 'with', 'discipline.id = progress.discipline')
            ->innerJoin(User::class, 'user', 'with', 'user.id = progress.user')
            ->andWhere('progress.user = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }

    public function getProgressByDepartmentId(int $departmentId): array
    {
        return $this->createQueryBuilder('progress')
            ->select('department.name', 'discipline.name', 'progress.level', 'progress.percent', 'progress.necessaryLevel')
            ->innerJoin(Discipline::class, 'discipline', 'with', 'discipline.id = progress.discipline')
            ->innerJoin(User::class, 'user', 'with', 'user.id = progress.user')
            ->innerJoin(Department::class, 'department', 'with', 'department.id = user.department')
            ->andWhere('department.id = :departmentId')
            ->setParameter('departmentId', $departmentId)
            ->getQuery()
            ->getResult();
    }
}
