<?php

namespace nameOne;

use nameOne\Product;

class ProductAdd
{
    private DB $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function getDistinctProperties(): array
    {
        $this->db->query("SELECT DISTINCT type FROM property ORDER BY type ASC");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getFullProperties(): array
    {
        $this->db->query("SELECT * FROM property ORDER BY type ASC");
        $results = $this->db->resultSet();
        return $results;
    }

    public function groupFullProperties(): array
    {
        $properties = array();
        foreach ($this->getFullProperties() as $row) {
            if (!isset($properties[$row['type']])) {
                $properties[$row['type']] = array();
            }
            $properties[$row['type']][] = [
                'id' => $row['id'],
                'property' => $row['property'],
                'label' => $row['label'],
                'description' => $row['description']
            ];
        }
        return $properties;
    }

    public function checkExistingSKU(string $skuToCheck): bool
    {
        $this->db->query("SELECT sku FROM product WHERE sku = :sku");
        $this->db->bind(':sku', $skuToCheck);
        if ($this->db->single()) {
            return true;
        }
        return false;
    }

    private function ensureNoEmpytValues(Product $product): bool
    {
        if (empty($product->getProductName()) || empty($product->getSku()) || empty($product->getPrice()) || empty($product->getProductType()))
            return false;
        return true;
    }

    public function insertNewProduct(Product $product)
    {
        if ($this->ensureNoEmpytValues($product) === false)
            return false;
        $properties = $this->groupFullProperties();
        foreach ($properties[$product->getProductType()] as $propertyData) {
            if (empty($_POST[$propertyData['property']]))
                return false;
        }
        $this->db->query("INSERT INTO `product` (`id`, `sku`, `name`, `price`, `type`) VALUES (null, :sku, :productName, :price, :selectedType)");
        $this->db->bind(':sku', $product->getSku());
        $this->db->bind(':productName', $product->getProductName());
        $this->db->bind(':price', $product->getPrice());
        $this->db->bind(':selectedType', $product->getProductType());
        $this->db->execute();
        $lastProductId = (int) $this->db->lastInsertId();
        foreach ($properties[$product->getProductType()] as $propertyData) {
            $propertyId = $propertyData['id'];
            $this->db->query("INSERT INTO `product_property` (`id`, `product_id`, `property_id`, `value`) VALUES (null, $lastProductId, $propertyId, :productValue )");
            $this->db->bind(':productValue', $_POST[(string) $propertyData['property']]);
            $this->db->execute();
        }
    }
}