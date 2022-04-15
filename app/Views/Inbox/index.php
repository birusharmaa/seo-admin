<?= $this->extend('template/main'); ?>
<?= $this->section('content');?>

    <!-- Page Header -->
    <div class="page-header">
        <div class="pt-4">
            <ol class="breadcrumb mt-4">
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

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
    <script>
     $(document).ready(function() {
        $(".datatable").DataTable({
            // info: false,
            lengthChange: false,
            // searching: false,
            pageLength: 5,
        });
    });

    $(document).ready(function() {
        "use strict";
        new PerfectScrollbar(".main-chat-list", {
            suppressScrollX: !0
        }), new PerfectScrollbar("#ChatBody", {
            suppressScrollX: !0
        });
    });
    </script>

<?= $this->endSection(); ?>