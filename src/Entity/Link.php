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
    private ?User $user_id = null;

    #[ORM\Column(length: 255)]
    private ?string $nazwa = null;

    #[ORM\Column(length: 255)]
    private ?string $adres = null;

    #[ORM\Column(length: 255)]
    private ?string $data_utworzenia = null;

    #[ORM\Column(length: 255)]
    private ?string $skrot_adresu = null;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getDataUtworzenia(): ?string
    {
        return $this->data_utworzenia;
    }

    public function setDataUtworzenia(string $data_utworzenia): self
    {
        $this->data_utworzenia = $data_utworzenia;

        return $this;
    }

    public function getSkrotAdresu(): ?string
    {
        return $this->skrot_adresu;
    }

    public function setSkrotAdresu(string $skrot_adresu): self
    {
        $this->skrot_adresu = $skrot_adresu;

        return $this;
    }
}
