<?= $this->extend('template/main');?>
<?= $this->section('custom-css');?>
    
<?= $this->endSection();?>

<?= $this->section('content');?>
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">
                <?= $title;?>
            </h2>
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= $page_title;?>
                </li>
            </ol>
        </div>
    </div>
    <section>
        <div class="containre-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-lg p-3 mb-5 bg-white rounded-lg border-0">
                            
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="mb-0 pl-3">All clients plugins</h4>
                                </div>
                                <div class="col-6 text-right">
                                    <button data-toggle="modal" data-target="#addClientModel" class="btn btn-primary mr-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Partner</button>
                                </div>
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="mt-1">
                                        <table class="table table-hover mb-0 table1 datatable responsive nowrap" style="width:100%">
                                            <thead style="border-top:1px solid #dee2e6">
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Role</th>
                                                    <th>Company Logo</th>
                                                    <th>Company Name</th>
                                                    <th>Company Profile</th>
                                                    <th>Company Address</th>
                                                    <th>Company Phone No</th>
                                                    <th>Website URL</th>
                                                    <th>Facebook Link</th>
                                                    <th>Twitter Link</th>
                                                    <th>Google Plus</th>
                                                    <th>Linked In</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
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
    <?= $this->include('clients/modal') ?>
<?= $this->endSection();?>
<?= $this->section('script');?>
    <script src="<?= base_url('assets/js/pages/clients.js');?>"></script>
<?= $this->endSection(); ?>