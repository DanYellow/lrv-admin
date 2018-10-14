<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use Cocur\Slugify\Slugify;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductTypeRepository")
 * @ApiResource(
 *      normalizationContext={"groups"={"layout:read"}},
 *      denormalizationContext={"groups"={"layout:write"}},
 * )
 */
class ProductType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"layout:read", "layout:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"layout:read", "layout:write"})
     */
    private $price;


    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"layout:read", "layout:write"})
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="type")
     */
    private $products;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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

        $slugify = new Slugify();
        $this->slug = $slugify->slugify($name);

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setType($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getType() === $this) {
                $product->setType(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

/*    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    } */

    public function __toString() {
        return $this->name;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
