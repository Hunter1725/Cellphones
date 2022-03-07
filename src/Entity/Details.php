<?php

namespace App\Entity;

use App\Repository\DetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailsRepository::class)]
class Details
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $de_quantity;

    #[ORM\Column(type: 'integer')]
    private $de_price;

    #[ORM\Column(type: 'integer')]
    private $de_totalprice;

    #[ORM\ManyToOne(targetEntity: orders::class, inversedBy: 'details')]
    private $or_orders;

    #[ORM\ManyToOne(targetEntity: items::class, inversedBy: 'details')]
    #[ORM\JoinColumn(nullable: false)]
    private $it_items;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeQuantity(): ?int
    {
        return $this->de_quantity;
    }

    public function setDeQuantity(int $de_quantity): self
    {
        $this->de_quantity = $de_quantity;

        return $this;
    }

    public function getDePrice(): ?int
    {
        return $this->de_price;
    }

    public function setDePrice(int $de_price): self
    {
        $this->de_price = $de_price;

        return $this;
    }

    public function getDeTotalprice(): ?int
    {
        return $this->de_totalprice;
    }

    public function setDeTotalprice(int $de_totalprice): self
    {
        $this->de_totalprice = $de_totalprice;

        return $this;
    }

    public function getOrOrders(): ?orders
    {
        return $this->or_orders;
    }

    public function setOrOrders(?orders $or_orders): self
    {
        $this->or_orders = $or_orders;

        return $this;
    }

    public function getItItems(): ?items
    {
        return $this->it_items;
    }

    public function setItItems(?items $it_items): self
    {
        $this->it_items = $it_items;

        return $this;
    }
}
