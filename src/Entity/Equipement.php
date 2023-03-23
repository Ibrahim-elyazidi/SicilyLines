<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'equipement', targetEntity: EquipementBateau::class)]
    private Collection $equipementBateau;

    public function __construct()
    {
        $this->equipementBateau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
            $equipementBateau->setEquipement($this);
        }

        return $this;
    }

    public function removeEquipementBateau(EquipementBateau $equipementBateau): self
    {
        if ($this->equipementBateau->removeElement($equipementBateau)) {
            // set the owning side to null (unless already changed)
            if ($equipementBateau->getEquipement() === $this) {
                $equipementBateau->setEquipement(null);
            }
        }

        return $this;
    }
}
