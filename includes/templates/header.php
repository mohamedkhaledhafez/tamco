<!DOCTYPE html>

<html dir="<?php echo $dir; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Description" CONTENT="Tamco">
    <!-- echo the page title function -->
    <title><?php echoTitle(); ?> </title>
    <!-- Favicons -->
    <link href="<?php echo $imgs ?>tamco.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo $vendor ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo $css ?>style.css" rel="stylesheet">

    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php
    if ($noNavbar != '') {
        include 'navbar.php';
    }
    ?>