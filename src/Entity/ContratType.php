<?php

namespace App\Entity;

use App\Repository\ContratTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratTypeRepository::class)
 */
class ContratType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="contratTypes")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="contratType")
     */
    private $offer_id;

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

    public function getOfferId(): ?Offer
    {
        return $this->offer_id;
    }

    public function setOfferId(?Offer $offer_id): self
    {
        $this->offer_id = $offer_id;

        return $this;
    }
}
