<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(
     *     message="Merci de remplir le titre !"
     * )
     *
     * @Assert\Length(
     *     min= 4,
     *     max= 60,
     *     minMessage="Le titre doit comporter au moins 4 caractères",
     *     maxMessage="Le titre doit comporter au max 60 caractères"
     * )
     *
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank(
     *     message="Merci de remplir le titre !"
     * )
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(
     *     message="Merci d'upload une image' !"
     * )
     *
     * @Assert\File(
     *     mimeTypes={"application/jpg", "application/jpeg", "application/png", "application/gif", "application/bmp"},
     *     mimeTypesMessage="Merci d'upload un fichier jpg/jpeg/gif/bmp"
     * )
     */
    private $image;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $creationDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $publicationDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPublished;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate($publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(?bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }
}
