<?php

namespace App\DataFixtures;

use App\Entity\Department;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DepartmentFixtures extends Fixture
{
    public const DEPARTMENT_NAME_SWAT = 'SWAT';
    public const DEPARTMENT_NAME_ZEYDOO = 'Zeydoo';
    public const DEPARTMENT_NAME_TRADS = 'Trads';

    public const DEPARTMENT_REFERENCES = [
        self::DEPARTMENT_NAME_SWAT,
        self::DEPARTMENT_NAME_ZEYDOO,
        self::DEPARTMENT_NAME_TRADS,
    ];

    public function load(ObjectManager $manager) :void
    {
        foreach (self::DEPARTMENT_REFERENCES as $department_name) {
            $department = new Department();
            $department->setName($department_name);
            $department->setCreatedAt();
            $department->setUpdatedAt();

            $manager->persist($department);
            $this->addReference($department_name, $department);
        }
        $manager->flush();
    }
}
