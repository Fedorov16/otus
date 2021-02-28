<?php

namespace App\Entity;

use App\Repository\DisciplineRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(
 *     name="discipline",
 *     indexes={
 *         @ORM\Index(name="discipline__department_id__ind", columns={"department_id"})
 *     }
 * )
 * @ORM\Entity(repositoryClass=DisciplineRepository::class)
 */
class Discipline implements MetaTimestampsInterface
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
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="disciplines")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     * })
     */
    private ?Department $department;

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
     * @ORM\OneToMany(targetEntity=Progress::class, mappedBy="discipline")
     */
    private Collection $progress;

    /**
     * @ORM\OneToMany(targetEntity=DepartmentProgress::class, mappedBy="discipline")
     */
    private Collection $departmentProgress;

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
        if ($this->progress->removeElement($progress) && $progress->getDiscipline() === $this) {
            $progress->setDiscipline(null);
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
            $departmentProgress->setDiscipline($this);
        }
        return $this;
    }

    public function removeDepartmentProgress(DepartmentProgress $departmentProgress): self
    {
        if ($this->departmentProgress->removeElement($departmentProgress) && $departmentProgress->getDiscipline() === $this) {
            $departmentProgress->setDiscipline(null);
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

    public function InArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'image' => $this->getImage(),
            'department' => $this->department->getName()
        ];
    }
}
