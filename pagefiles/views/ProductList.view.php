<?php

use nameOne\ProductList;

$products = new ProductList($this->db);
?>

<form method="POST" name="productAddForm" action="http://<?= PRODUCT_LIST_LANDING ?>">
    <div id="top">
        <div id="page_title">Product List</div>
        <div id="buttons">
            <button type="button" onclick="location.href='http://<?= PRODUCT_ADD_LANDING ?>';" />ADD</button>
            <button type="submit" id="delete-product-btn" name="mass_delete">MASS DELETE</button>
        </div>
    </div>
    <div id="middle" class="productList">

        <?php
        foreach ($products->listGroupedProducts() as $key => $val) {
            ?>
            <label>
                <div class="product_box">
                    <input type="checkbox" class="delete-checkbox" name="product_check[]"
                        value="<?= $val->getProductId(); ?>" />
                    <div>
                        <?= $key; ?>
                    </div>
                    <div>
                        <?= $val->getProductName(); ?>
                    </div>
                    <div>$ <?= number_format($val->getPrice(), 2, ',', ' '); ?></div>
                    <div>
                        <?php
                        foreach ($val->getProperties() as $propertyData) {
                            echo $propertyData['label'] . ': ' . $propertyData['value'] . '<br />';

                        }
                        echo '</div></div></label>';
        }
        ?>

                </div>
</form>