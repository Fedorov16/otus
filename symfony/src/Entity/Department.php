<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="department")
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department implements MetaTimestampsInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer", unique=true)
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
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private DateTime $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="department")
     */
    private Collection $users;

    /**
     * @ORM\OneToMany(targetEntity=Discipline::class, mappedBy="department")
     */
    private Collection $disciplines;

    /**
     * @ORM\OneToMany(targetEntity=DepartmentProgress::class, mappedBy="department")
     */
    private Collection $departmentProgress;

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
        if ($this->users->removeElement($user) && $user->getDepartment() === $this) {
            $user->setDepartment(null);
        }

        return $this;
    }

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
        if ($this->disciplines->removeElement($discipline) && $discipline->getdepartment() === $this) {
            $discipline->setdepartment(null);
        }

        return $this;
    }

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
        if ($this->departmentProgress->removeElement($departmentProgress) && $departmentProgress->getDepartment() === $this) {
            $departmentProgress->setDepartment(null);
        }

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(): void
    {
        $this->createdAt = new DateTime();
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(): void
    {
        $this->updatedAt = new DateTime();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt->format('Y-m-d H:i:s'),
            'image' => $this->image,
            'departmentProgress' => array_map(static fn(DepartmentProgress $departmentProgress) => $departmentProgress->toArray(), $this->departmentProgress->toArray()),
        ];
    }
}
