<?php

namespace App\DataFixtures;

use App\Entity\Discipline;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DisciplineFixtures extends Fixture implements DependentFixtureInterface
{
    public const DISCIPLINES = [
        'PHP',
        'SQL',
        'Kibana',
        'JS',
        'ADP'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DISCIPLINES as $discipline_name) {
            foreach (DepartmentFixtures::DEPARTMENT_REFERENCES as $department_name) {

                $discipline = new Discipline();
                $discipline
                    ->setName($discipline_name)
                    ->setDepartment($this->getReference($department_name))
                    ->setImage('');
                $discipline->setCreatedAt();
                $discipline->setUpdatedAt();

                $manager->persist($discipline);

            }
            $this->addReference($discipline_name, $discipline);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            DepartmentFixtures::class
        ];
    }
}
