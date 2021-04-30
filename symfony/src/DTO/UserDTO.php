<?php

namespace App\DTO;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\Validator\Constraints as Assert;

class UserDTO
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=50)
     */
    public string $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=50)
     */
    public string $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    public string $password;

    public string $departmentName;

    public array $roles;


    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? '';
        $this->password = $data['password'] ?? '';
        $this->email = $data['email'];
        $this->departmentName = $data['department'];
        $this->roles = $data['roles'] ? json_decode($data['roles'], true, 512, JSON_THROW_ON_ERROR) : [];
    }

    /**
     * @param User $user
     * @return UserDTO
     * @throws \JsonException
     */
    public static function fromEntity(User $user): self
    {
        return new self([
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'roles' => $user->getRoles(),
        ]);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): UserDTO
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): UserDTO
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): UserDTO
    {
        $this->password = $password;
        return $this;
    }

    public function getDepartmentName(): string
    {
        return $this->departmentName;
    }

    public function setDepartmentName(string $departmentName): UserDTO
    {
        $this->departmentName = $departmentName;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

}
