<?php

use nameOne\DB;
use nameOne\PageDisplay;

require('pagefiles/config.php');
$db = new DB(DB_HOST, DB_NAME, DB_USER, DB_PASS);

$displayPage = new PageDisplay($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], $db);
$displayPage->decideOnContent();