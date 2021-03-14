<?php

namespace App\DTO;

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


    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->password = $data['password'];
        $this->email = $data['email'];
        $this->departmentName = $data['department'];
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

}
