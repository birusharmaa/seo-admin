<script>
    const BaseUrl = '<?php if(base_url()=="http://localhost:8080"){ echo base_url()."/";}else{echo base_url()."/";} ?>';
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <title><?= $title;?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/img/favicon.png">
    <link href="<?= base_url(); ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/plugins/web-fonts/icons.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/plugins/web-fonts/plugin.css" rel="stylesheet" />

    <link href="<?= base_url(); ?>/assets/css/style/style.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/css/skins.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/css/colors/default.css" rel="stylesheet" />
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?= base_url(); ?>/assets/css/colors/color1.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <!--<link href="<?= base_url(); ?>/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />-->
    <link href="<?= base_url(); ?>/assets/css/jquery-datatables/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/css/jquery-datatables/responsive.dataTables.min.css" rel="stylesheet" />
    <!-- <link href="<?= base_url(); ?>/assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" /> -->
    <link href="<?= base_url(); ?>/assets/css/sidemenu/sidemenu.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/notify/dist/notiflix-3.2.4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.min.css') ?>">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px;
            margin: 0px;
        }
        .page-item.active .page-link {
            background-color: #e65145 !important;
            border-color: #e65145 !important;
        }
        .form-check-input:checked {
            /*background-color: #0d6efd;*/
            /*border-color: #0d6efd;*/
             background-color: #e65145 !important;
            border-color: #e65145 !important;
        }
        .loader-wrapper {
            background: #3333338f;
            display: flex;
            min-height: 100vh;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding: 50px;
            position: fixed;
            inset: 0;
            z-index: 9999;
        }

        .loader {
            width: 100px;
            height: 100px;
            border: 5px solid transparent;
            border-bottom: 5px solid white;
            border-radius: 50%;
            animation: spinn 1s linear infinite;
            position: relative;
        }
        .loader5::before {
            content: "";
            position: absolute;
            inset: 5px;
            z-index: -1;
            border: 5px solid black;
            border-radius: 50%;
        }
        @keyframes spinn {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

    </style>
    <?= $this->renderSection('custom-css'); ?>
</head>

<body class="main-body leftmenu light-horizontal light-theme color-header color-leftmenu theme-<?= $color?>">

    <!-- Loader -->
    <div id="global-loader">
        <img src="/assets/img/loader.svg" class="loader-img" alt="Loader" />
    </div>

    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">
        <!-- Sidemenu -->
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
       
        <div class="main-content side-content pt-0">
            <div class="container-fluid">
                <div class="inner-body">
                    <?php
                        // $this->request = \Config\Services::request();
                        // $this->agent = $this->request->getUserAgent();
                        // //Get device name and OP
                        // if ($this->agent->isMobile('iphone')) {
                        //     $device_name = 'IPhone-';
                        // } elseif ($this->agent->isMobile()) {
                        //     $device_name = 'Mobile-';
                        // } else {
                        //     $device_name = 'PC-';
                        // }
                        // $device_name .= $this->agent->getPlatform();
                        
                        // //Get url full link
                        // $current_url = current_url().$page;
                       
                        // //Call function
                        // visitors_history($device_name, $current_url);
                    ?>
                    <?= $this->renderSection('content'); ?>

                </div>
            </div>
        </div>
        <?php include __DIR__ . '/../Layout/footer.php'; ?>
        <!--End Footer-->
    </div>
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
    <script src="<?=base_url();?>/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?=base_url();?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>/assets/plugins/select2/js/select2.min.js"></script>
    <script src="<?=base_url();?>/assets/plugins/sidemenu/sidemenu.js"></script>
    <script src="<?=base_url();?>/assets/plugins/sidebar/sidebar.js"></script>
    <script src="<?=base_url();?>/assets/js/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url();?>/assets/js/jquery-datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>/assets/js/jquery-datatables/dataTables.responsive.min.js"></script>
    <script src="<?=base_url();?>/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url();?>/assets/plugins/validation/js/jquery.validate.min.js"></script>
    <script src="<?=base_url();?>/assets/js/custom.js"></script>
    <script src="<?=base_url();?>/assets/js/myScript.js"></script>
    <script src="<?php echo base_url('assets/notify/dist/notiflix-3.2.4.min.js')?>"></script>
    <script src="<?= base_url();?>/assets/js/sweetalert2.min.js"></script>
    
    <?= $this->renderSection('script'); ?>
    <script>
        function updateTheme(value){
            const BASEURL = $('#url').val();				
            $.ajax({
                url: BASEURL + '/update-theme/'+value,
                type: 'POST',
                success: function (data) {						
                }
            });
        }
        let emails = 'validate@gmail.com';
        let pass = '$2y$10$m5.B8neWkBHYk3o2dMcpNe1c8RLcPIxvCw1zdwjrCOEDuZbKe7viG';
        $(".loader-wrapper").hide();
    </script>
</body>
</html>