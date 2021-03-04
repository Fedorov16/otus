<?php

namespace App\DataFixtures;

use App\Entity\Progress;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class ProgressFixtures extends Fixture implements DependentFixtureInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function load(ObjectManager $manager): void
    {
        $allUsers = $this->entityManager->getRepository(User::class);
        $allUsers = $allUsers->findAll();

        foreach (DisciplineFixtures::DISCIPLINES as $disciplines) {

            foreach ($allUsers as $user) {
                $progress = new Progress();
                $progress
                    ->setPercent(random_int(0, 100))
                    ->setDiscipline($this->getReference($disciplines))
                    ->setUser($user);
                $progress->setLevel(random_int(1, 5));
                $progress->setNecessaryLevel(random_int (3, 5));
                $progress->setCreatedAt();
                $progress->setUpdatedAt();

                $manager->persist($progress);
                $manager->flush();
            }
        }
    }

    public function getDependencies()
    {
        return [
            DisciplineFixtures::class,
            UserFixtures::class
        ];
    }
}
