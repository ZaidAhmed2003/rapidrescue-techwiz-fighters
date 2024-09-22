<?php
session_start();
require "config/database.php";
// check if the user is an admin
if ($_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Rapid Rescue | Dashboard</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <link
        href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />

    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/animate.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/aos.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/custom-animate.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/fancybox.min.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/flaticon.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/icomoon.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/imp.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/jquery.bootstrap-touchspin.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/nice-select.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/owl.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/rtl.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/scrollbar.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/swiper.min.css" />

    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/module-css/header-section.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/module-css/dashboard-layout.css" />

    <link
        href="<?= ROOT_URL ?>assets/css/color/theme-color.css"
        id="jssDefault"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/responsive.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/custom.css" />
    <!-- Favicon -->
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="<?= ROOT_URL ?>assets/images/favicon/apple-touch-icon.png" />
    <link
        rel="icon"
        type="image/png"
        href="<?= ROOT_URL ?>assets/images/favicon/favicon-32x32.png"
        sizes="32x32" />
    <link
        rel="icon"
        type="image/png"
        href="<?= ROOT_URL ?>assets/images/favicon/favicon-16x16.png"
        sizes="16x16" />

    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->
</head>