<?php

namespace App\DataFixtures;

use App\Entity\Department;
use App\Entity\DepartmentProgress;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class DepartmentProgressFixtures extends Fixture implements DependentFixtureInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function load(ObjectManager $manager): void
    {
        $allDepartment = $this->entityManager->getRepository(Department::class);
        $allDepartment = $allDepartment->findAll();

        foreach (DisciplineFixtures::DISCIPLINES as $disciplines) {

            foreach ($allDepartment as $department) {
                $departmentProgress = new DepartmentProgress();
                $departmentProgress
                    ->setPercent(random_int(0, 100))
                    ->setDiscipline($this->getReference($disciplines))
                    ->setDepartment($department);
                $departmentProgress->setLevel(random_int(1, 5));
                $departmentProgress->setNecessaryLevel(random_int (3, 5));
                $departmentProgress->setCreatedAt();
                $departmentProgress->setUpdatedAt();

                $manager->persist($departmentProgress);
                $manager->flush();
            }
        }
    }

    public function getDependencies()
    {
        return [
            DisciplineFixtures::class,
            DepartmentFixtures::class
        ];
    }
}
