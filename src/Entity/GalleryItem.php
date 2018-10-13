<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GalleryItemRepository")
 * @Vich\Uploadable
 */
class GalleryItem
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
     * @Vich\UploadableField(mapping="gallery_images", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $showOnline = true;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="image")
     */
    private $products;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->showOnline = true;
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

    public function getShowOnline(): ?bool
    {
        return $this->showOnline;
    }

    public function setShowOnline(bool $showOnline): self
    {
        $this->showOnline = $showOnline;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setImage($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getImage() === $this) {
                $product->setImage(null);
            }
        }

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        if ($image) {
            $this->updatedAt = new \DateTime('now');
            
            if(!isset($this->name)) {
                $fileName = md5(uniqid()) . '.' . $image->guessExtension();
                $this->name = $fileName;
            }
        }
    }

    public function getImageFile() 
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
