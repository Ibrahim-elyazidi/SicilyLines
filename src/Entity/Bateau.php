<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BateauRepository::class)]
class Bateau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $longeur = null;

    #[ORM\Column]
    private ?float $largeur = null;

    #[ORM\Column]
    private ?float $vitesse = null;

    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: Traversee::class)]
    private Collection $traversee;

    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: CategorieBateau::class)]
    private Collection $categorieBateau;

    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: EquipementBateau::class)]
    private Collection $equipementBateau;

    public function __construct()
    {
        $this->traversee = new ArrayCollection();
        $this->categorieBateau = new ArrayCollection();
        $this->equipementBateau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLongeur(): ?float
    {
        return $this->longeur;
    }

    public function setLongeur(float $longeur): self
    {
        $this->longeur = $longeur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getVitesse(): ?float
    {
        return $this->vitesse;
    }

    public function setVitesse(float $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * @return Collection<int, Traversee>
     */
    public function getTraversee(): Collection
    {
        return $this->traversee;
    }

    public function addTraversee(Traversee $traversee): self
    {
        if (!$this->traversee->contains($traversee)) {
            $this->traversee->add($traversee);
            $traversee->setBateau($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversee->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getBateau() === $this) {
                $traversee->setBateau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CategorieBateau>
     */
    public function getCategorieBateau(): Collection
    {
        return $this->categorieBateau;
    }

    public function addCategorieBateau(CategorieBateau $categorieBateau): self
    {
        if (!$this->categorieBateau->contains($categorieBateau)) {
            $this->categorieBateau->add($categorieBateau);
            $categorieBateau->setBateau($this);
        }

        return $this;
    }

    public function removeCategorieBateau(CategorieBateau $categorieBateau): self
    {
        if ($this->categorieBateau->removeElement($categorieBateau)) {
            // set the owning side to null (unless already changed)
            if ($categorieBateau->getBateau() === $this) {
                $categorieBateau->setBateau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EquipementBateau>
     */
    public function getEquipementBateau(): Collection
    {
        return $this->equipementBateau;
    }

    public function addEquipementBateau(EquipementBateau $equipementBateau): self
    {
        if (!$this->equipementBateau->contains($equipementBateau)) {
            $this->equipementBateau->add($equipementBateau);
            $equipementBateau->setBateau($this);
        }

        return $this;
    }

    public function removeEquipementBateau(EquipementBateau $equipementBateau): self
    {
        if ($this->equipementBateau->removeElement($equipementBateau)) {
            // set the owning side to null (unless already changed)
            if ($equipementBateau->getBateau() === $this) {
                $equipementBateau->setBateau(null);
            }
        }

        return $this;
    }
}
