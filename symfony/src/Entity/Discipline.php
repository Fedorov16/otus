<?php

namespace App\Entity;

use App\Repository\DisciplineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DisciplineRepository::class)
 */
class Discipline
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="disciplines")
     */
    private ?Department $department;

    /**
     * @ORM\OneToMany(targetEntity=Progress::class, mappedBy="disciplineId")
     */
    private ArrayCollection $progress;

    /**
     * @ORM\OneToMany(targetEntity=DepartmentProgress::class, mappedBy="disciplineId")
     */
    private ArrayCollection $departmentProgress;

    public function __construct()
    {
        $this->progress = new ArrayCollection();
        $this->departmentProgress = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
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

    /**
     * @return Collection|Progress[]
     */
    public function getProgress(): Collection
    {
        return $this->progress;
    }

    public function addProgress(Progress $progress): self
    {
        if (!$this->progress->contains($progress)) {
            $this->progress[] = $progress;
            $progress->setDiscipline($this);
        }

        return $this;
    }

    public function removeProgress(Progress $progress): self
    {
        if ($this->progress->removeElement($progress)) {
            // set the owning side to null (unless already changed)
            if ($progress->getDiscipline() === $this) {
                $progress->setDiscipline(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DepartmentProgress[]
     */
    public function getDepartmentProgress(): Collection
    {
        return $this->departmentProgress;
    }

    public function addDepartmentProgress(DepartmentProgress $departmentProgress): self
    {
        if (!$this->departmentProgress->contains($departmentProgress)) {
            $this->departmentProgress[] = $departmentProgress;
            $departmentProgress->setDiscipline($this);
        }

        return $this;
    }

    public function removeDepartmentProgress(DepartmentProgress $departmentProgress): self
    {
        if ($this->departmentProgress->removeElement($departmentProgress)) {
            // set the owning side to null (unless already changed)
            if ($departmentProgress->getDiscipline() === $this) {
                $departmentProgress->setDiscipline(null);
            }
        }

        return $this;
    }
}
