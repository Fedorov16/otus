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
    /**
     * @var ProgressService
     */
    private ProgressService $progressService;

    public function __construct(EntityManagerInterface $em, ProgressService $progressService)
    {
        $this->em = $em;
        $this->progressService = $progressService;
    }

    public function getAllUsers(int $page, int $perPage)
    {
        $userRepository = $this->em->getRepository(User::class);
        return $userRepository->getAllUsers($page, $perPage);
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

    public function updateUserById(int $userId, ?string $userName, ?string $userEmail, ?string $departmentName): bool
    {
        $departmentById = $this->getDepartmentByUserId($userId);
        $departmentByName = $this->getDepartmentByName($departmentName);
        if (isset($departmentByName) && isset($departmentById) && $departmentByName->getName() !== $departmentById->getName()) {
            $this->progressService->deleteAllProgressToUserByPreviousDepartment($userId);
            $this->progressService->addAllProgressToUserByDepartment($userId);
        }
        $department = $departmentByName ?? $departmentById;

        $user = $this->em->getRepository(User::class)->find($userId);
        if (!$department || !$user) {
            return false;
        }

        $user
            ->setName($userName)
            ->setEmail($userEmail)
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

    public function getDepartmentByUserId(string $userId): ?Department
    {
        $department = $this->em->getRepository(Department::class)->getDepartmentByUserId($userId);
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

    public function getUserData(int $userId): ?array
    {
        $user = $this->em->getRepository(User::class)->find($userId);
        if (empty($user)) {
            return null;
        }
        return ['data' => [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'image' => $user->getImage(),
            'department' => $user->getDepartment()->getName(),
            ]];
    }
    public function getUserById(int $userId): ?User
    {
      return $this->em->getRepository(User::class)->find($userId);
    }
}
