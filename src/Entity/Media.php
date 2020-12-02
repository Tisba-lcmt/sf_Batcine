<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 */
class Media
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poster;

    /**
     * @ORM\Column(type="time")
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationality;

    /**
     * @ORM\Column(type="text")
     */
    private $synopsis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $video;

    /**
     * @ORM\OneToMany(targetEntity=CriticalOpinion::class, mappedBy="media", orphanRemoval=true)
     */
    private $criticalOpinionsMedia;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="media")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=Staff::class, inversedBy="media")
     */
    private $staff;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="media")
     */
    private $genre;

    public function __construct()
    {
        $this->criticalOpinionsMedia = new ArrayCollection();
        $this->user = new ArrayCollection();
        $this->staff = new ArrayCollection();
        $this->genre = new ArrayCollection();
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

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Collection|CriticalOpinion[]
     */
    public function getCriticalOpinionsMedia(): Collection
    {
        return $this->criticalOpinionsMedia;
    }

    public function addCriticalOpinionsMedium(CriticalOpinion $criticalOpinionsMedium): self
    {
        if (!$this->criticalOpinionsMedia->contains($criticalOpinionsMedium)) {
            $this->criticalOpinionsMedia[] = $criticalOpinionsMedium;
            $criticalOpinionsMedium->setMedia($this);
        }

        return $this;
    }

    public function removeCriticalOpinionsMedium(CriticalOpinion $criticalOpinionsMedium): self
    {
        if ($this->criticalOpinionsMedia->removeElement($criticalOpinionsMedium)) {
            // set the owning side to null (unless already changed)
            if ($criticalOpinionsMedium->getMedia() === $this) {
                $criticalOpinionsMedium->setMedia(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->user->removeElement($user);

        return $this;
    }

    /**
     * @return Collection|Staff[]
     */
    public function getStaff(): Collection
    {
        return $this->staff;
    }

    public function addStaff(Staff $staff): self
    {
        if (!$this->staff->contains($staff)) {
            $this->staff[] = $staff;
        }

        return $this;
    }

    public function removeStaff(Staff $staff): self
    {
        $this->staff->removeElement($staff);

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        $this->genre->removeElement($genre);

        return $this;
    }
}
