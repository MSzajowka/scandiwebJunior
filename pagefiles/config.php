<?php

// Define DB connection parameters
define("DB_HOST", "localhost");
define("DB_NAME", "***");
define("DB_USER", "***");
define("DB_PASS", "***");

// Define URL
define("PRODUCT_LIST_LANDING", "*somedomain*.pl");
define("PRODUCT_ADD_LANDING", "*somedomain*.pl/add-product");

include("DB.php");
include("Product.php");
include("PageDisplay.php");