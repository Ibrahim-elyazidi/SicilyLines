<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reservation')]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'reservation')]
    private ?Traversee $traversee = null;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: TypeReservation::class)]
    private Collection $typeReservations;

    public function __construct()
    {
        $this->typeReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTraversee(): ?Traversee
    {
        return $this->traversee;
    }

    public function setTraversee(?Traversee $traversee): self
    {
        $this->traversee = $traversee;

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
            $typeReservation->setReservation($this);
        }

        return $this;
    }

    public function removeTypeReservation(TypeReservation $typeReservation): self
    {
        if ($this->typeReservations->removeElement($typeReservation)) {
            // set the owning side to null (unless already changed)
            if ($typeReservation->getReservation() === $this) {
                $typeReservation->setReservation(null);
            }
        }

        return $this;
    }
}
