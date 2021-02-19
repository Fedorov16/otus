<?php

namespace App\Entity;

use App\Repository\DepartmentProgressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentProgressRepository::class)
 */
class DepartmentProgress
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="departmentProgress")
     */
    private ?Department $department;

    /**
     * @ORM\ManyToOne(targetEntity=Discipline::class, inversedBy="departmentProgress")
     */
    private ?Discipline $discipline;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $percent;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $modifiedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getDiscipline(): ?Discipline
    {
        return $this->discipline;
    }

    public function setDiscipline(?Discipline $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    public function getPercent(): ?int
    {
        return $this->percent;
    }

    public function setPercent(int $percent): self
    {
        $this->percent = $percent;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(\DateTimeInterface $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }
}
