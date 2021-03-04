<?php

namespace App\DataFixtures;

use App\Entity\Discipline;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DisciplineFixtures extends Fixture
{
    public const DISCIPLINES = [
        'PHP',
        'SQL',
        'Kibana',
        'JS',
        'ADP',
        'Java',
        'Zeydoo (CPANetwork)',
        'SSPPub',
        'SSPAdv',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DISCIPLINES as $discipline_name) {

                $discipline = new Discipline();
                $discipline
                    ->setName($discipline_name)
                    ->setImage('');
                $discipline->setCreatedAt();
                $discipline->setUpdatedAt();

                $manager->persist($discipline);
                $this->addReference($discipline_name, $discipline);
            }
        $manager->flush();
    }
}
