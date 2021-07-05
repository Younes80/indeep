<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */
class Offer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=1500)
     */
    private $detail;

    /**
     * @ORM\OneToMany(targetEntity=Contrat::class, mappedBy="name")
     */
    private $contrats;

    /**
     * @ORM\OneToMany(targetEntity=ContratType::class, mappedBy="name")
     */
    private $contratTypes;

    /**
     * @ORM\OneToMany(targetEntity=Contrat::class, mappedBy="offers_id")
     */
    private $contrat;

    /**
     * @ORM\OneToMany(targetEntity=ContratType::class, mappedBy="offer_id")
     */
    private $contratType;

    public function __construct()
    {
        $this->contrats = new ArrayCollection();
        $this->contratTypes = new ArrayCollection();
        $this->contrat = new ArrayCollection();
        $this->contratType = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }





    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * @return Collection|Contrat[]
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats[] = $contrat;
            $contrat->setName($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getName() === $this) {
                $contrat->setName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ContratType[]
     */
    public function getContratTypes(): Collection
    {
        return $this->contratTypes;
    }

    public function addContratType(ContratType $contratType): self
    {
        if (!$this->contratTypes->contains($contratType)) {
            $this->contratTypes[] = $contratType;
            $contratType->setName($this);
        }

        return $this;
    }

    public function removeContratType(ContratType $contratType): self
    {
        if ($this->contratTypes->removeElement($contratType)) {
            // set the owning side to null (unless already changed)
            if ($contratType->getName() === $this) {
                $contratType->setName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Contrat[]
     */
    public function getContrat(): Collection
    {
        return $this->contrat;
    }

    /**
     * @return Collection|ContratType[]
     */
    public function getContratType(): Collection
    {
        return $this->contratType;
    }

}
