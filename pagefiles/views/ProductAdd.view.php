<?php

use nameOne\ProductAdd;

$properties = new ProductAdd($this->db);
?>

<form method="POST" id="product_form" name="product_form" onsubmit="return validateForm()"
    action="http://<?= PRODUCT_ADD_LANDING ?>">
    <div id="top">
        <div id="page_title">Product Add</div>
        <div id="buttons">
            <button type="submit" name="save">Save</button>
            <button type="button" onclick="location.href='http://<?= PRODUCT_LIST_LANDING ?>';"
                name="cancel">Cancel</button>
        </div>
        <input type="hidden" name="save" value="save">
    </div>
    <div id="middle">
        <script src="pagefiles/js/displayErrorMessage.js"></script>
        <div id="alertMessage"></div>
        <table id="productAdd">
            <label>
                <tr>
                    <td class="productAddLabel">SKU</td>
                    <td class="productAddInput"><input type="text" id="sku" name="sku" /></td>
                </tr>
            </label>
            <label>
                <tr>
                    <td class="productAddLabel">Name</td>
                    <td class="productAddInput"><input type="text" id="name" name="name" /></td>
                </tr>
            </label>
            <label>
                <tr>
                    <td class="productAddLabel">Price</td>
                    <td class="productAddInput"><input type="number" min="0" step="any" id="price" name="price" /></td>
                </tr>
            </label>
            <tr>
                <td class="productAddLabel">Type Switcher</td>
                <td class="productAddInput"><select id="productType" name="productType">
                        <option value="" selected="selected"></option>

                        <?php
                        foreach ($properties->getDistinctProperties() as $property) {
                            echo '<option value="' . $property['type'] . '">' . $property['type'] . '</option>';
                        }
                        ?>

                    </select>
                </td>
            </tr>
            <tr class="spacer">
                <td></td>
                <td></td>
            </tr>
            <tr class="dynamicSwitcherField">
                <td colspan="2">
                    <div class="dynamicFields" id=""></div>

                    <?php
                    foreach ($properties->groupFullProperties() as $type => $properties) {
                        echo '<div class="dynamicFields" id="' . $type . '">';
                        foreach ($properties as $index => $propertyData) {
                            ?>

                            <label>
                                <?= $propertyData['label']; ?>
                                <input type="number" min="0" step="any" name="<?= $propertyData['property']; ?>"
                                    id="<?= $propertyData['property']; ?>" />
                            </label>
                            <?php

                            if ($index === count($properties) - 1) {
                                echo '<div class="productDescription">' . $propertyData['description'] . '</div>';
                            }

                        }
                        echo '</div>';
                    }
                    ?>

                </td>
            </tr>
        </table>
    </div>
</form>