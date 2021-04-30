<?php

namespace App\Service;

use App\DTO\UserDTO;
use App\Entity\Department;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $passwordEncoder,
        ProgressService $progressService
    )
    {
        $this->em = $em;
        $this->progressService = $progressService;
        $this->passwordEncoder = $passwordEncoder;
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

    public function saveUser(UserDTO $userDTO): ?int
    {
        $department = $this->getDepartmentByName($userDTO->getDepartmentName());

        $user = new User();
        $user
            ->setName($userDTO->getName())
            ->setEmail($userDTO->getEmail())
            ->setPassword($this->passwordEncoder->encodePassword($user, $userDTO->getPassword()))
            ->setDepartment($department)
            ->setRoles($userDTO->getRoles())
            ->setLastLoginAt();

        $this->em->persist($user);
        $this->em->flush();

        return $user->getId();
    }

    public function updateUserById(int $userId, string $userName, string $userEmail, string $departmentName): string
    {
        $user = $this->em->getRepository(User::class)->find($userId);
        if (!$user) {
            return new Response($userId . 'not found');
        }

        $departmentById = $this->getDepartmentByUserId($userId);
        $departmentByName = $this->getDepartmentByName($departmentName);
        if (isset($departmentByName) && $departmentByName->getName() !== $departmentById->getName()) {
            $this->progressService->deleteAllProgressToUserByPreviousDepartment($userId);
            $this->progressService->addAllProgressToUserByDepartment($userId);
        }
        $department = $departmentByName ?? $departmentById;

        $user
            ->setName($userName)
            ->setEmail($userEmail)
            ->setDepartment($department);

        $user->setUpdatedAt();

        $this->em->flush();

        return new Response($userId . 'was saved');
    }

    public function findUserById(int $userId): ?User
    {
        /** @var UserRepository $userRepository */
        $userRepository = $this->em->getRepository(User::class);
        /** @var User|null $user */
        $user = $userRepository->find($userId);
        return $user;
    }

    public function getDepartmentByName(string $departmentName): ?Department
    {
        $department = $this->em->getRepository(Department::class)->getDepartmentByName($departmentName);
        return empty($department) ? null : $department[0];
    }

    public function getDepartmentByUserId(string $userId): Department
    {
        return $this->em->getRepository(Department::class)->getDepartmentByUserId($userId)[0];
    }

    public function deleteUserById(int $userId): bool
    {

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
