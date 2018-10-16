<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ApiResource(
 *      normalizationContext={"groups"={"layout:read"}},
 *      denormalizationContext={"groups"={"layout:write"}}
 * )
 * @ApiFilter(PropertyFilter::class)
 * @ApiFilter(SearchFilter::class, properties={"enabled": "exact", "type.slug": "exact"})
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"layout:read", "layout:write"}) 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"layout:read", "layout:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"layout:read", "layout:write"})
     */
    private $description;

    /**
     * @var GalleryItem
     * @ORM\ManyToOne(targetEntity="App\Entity\GalleryItem", inversedBy="products")
     * @Groups({"layout:read", "layout:write"})
     * @MaxDepth(2)
     */
    private $image;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"layout:read", "layout:write"})
     */
    private $price = 0.0;

    /**
     * @var ProductType
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductType", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"layout:read", "layout:write"})
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"layout:read", "layout:write"})
     */
    private $enabled = true;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?GalleryItem
    {
        return $this->image;
    }

    public function setImage(?GalleryItem $image): self
    {
        $this->image = $image;

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

    public function getType(): ?ProductType
    {
        return $this->type;
    }

    public function setType(?ProductType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }

    public function getProductType(): ?ProductType
    {
        return $this->productType;
    }

    public function setProductType(?ProductType $productType): self
    {
        $this->productType = $productType;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }
}
