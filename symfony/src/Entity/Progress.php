<?php

namespace App\Entity;

use App\Repository\ProgressRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(
 *     name="progress",
 *     indexes={
 *         @ORM\Index(name="progress__user_id__ind", columns={"user_id"}),
 *         @ORM\Index(name="progress__discipline_id__ind", columns={"discipline_id"})
 *     }
 * )
 * @ORM\Entity(repositoryClass=ProgressRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Progress implements MetaTimestampsInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer", unique=true)
     */
    private ?int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $percent;

    /**
     * @ORM\Column(type="integer")
     */
    private int $level;

    /**
     * @ORM\Column(type="integer")
     */
    private int $necessaryLevel;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="progress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private ?User $user;

    /**
     * @ORM\ManyToOne(targetEntity=Discipline::class, inversedBy="progress")
     * @ORM\JoinColumns({
     *     @ORM\JoinColumn(name="discipline_id", referencedColumnName="id")
     * })
     */
    private ?Discipline $discipline;

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


    public function getId(): ?int
    {
        return $this->id;
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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getNecessaryLevel(): ?int
    {
        return $this->necessaryLevel;
    }

    public function setNecessaryLevel(int $necessaryLevel): void
    {
        $this->necessaryLevel = $necessaryLevel;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function toArray(): array
    {
        return[
            'id' => $this->id,
            'percent' => $this->percent,
            'level' => $this->level,
            'necessaryLevel' => $this->necessaryLevel,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt->format('Y-m-d H:i:s'),
            'user' => $this->user->getName(),
            'discipline' => $this->discipline->getName(),
        ];
    }
}
