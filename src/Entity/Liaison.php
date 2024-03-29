<?php

namespace App\Entity;

use App\Repository\LiaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LiaisonRepository::class)]
class Liaison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $duree = null;

    #[ORM\OneToMany(mappedBy: 'liaison', targetEntity: Traversee::class)]
    private Collection $traversee;

    #[ORM\ManyToOne(inversedBy: 'liaisons')]
    private ?Port $port_depart = null;

    #[ORM\ManyToOne(inversedBy: 'liaisons')]
    private ?Port $port_arrive = null;

    #[ORM\ManyToOne(inversedBy: 'liaison')]
    private ?Secteur $secteur = null;

    #[ORM\OneToMany(mappedBy: 'liaison', targetEntity: Tarifer::class)]
    private Collection $tarifers;

    public function __construct()
    {
        $this->traversee = new ArrayCollection();
        $this->tarifers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

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
            $traversee->setLiaison($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversee->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getLiaison() === $this) {
                $traversee->setLiaison(null);
            }
        }

        return $this;
    }

    public function getPortDepart(): ?Port
    {
        return $this->port_depart;
    }

    public function setPortDepart(?Port $port_depart): self
    {
        $this->port_depart = $port_depart;

        return $this;
    }

    public function getPortArrive(): ?Port
    {
        return $this->port_arrive;
    }

    public function setPortArrive(?Port $port_arrive): self
    {
        $this->port_arrive = $port_arrive;

        return $this;
    }

    public function getSecteur(): ?Secteur
    {
        return $this->secteur;
    }

    public function setSecteur(?Secteur $secteur): self
    {
        $this->secteur = $secteur;

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
            $tarifer->setLiaison($this);
        }

        return $this;
    }

    public function removeTarifer(Tarifer $tarifer): self
    {
        if ($this->tarifers->removeElement($tarifer)) {
            // set the owning side to null (unless already changed)
            if ($tarifer->getLiaison() === $this) {
                $tarifer->setLiaison(null);
            }
        }

        return $this;
    }
}
