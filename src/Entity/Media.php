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
     * @ORM\Column(type="string", length=255)
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

    public function __construct()
    {
        $this->criticalOpinionsMedia = new ArrayCollection();
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
}
