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
        <img src="assets/img/loader.svg" class="loader-img" alt="Loader" />
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
            <div class="container-fluid">
                <div class="inner-body">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div>
                            <h2 class="main-content-title tx-24 mg-b-5">
                                Inbox
                            </h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Inbox
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!--Row-->
                    <section>
                        <div class="containre-fluid">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-lg p-3 mb-5 bg-white rounded-lg border-0">
                                            <div class="px-3 pt-3">
                                                <h4 class="mb-0">Recent inquiries</h4>
                                            </div>
											
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="table-responsive mt-1">
                                                        <table class="table table-hover mb-0 table1 datatable">
                                                            <thead style="border-top:1px solid #dee2e6">
                                                                <tr>
                                                                    <th class="border-0 font-weight-bold">S.No.</th>
                                                                    <th class="border-0 font-weight-bold">Phone No</th>
                                                                    <th class="border-0 font-weight-bold">Inquiry</th>
                                                                    <th class="border-0 font-weight-bold"
                                                                        style="width:13%">Source</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
															<?php $num = 1; if($data): foreach($data as $value): ?>
                                                                <tr>
                                                                    <td class="border-0 align-baseline"><?= $num; ?></td>
                                                                    <td class=" border-0 align-baseline"><?= $value->phone ?></td>
                                                                    <td class="border-0"><?= $value->message ?></td>
                                                                    <td class="border-0 align-baseline"><?= $value->source ?></td>
                                                                </tr>
																<?php $num++; endforeach; endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <!-- Row end -->
                </div>
            </div>
        </div>
        <!-- End Main Content-->

        <!-- Main Footer-->
        <?php include __DIR__ . '/../Layout/footer.php'; ?>
        <!--End Footer-->
    </div>
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
    <?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
    <script>
    $(document).ready(function() {
        $(".datatable").DataTable({
            // info: false,
            lengthChange: false,
            // searching: false,
            pageLength: 5,
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        "use strict";
        new PerfectScrollbar(".main-chat-list", {
            suppressScrollX: !0
        }), new PerfectScrollbar("#ChatBody", {
            suppressScrollX: !0
        });
    });
    </script>


</body>

</html>