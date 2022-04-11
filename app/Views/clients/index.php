<?= view('Layout/header_section', ['title' => $title, 'color' => $color]); ?>
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
                                                        <th class="border-0 font-weight-bold">Action</th>
                                                        <th class="border-0 font-weight-bold">Phone No</th>
                                                        <th class="border-0 font-weight-bold">Inquiry</th>
                                                        <th class="border-0 font-weight-bold" style="width:13%">Source</th>
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


        <!-- Row end -->
    </div>
</div>
<?= view('Layout/footer_section'); ?>
<script>
    $(document).ready(function() {
        //getClients();
        getAnotherClients();
    });
    
    function getClients() {
        let email = 'validate@gmail.com';
        let password = '$2y$10$m5.B8neWkBHYk3o2dMcpNe1c8RLcPIxvCw1zdwjrCOEDuZbKe7viG';
        $.ajax({
            url: "<?= base_url('getclients'); ?>",
            headers: {
                'email':email,
                'password':password,
                
            },
            type: 'get',
            success: function(result) { 
                var data = JSON.parse(result);                
                result = JSON.stringify(data.data);
                loadClientsData(result)
                //getAnotherClients();
                //insertAntherClient();
                //undateAntherClient();
            },
            error: function() {}
        })
    }

    function loadClientsData(result) {
        let table = $(".datatable").DataTable();
        let dataSet = [];
        result = JSON.parse(result);
        if (result) {
            result.forEach((e) => {
                let action = `<a href="#" >Edit</a>`;
                let row = [
                    e.id,
                    action,
                    e.phone,
                    e.message,
                    e.source
                ];
                dataSet.push(row);
            })
        }
        table.destroy();
        $(".datatable").DataTable({
            lengthChange: false,
            data: dataSet,
            pageLength: 5,
            dom: 'lBfrtip'
        });
    }


    function getAnotherClients(token = null){
        let emails = 'validate@gmail.com';
        let pass = '$2y$10$m5.B8neWkBHYk3o2dMcpNe1c8RLcPIxvCw1zdwjrCOEDuZbKe7viG';
        $.ajax({
            url: "https://seoplugin.thewingshield.com/get-all-users/",
            type: 'get',
            // headers: {
            //     'email':emails,
            //     'password':pass
            // },
            // dataType: 'json',
            // crossdomain: true,
            success: function(result) {
                // console.log('ss');
                // return;
                loadClientsData(result)
            },
            error: function(error, data) {
                 //console.log(error);
                 //console.log(data);
                //return;
            }
        })
        // let email = "abc@gmmail.com";
        // let password = "abc@gmmail.com";
            
        //     var json_data = {
        //         "password" : '$2y$10$m5.B8neWkBHYk3o2dMcpNe1c8RLcPIxvCw1zdwjrCOEDuZbKe7viG',
        //         "email" : 'validate@gmail.com'
        //     }
        //     var str_json = JSON.stringify(json_data)
        // const xhr = new XMLHttpRequest();
        // xhr.open('POST', 'https://seoplugin.thewingshield.com/getanthorclients');
        // xhr.setRequestHeader('email', email);
        // xhr.setRequestHeader('password', password);
        // xhr.setRequestHeader('Content-Type', 'application/json');
        // xhr.send(str_json);
    }


   


</script>