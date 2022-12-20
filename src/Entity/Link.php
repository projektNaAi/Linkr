<?php

namespace App\Entity;

use App\Repository\LinkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LinkRepository::class)]
class Link
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'links')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $longLink = null;

    #[ORM\Column(length: 255)]
    private ?string $dateCreated = null;

    #[ORM\Column(length: 255)]
    private ?string $shortLink = null;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?User $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUserId(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLongLink(): ?string
    {
        return $this->longLink;
    }

    public function setLongLink(string $longLink): self
    {
        $this->longLink = $longLink;

        return $this;
    }

    public function getDateCreated(): ?string
    {
        return $this->dateCreated;
    }

    public function setDateCreated(string $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getShortLink(): ?string
    {
        return $this->shortLink;
    }

    public function setShortLink(string $shortLink): self
    {
        $this->shortLink = $shortLink;

        return $this;
    }
}
