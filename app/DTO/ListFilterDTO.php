<?php

namespace App\DTO;

use App\Models\Contact;

class ListFilterDTO
{
    private ?string $id = null;
    private ?string $title = null;
    private ?string $orderId = null;
    private ?string $orderTitle = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(?string $orderId): static
    {
        if ($orderId !== null) {
            $orderId = ($orderId === 'desc') ? 'desc' : 'asc';
        }

        $this->orderId = $orderId;
        return $this;
    }

    public function getOrderTitle(): ?string
    {
        return $this->orderTitle;
    }

    public function setOrderTitle(?string $orderTitle): static
    {
        if ($orderTitle !== null) {
            $orderTitle = ($orderTitle === 'desc') ? 'desc' : 'asc';
        }

        $this->orderTitle = $orderTitle;
        return $this;
    }
}
