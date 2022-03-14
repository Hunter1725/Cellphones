<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemsRepository::class)]
class Items
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $it_name;

    #[ORM\Column(type: 'string', length: 50)]
    private $it_imange;

    #[ORM\Column(type: 'text')]
    private $it_description;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $it_price;

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

    public function getItImange(): ?string
    {
        return $this->it_imange;
    }

    public function setItImange(string $it_imange): self
    {
        $this->it_imange = $it_imange;

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
    
}
