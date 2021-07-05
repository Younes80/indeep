<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratRepository::class)
 */
class Contrat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="contrats")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="contrat")
     */
    private $offers_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?Offer
    {
        return $this->name;
    }

    public function setName(?Offer $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOffersId(): ?Offer
    {
        return $this->offers_id;
    }

    public function setOffersId(?Offer $offers_id): self
    {
        $this->offers_id = $offers_id;

        return $this;
    }
}
