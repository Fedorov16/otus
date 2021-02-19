<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
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
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="DepartmentId")
     */
    private ArrayCollection $users;

    /**
     * @ORM\OneToMany(targetEntity=Discipline::class, mappedBy="вузdepartmentId")
     */
    private ArrayCollection $disciplines;

    /**
     * @ORM\OneToMany(targetEntity=DepartmentProgress::class, mappedBy="department")
     */
    private ArrayCollection $departmentProgress;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->disciplines = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setDepartment($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getDepartment() === $this) {
                $user->setDepartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Discipline[]
     */
    public function getDisciplines(): Collection
    {
        return $this->disciplines;
    }

    public function addDiscipline(Discipline $discipline): self
    {
        if (!$this->disciplines->contains($discipline)) {
            $this->disciplines[] = $discipline;
            $discipline->setdepartment($this);
        }

        return $this;
    }

    public function removeDiscipline(Discipline $discipline): self
    {
        if ($this->disciplines->removeElement($discipline)) {
            // set the owning side to null (unless already changed)
            if ($discipline->getdepartment() === $this) {
                $discipline->setdepartment(null);
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
            $departmentProgress->setDepartment($this);
        }

        return $this;
    }

    public function removeDepartmentProgress(DepartmentProgress $departmentProgress): self
    {
        if ($this->departmentProgress->removeElement($departmentProgress)) {
            // set the owning side to null (unless already changed)
            if ($departmentProgress->getDepartment() === $this) {
                $departmentProgress->setDepartment(null);
            }
        }

        return $this;
    }
}
