<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteRepository::class)]
class Compte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique:true)]
    #[assert\Length(min:12,minMessage:"Au minimum 12 caractères")]
    
    private ?string $numC = null;

    #[ORM\Column(length: 255)]
    private ?string $statutC = null;

    #[ORM\Column]
    private ?float $solde = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateouverture = null;

    #[ORM\OneToMany(targetEntity: Carte::class, mappedBy: 'compte')]
    private Collection $num_c;

    public function __construct()
    {
        $this->num_c = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumC(): ?string
    {
        return $this->numC;
    }

    public function setNumC(string $numC): static
    {
        $this->numC = $numC;

        return $this;
    }

    public function getStatutC(): ?string
    {
        return $this->statutC;
    }

    public function setStatutC(string $statutC): static
    {
        $this->statutC = $statutC;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDateouverture(): ?\DateTimeInterface
    {
        return $this->dateouverture;
    }

    public function setDateouverture(\DateTimeInterface $dateouverture): static
    {
        $this->dateouverture = $dateouverture;

        return $this;
    }

    public function addNumC(Carte $numC): static
    {
        if (!$this->num_c->contains($numC)) {
            $this->num_c->add($numC);
            $numC->setCompte($this);
        }

        return $this;
    }

    public function removeNumC(Carte $numC): static
    {
        if ($this->num_c->removeElement($numC)) {
            // set the owning side to null (unless already changed)
            if ($numC->getCompte() === $this) {
                $numC->setCompte(null);
            }
        }

        return $this;
    }
}
