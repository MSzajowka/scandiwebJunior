<?php

namespace nameOne;

use nameOne\Product;

class ProductList
{
    private DB $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    private function getProducts(): array
    {
        $this->db->query("SELECT product.id prodId, product.sku, product.name, product.price, property.id, property.type, property.property, property.label, product_property.id, product_property.value FROM product_property INNER JOIN property ON product_property.property_id = property.id INNER JOIN product ON product_property.product_id = product.id ORDER BY product.id DESC
        ");
        return $this->db->resultSet();
    }

    public function listGroupedProducts(): array
    {
        $products = array();
        foreach ($this->getProducts() as $row) {
            if (!isset($products[$row['sku']])) {
                $product = new Product();
                $product->setProductName($row['name']);
                $product->setSku($row['sku']);
                $product->setPrice($row['price']);
                $product->setProductId($row['prodId']);
                $products[$row['sku']] = $product;
            }
            if (!empty($row['value'])) {
                $products[$row['sku']]->addProperty($row['value'], $row['label']);
            }
        }
        return $products;
    }

    public function massDelete(array $recordsIds): void
    {
        $idsToDel = (string) implode(", ", array_map('intval', $recordsIds));
        $this->db->query("DELETE FROM `product_property` WHERE `product_property`.`product_id` IN ($idsToDel)");
        $this->db->execute();
        $this->db->query("DELETE FROM `product` WHERE `product`.`id` IN ($idsToDel)");
        $this->db->execute();
    }
}