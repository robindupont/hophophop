<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OtherIngredientRepository")
 */
class OtherIngredient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $SBUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $BLUrl;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RecipeOthers", mappedBy="otherIngredient")
     */
    private $recipeOthers;

    /**
     * @ORM\Column(type="boolean")
     */
    private $approved;

    public function __construct()
    {
        $this->recipeOthers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSBUrl(): ?string
    {
        return $this->SBUrl;
    }

    public function setSBUrl(?string $SBUrl): self
    {
        $this->SBUrl = $SBUrl;

        return $this;
    }

    public function getBLUrl(): ?string
    {
        return $this->BLUrl;
    }

    public function setBLUrl(string $BLUrl): self
    {
        $this->BLUrl = $BLUrl;

        return $this;
    }

    /**
     * @return Collection|RecipeOthers[]
     */
    public function getRecipeOthers(): Collection
    {
        return $this->recipeOthers;
    }

    public function addRecipeOther(RecipeOthers $recipeOther): self
    {
        if (!$this->recipeOthers->contains($recipeOther)) {
            $this->recipeOthers[] = $recipeOther;
            $recipeOther->setOtherIngredient($this);
        }

        return $this;
    }

    public function removeRecipeOther(RecipeOthers $recipeOther): self
    {
        if ($this->recipeOthers->contains($recipeOther)) {
            $this->recipeOthers->removeElement($recipeOther);
            // set the owning side to null (unless already changed)
            if ($recipeOther->getOtherIngredient() === $this) {
                $recipeOther->setOtherIngredient(null);
            }
        }

        return $this;
    }

    public function getApproved(): ?bool
    {
        return $this->approved;
    }

    public function setApproved(bool $approved): self
    {
        $this->approved = $approved;

        return $this;
    }
}
