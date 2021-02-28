<?php

namespace App\Repository;

use App\Entity\Discipline;
use App\Entity\Progress;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getAllUsersEmails(): array
    {
        return array_column($this->createQueryBuilder('user')
            ->select('user.email')
            ->andWhere('user IS NOT NULL')
            ->getQuery()
            ->getResult(),
        'email');
    }

    public function getAllUserIDs(): array
    {
        return array_column($this->createQueryBuilder('user')
            ->select('user.id')
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
            ->getResult()[0];
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
