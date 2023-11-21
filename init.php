<?php

include 'connect.php';

$dir = "ltr";

// Routes :
$templates = 'includes/templates/'; // Templates directory
$func      = 'includes/functions/';  // functions directory 
$css       = 'layout/css/';         // Css directory
$vendor    = 'layout/vendor/';         // Vendor directory
$js        = 'layout/js/';          // js directory
$imgs      = 'uploads/imgs/';          // js directory

// include the important files :
include $func . 'functions.php';
include $templates . 'header.php';

// include the navbar in all pages except the one with variable : $noNavbar 
if (!isset($noNavbar)) {
    include $templates . 'navbar.php';
}
