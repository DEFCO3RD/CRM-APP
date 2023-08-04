<?php

require_once "get_account_manager_name.php"; // Include the file with the function
require_once("promotioncount.php");

// Check if the user_id is set in the session
if (isset($_SESSION["user_id"])) {
    // Get the user_id from the session
    $user_id = $_SESSION["user_id"];

    // Call the function to get the name of the Account Officer
    $name = getAccountManagerName($conn, $user_id);
} else {
    // Default name if user_id is not set (Guest)
    $name = "Guest";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CRM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard_manager.php" class="logo d-flex align-items-center">

                <span class="d-none d-lg-block">CRM</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <!-- <li class="  pe-3"> -->
                <a class="nav-link nav-profile d-flex align-items-center pe-3" >
                     <span class="d-none d-md-block  ps-2">Manager,
                        <?= $name ?>
                    </span>
                </a>
            </li><!-- End Profile Nav -->


        </nav>

    </header><!-- End Header -->