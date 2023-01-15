<?php

namespace nameOne;

use nameOne\Product;

class PageDisplay
{
    private string $request;
    private array $recordsIds;
    private DB $db;

    public function __construct($request, DB $db)
    {
        $this->db = $db;
        $requestString = explode("?", $request);
        $this->request = $requestString[0];
    }
    public function decideOnContent()
    {
        if (!$this->request) {
            return;
        }

        switch ($this->request) {
            case PRODUCT_LIST_LANDING . '/':
                $title = (string) 'Product List';
                $pageContent = (string) 'ProductList';
                include($pageContent . '.php');
                if (isset($_POST['mass_delete']) && isset($_POST['product_check'])) {
                    $product = new Product();
                    $product->setProductIds($_POST['product_check']);
                    $productsToDelete = new ProductList($this->db);
                    $productsToDelete->massDelete($product->getProductIds());
                }
                break;
            case PRODUCT_ADD_LANDING:
                $title = (string) 'Product Add';
                $pageContent = (string) 'ProductAdd';
                include($pageContent . '.php');
                if (isset($_POST['save']) && isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['productType'])) {
                    $product = new Product();
                    $product->setProductName($_POST['name']);
                    $product->setSku($_POST['sku']);
                    $product->setPrice($_POST['price']);
                    $product->setProductType($_POST['productType']);
                    $productObject = new ProductAdd($this->db);
                    if (!$productObject->checkExistingSKU($product->getSku())) {
                        $productObject->insertNewProduct($product);
                    }
                    header("Location:http://" . PRODUCT_LIST_LANDING);
                }
                break;
            default:
                $title = (string) 'Product List';
                $pageContent = (string) "ProductList";
                include($pageContent . '.php');
                break;
        }
        $this->displayHeader($title);
        require('views/' . $pageContent . '.view.php');
        $this->displayFooter();
    }

    public static function displayHeader(string $title): void
    {
        require_once("views/html/header.html");
    }

    public static function displayFooter(): void
    {
        require_once("views/html/footer.html");
    }
}