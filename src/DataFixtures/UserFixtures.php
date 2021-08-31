<?php

namespace App\DataFixtures;

use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (DepartmentFixtures::DEPARTMENT_REFERENCES as $department_name) {
            for ($i = 1; $i <= 5; $i++) {
                $user = new User();
                $user
                    ->setName($department_name . 'User ' . $i)
                    ->setDepartment($this->getReference($department_name))
                    ->setEmail($department_name . 'user' . $i . '@propellerads.net')
                    ->setPassword($this->passwordEncoder->encodePassword($user, 000 . $i))
                    ->setImage('')
                    ->setLastLoginAt();
                $user->setRoles([]);

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
