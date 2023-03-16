<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Tarifer::class)]
    private Collection $tarifers;

    #[ORM\ManyToOne(inversedBy: 'types')]
    private ?Categorie $categorie = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: TypeReservation::class)]
    private Collection $typeReservations;

    public function __construct()
    {
        $this->tarifers = new ArrayCollection();
        $this->typeReservations = new ArrayCollection();
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
     * @return Collection<int, Tarifer>
     */
    public function getTarifers(): Collection
    {
        return $this->tarifers;
    }

    public function addTarifer(Tarifer $tarifer): self
    {
        if (!$this->tarifers->contains($tarifer)) {
            $this->tarifers->add($tarifer);
            $tarifer->setType($this);
        }

        return $this;
    }

    public function removeTarifer(Tarifer $tarifer): self
    {
        if ($this->tarifers->removeElement($tarifer)) {
            // set the owning side to null (unless already changed)
            if ($tarifer->getType() === $this) {
                $tarifer->setType(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, TypeReservation>
     */
    public function getTypeReservations(): Collection
    {
        return $this->typeReservations;
    }

    public function addTypeReservation(TypeReservation $typeReservation): self
    {
        if (!$this->typeReservations->contains($typeReservation)) {
            $this->typeReservations->add($typeReservation);
            $typeReservation->setType($this);
        }

        return $this;
    }

    public function removeTypeReservation(TypeReservation $typeReservation): self
    {
        if ($this->typeReservations->removeElement($typeReservation)) {
            // set the owning side to null (unless already changed)
            if ($typeReservation->getType() === $this) {
                $typeReservation->setType(null);
            }
        }

        return $this;
    }
}
