<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <title><?= $title; ?></title>
    <?php include __DIR__ . '/../Layout/cssLinks.php'; ?>
</head>
<body class="main-body leftmenu light-horizontal light-theme color-header color-leftmenu theme-<?= $color; ?>">

    <!-- Loader -->
    <div id="global-loader">
        <img src="public/assets/img/loader.svg" class="loader-img" alt="Loader" />
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">
        <!-- Sidemenu -->
        <div class="main-sidebar main-sidebar-sticky side-menu">
            <div class="sidemenu-logo">
                <a class="main-logo text-white" href="#"> SEO </a>
            </div>

            <?php include __DIR__ . '/../Layout/sidebar.php'; ?>
        </div>
        <!-- End Sidemenu -->
        <!-- Main Header-->
        <?php include __DIR__ . '/../Layout/navbar.php'; ?>
        <!-- End Main Header-->
        <!-- Main Content-->
        <div class="main-content side-content pt-0">