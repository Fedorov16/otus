<?php

namespace App\Repository;

use App\Entity\Discipline;
use App\Entity\Progress;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends EntityRepository
{
    public function getAllUsers(int $page, int $perPage): array
    {
        $qb = $this->createQueryBuilder('user');
        return $qb
            ->andWhere($qb->expr()->isNull('user.isDeleted'))
            ->setFirstResult($perPage * $page)
            ->setMaxResults($perPage)
            ->getQuery()
            ->getResult();
    }

    public function getUserByEmail(string $userEmail): array
    {
        $qb = $this->createQueryBuilder('user');
        return $qb
            ->andWhere('user.email = :userEmail')
            ->setParameter('userEmail', $userEmail)
            ->getQuery()
            ->getResult();
    }

    public function getAllUsersEmails(): array
    {
        $qb = $this->createQueryBuilder('user');
        return array_column($qb
            ->select('user.email')
            ->andWhere('user IS NOT NULL')
            ->andWhere($qb->expr()->isNull('user.isDeleted'))
            ->getQuery()
            ->getResult(),
        'email');
    }

    public function getAllUserIDs(): array
    {
        $qb = $this->createQueryBuilder('user');
        return array_column($qb
            ->select('user.id')
            ->andWhere($qb->expr()->isNull('user.isDeleted'))
            ->getQuery()
            ->getResult(),
            'id');
    }

    public function getUserById($id): array
    {
        return $this->createQueryBuilder('user')
            ->select('user.id', 'user.email', 'user.name', 'user.image')
            ->andWhere('user.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    public function getUserInfoPercentById($id): array
    {
        return $this->createQueryBuilder('user')
            ->select('user.id', 'user.name', 'discipline.name', 'progress.percent', 'progress.level', 'progress.necessaryLevel')
            ->innerJoin(Progress::class, 'progress', 'with', 'user.id = progress.user')
            ->innerJoin(Discipline::class, 'discipline', 'with', 'discipline.id = progress.discipline')
            ->andWhere('user.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }
}
