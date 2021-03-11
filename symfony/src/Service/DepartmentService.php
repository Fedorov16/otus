<?php

namespace App\Service;

use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;

class DepartmentService
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em
    ) {

        $this->em = $em;
    }

    public function getAllDepartments(): array
    {
       return $this->em->getRepository(Department::class)->getAllDepartments();
    }

    public function saveDepartment(string $name): ?int
    {

        $department = new Department();
        $department->setName($name);

        $this->em->persist($department);
        $this->em->flush();

        return $department->getId();
    }

    public function isDepartmentExistByName($name): bool
    {
        return !empty($this->em->getRepository(Department::class)->getDepartmentByName($name));
    }

    public function updateDepartmentById(int $departmentId, string $name): bool
    {
        $department = $this->em->getRepository(Department::class)->find($departmentId);
        if ($department === null) {
            return false;
        }

        $department->setName($name);
        $this->em->flush();

        return true;
    }

    public function deleteDepartmentById(int $departmentId): bool
    {
        $department = $this->em->getRepository(Department::class)->find($departmentId);
        if ($department === null) {
            return false;
        }

        $department->setIsDeleted(true);
        $this->em->flush();

        return true;
    }
}
