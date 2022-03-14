<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $or_date;

    #[ORM\Column(type: 'date')]
    private $or_deliverydate;

    #[ORM\Column(type: 'string', length: 12)]
    private $or_phone;

    #[ORM\Column(type: 'text')]
    private $or_address;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $or_totalprice;

    #[ORM\Column(type: 'string', length: 200)]
    private $or_status;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $us_user;

    #[ORM\OneToMany(mappedBy: 'or_orders', targetEntity: Details::class)]
    private $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrDate(): ?\DateTimeInterface
    {
        return $this->or_date;
    }

    public function setOrDate(\DateTimeInterface $or_date): self
    {
        $this->or_date = $or_date;

        return $this;
    }

    public function getOrDeliverydate(): ?\DateTimeInterface
    {
        return $this->or_deliverydate;
    }

    public function setOrDeliverydate(\DateTimeInterface $or_deliverydate): self
    {
        $this->or_deliverydate = $or_deliverydate;

        return $this;
    }

    public function getOrPhone(): ?string
    {
        return $this->or_phone;
    }

    public function setOrPhone(string $or_phone): self
    {
        $this->or_phone = $or_phone;

        return $this;
    }

    public function getOrAddress(): ?string
    {
        return $this->or_address;
    }

    public function setOrAddress(string $or_address): self
    {
        $this->or_address = $or_address;

        return $this;
    }

    public function getOrTotalprice(): ?string
    {
        return $this->or_totalprice;
    }

    public function setOrTotalprice(string $or_totalprice): self
    {
        $this->or_totalprice = $or_totalprice;

        return $this;
    }

    public function getOrStatus(): ?string
    {
        return $this->or_status;
    }

    public function setOrStatus(string $or_status): self
    {
        $this->or_status = $or_status;

        return $this;
    }

    public function getUsUser(): ?User
    {
        return $this->us_user;
    }

    public function setUsUser(?User $us_user): self
    {
        $this->us_user = $us_user;

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
            $detail->setOrOrders($this);
        }

        return $this;
    }

    public function removeDetail(Details $detail): self
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getOrOrders() === $this) {
                $detail->setOrOrders(null);
            }
        }

        return $this;
    }
}
