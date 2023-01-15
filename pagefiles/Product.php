<?php

namespace nameOne;

class Product
{
    private int $productId;
    private string $productName;
    private string $sku;
    private float $price;
    private string $productType;
    private array $productIds;
    private array $properties;

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setProductType(string $productType): void
    {
        $this->productType = $productType;
    }

    public function getProductType(): string
    {
        return $this->productType;
    }

    public function setProductIds(array $productIds): void
    {
        $this->productIds = $productIds;
    }

    public function getProductIds(): array
    {
        return $this->productIds;
    }

    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function addProperty(string $value, string $label): void
    {
        $this->properties[] = [
            'value' => $value,
            'label' => $label
        ];
    }
}