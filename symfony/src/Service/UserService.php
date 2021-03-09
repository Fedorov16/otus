<?php

namespace App\Service;

use App\Entity\Department;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getAllUsers()
    {
        return $this->em->getRepository(User::class)->getAllUsers();
    }

    public function isUserExistByEmail(string $userEmail): bool
    {
        return !empty($this->em->getRepository(User::class)->getUserByEmail($userEmail));
    }

    public function saveUser(string $userName, string $userEmail, string $password, string $departmentName): ?int
    {
        $department = $this->getDepartmentByName($departmentName);

        $user = new User();
        $user
            ->setName($userName)
            ->setEmail($userEmail)
            ->setPassword($password)
            ->setDepartment($department)
            ->setLastLoginAt();

        $this->em->persist($user);
        $this->em->flush();

        return $user->getId();
    }

    public function updateUserById(int $userId, string $userName, string $userEmail, string $userPassword, string $departmentName): bool
    {
        $department = $this->getDepartmentByName($departmentName);
        $user = $this->em->getRepository(User::class)->find($userId);
        if (!$department || !$user) {
            return false;
        }

        $user
            ->setName($userName)
            ->setEmail($userEmail)
            ->setPassword($userPassword)
            ->setDepartment($department);
        $user->setUpdatedAt();

        $this->em->flush();

        return true;
    }

    public function getDepartmentByName(string $departmentName): ?Department
    {
        $department = $this->em->getRepository(Department::class)->getDepartmentByName($departmentName);
        return empty($department) ? null : $department[0];
    }

    public function deleteUserById(int $userId): bool
    {
        $user = $this->em->getRepository(User::class)->find($userId);
        if ($user === null) {
            return false;
        }

        $user->setIsDeleted(true);
        $user->setUpdatedAt();

        $this->em->flush();

        return true;
    }
}
