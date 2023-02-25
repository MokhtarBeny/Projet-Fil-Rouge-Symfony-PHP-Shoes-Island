<?php

namespace App\Entity;

use App\Repository\SousCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousCategorieRepository::class)]
class SousCategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $sousCategorieNom = null;

    #[ORM\Column(length: 50)]
    private ?string $sousCategorieType = null;

    #[ORM\OneToMany(mappedBy: 'SousCategorie', targetEntity: Produit::class)]
    private Collection $produits;

    #[ORM\ManyToOne(inversedBy: 'sousCategories')]
    private ?Categorie $Categorie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagesrc = null;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSousCategorieNom(): ?string
    {
        return $this->sousCategorieNom;
    }

    public function setSousCategorieNom(string $sousCategorieNom): self
    {
        $this->sousCategorieNom = $sousCategorieNom;

        return $this;
    }

    public function getSousCategorieType(): ?string
    {
        return $this->sousCategorieType;
    }

    public function setSousCategorieType(string $sousCategorieType): self
    {
        $this->sousCategorieType = $sousCategorieType;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setSousCategorie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getSousCategorie() === $this) {
                $produit->setSousCategorie(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getImagesrc(): ?string
    {
        return $this->imagesrc;
    }

    public function setImagesrc(?string $imagesrc): self
    {
        $this->imagesrc = $imagesrc;

        return $this;
    }
}
