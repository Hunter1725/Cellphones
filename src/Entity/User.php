<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $us_username;

    #[ORM\Column(type: 'text')]
    private $us_password;

    #[ORM\Column(type: 'string', length: 50)]
    private $us_fullname;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $string;

    #[ORM\Column(type: 'string', length: 12)]
    private $us_phone;

    #[ORM\Column(type: 'text')]
    private $us_address;

    #[ORM\Column(type: 'string', length: 10)]
    private $us_role;

    #[ORM\OneToMany(mappedBy: 'us_user', targetEntity: Orders::class, orphanRemoval: true)]
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsUsername(): ?string
    {
        return $this->us_username;
    }

    public function setUsUsername(string $us_username): self
    {
        $this->us_username = $us_username;

        return $this;
    }

    public function getUsPassword(): ?string
    {
        return $this->us_password;
    }

    public function setUsPassword(string $us_password): self
    {
        $this->us_password = $us_password;

        return $this;
    }

    public function getUsFullname(): ?string
    {
        return $this->us_fullname;
    }

    public function setUsFullname(string $us_fullname): self
    {
        $this->us_fullname = $us_fullname;

        return $this;
    }

    public function getString(): ?string
    {
        return $this->string;
    }

    public function setString(?string $string): self
    {
        $this->string = $string;

        return $this;
    }

    public function getUsPhone(): ?string
    {
        return $this->us_phone;
    }

    public function setUsPhone(string $us_phone): self
    {
        $this->us_phone = $us_phone;

        return $this;
    }

    public function getUsAddress(): ?string
    {
        return $this->us_address;
    }

    public function setUsAddress(string $us_address): self
    {
        $this->us_address = $us_address;

        return $this;
    }

    public function getUsRole(): ?string
    {
        return $this->us_role;
    }

    public function setUsRole(string $us_role): self
    {
        $this->us_role = $us_role;

        return $this;
    }

    /**
     * @return Collection<int, Orders>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Orders $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setUsUser($this);
        }

        return $this;
    }

    public function removeOrder(Orders $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUsUser() === $this) {
                $order->setUsUser(null);
            }
        }

        return $this;
    }
}
