<?php

namespace App\DataFixtures;

use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach (DepartmentFixtures::DEPARTMENT_REFERENCES as $department_name) {
            for ($i = 1; $i <= 5; $i++) {
                $user = new User();
                $user
                    ->setName($department_name . 'User ' . $i)
                    ->setDepartment($this->getReference($department_name))
                    ->setEmail($department_name . 'user' . $i . '@propellerads.net')
                    ->setPassword('0000')
                    ->setImage('')
                    ->setLastLoginAt();
                $user->setCreatedAt();
                $user->setUpdatedAt();
                $manager->persist($user);

            }
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
