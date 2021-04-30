<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface;
use JsonException;

/**
 * @ORM\Table(
 *     name="`user`",
 *     indexes={
 *         @ORM\Index(name="user__department_id__ind", columns={"department_id"})
 *     }
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class User implements MetaTimestampsInterface, UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer", unique=true)
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=false, unique=true)
     */
    private string $email;

    /**
     * @ORM\Column(type="string", nullable=false, length=120)
     */
    private string $password;

    /**
     * @ORM\Column(type="string", length=1024, nullable=false)
     */
    private string $roles;

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
     * @ORM\Column(type="datetime")
     */
    private DateTime $lastLoginAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $isDeleted;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     * })
     */
    private Department $department;

    /**
     * @ORM\OneToMany(targetEntity=Progress::class, mappedBy="user")
     */
    private Collection $progress;

    public function __construct()
    {
        $this->progress = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreatedAt(): void
    {
        $this->createdAt = new DateTime();
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setUpdatedAt(): void
    {
        $this->updatedAt = new DateTime();
    }

    public function getLastLoginAt(): DateTime
    {
        return $this->lastLoginAt;
    }

    public function setLastLoginAt(): DateTime
    {
        $this->lastLoginAt = new DateTime();
        return $this->lastLoginAt;
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

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(?bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    public function getDepartment(): Department
    {
        return $this->department;
    }

    public function setDepartment(Department $department): self
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
            $progress->setUser($this);
        }
        return $this;
    }

    public function removeProgress(Progress $progress): self
    {
        if ($this->progress->removeElement($progress) && $progress->getUser() === $this) {
            $progress->setUser(null);
        }
        return $this;
    }

    /**
     * @throws JsonException
     */
    public function getRoles(): array
    {
        $roles = json_decode($this->roles, true, 512, JSON_THROW_ON_ERROR);
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param string[] $roles
     * @return User
     * @throws JsonException
     */
    public function setRoles(array $roles): User
    {
        $this->roles = json_encode($roles, JSON_THROW_ON_ERROR);
        return $this;
    }

    public function getSalt()
    {
    }

    public function getUsername(): string
    {
        return $this->name;
    }

    public function eraseCredentials()
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => $this->getRoles(),
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt->format('Y-m-d H:i:s'),
            'lastLoginAt' => $this->lastLoginAt->format('Y-m-d H:i:s'),
            'image' => $this->image,
            'department' => $this->department->getName(),
            'progress' => array_map(static fn(Progress $progress) => $progress->toArray(), $this->progress->toArray()),
        ];
    }
}
