<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


#[ORM\Entity(repositoryClass: ItemsRepository::class)]
/**
 * @Vich\Uploadable
 */
class Items
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $it_name;

    #[ORM\Column(type: 'text')]
    private $it_description;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $it_price;

        /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    
    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private $cat_category;

    #[ORM\OneToMany(mappedBy: 'it_items', targetEntity: Details::class, orphanRemoval: true)]
    private $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItName(): ?string
    {
        return $this->it_name;
    }

    public function setItName(string $it_name): self
    {
        $this->it_name = $it_name;

        return $this;
    }

    public function getItDescription(): ?string
    {
        return $this->it_description;
    }

    public function setItDescription(string $it_description): self
    {
        $this->it_description = $it_description;

        return $this;
    }

    public function getItPrice(): ?string
    {
        return $this->it_price;
    }

    public function setItPrice(string $it_price): self
    {
        $this->it_price = $it_price;

        return $this;
    }

    public function getCatCategory(): ?Category
    {
        return $this->cat_category;
    }

    public function setCatCategory(?Category $cat_category): self
    {
        $this->cat_category = $cat_category;

        return $this;
    }

    /**
     * @return Collection<int, Details>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Details $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setItItems($this);
        }

        return $this;
    }

    public function removeDetail(Details $detail): self
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getItItems() === $this) {
                $detail->setItItems(null);
            }
        }

        return $this;
    }
    
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }
}
