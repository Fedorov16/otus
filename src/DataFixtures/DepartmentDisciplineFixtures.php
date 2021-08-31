<?php

namespace App\DataFixtures;

use App\Entity\Department;

use App\Entity\Discipline;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class DepartmentDisciplineFixtures extends Fixture implements DependentFixtureInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function load(ObjectManager $manager) :void
    {
        $departments = $this->entityManager->getRepository(Department::class)->findAll();
        $disciplines = $this->entityManager->getRepository(Discipline::class)->findAll();

        foreach ($departments as $department) {
            foreach ($disciplines as $discipline) {
                $department->addDisciplines($discipline);
                $manager->persist($department);
            }
            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return [
            DisciplineFixtures::class,
            DepartmentFixtures::class
        ];
    }

}
