<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
			name="viewport"
		/>
		<title><?php echo $title; ?></title>

        <?php include __DIR__ . '/../Layout/cssLinks.php'; ?>
	</head>

	<body
    class="main-body leftmenu light-horizontal light-theme color-header color-leftmenu theme-<?= $color; ?>"
	>

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
								<?php echo $title; ?>
								</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item">General Settings</li>
									<li class="breadcrumb-item active" aria-current="page">
									<?php echo $title; ?>
									</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->
					
                        <!-- Tab panels -->
						<div class="tab-content">
							<!-- Panel 1 -->
							<div class="tab-pane fade in show active" id="panel555" role="tabpanel">
								<!-- Nav tabs -->
								<div class="row mb-5 pt-3">
									
								<div class="col-md-12 m-auto box-shadow">
									<!-- Tab panels -->
									<div class="tab-content vertical p-3">	
                                        <input type="hidden" name="url" id="url" value="<?php echo base_url(); ?>">	
                                        <input type="hidden" name="state_id" id="state_id">									
                                        <form class="form-horizontal" id="masterstate">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group ">					
                                                        <div class="mb-3"> 
                                                            <lable>State Name</lable>                                                         													
                                                            <input type="text" class="form-control" name="state_name" id="state_name" placeholder="Enter State Name" >
                                                        </div>
                                                    </div>	    
                                                </div>   
                                               
                                                <div class="col-md-4">
                                                    <div class="form-group ">					
                                                        <div class="mb-3"> 
                                                            <lable>Country Name</lable>                                                            													
                                                            <select class="form-control" name="country_id" id="country_id">
                                                                <option value="">select</option>
                                                                <?php If($country): foreach($country as $value): ?>
                                                                    <option value="<?= $value->id ?>"><?= $value->country_name ?></option>
                                                                <?php endforeach;  endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>	    
                                                </div> 
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <lable>Status</lable>  
                                                        <div>  
                                                            <lable class="mr-4">Active</lable> <input class="form-check-input" type="radio" name="status" id="activeStatus" value="1" checked>
                                                            <lable class="mr-4">Inactive</lable> <input class="form-check-input" type="radio" name="status" id="inactiveStatus"  value="0">
                                                        </div>   
                                                    </div>
                                                </div>                                              
                                                <div class="col-md-1">
                                                    <div class="text-right">
                                                        <button type="Submit" id="submit_btn" class="btn btn-primary">Save</button>
                                                    </div>   
                                                </div>
                                            </div>                                            
                                        </form>
                                         
                                        <table class="table mt-3" id="state_table">
                                           <thead>
                                                <th>#</th>
                                                <th> State Name</th> 
                                                <th> Country Name</th> 
                                                <th> Status</th>                                                
                                                <th>Action</th>               
                                           </thead>
                                            <tbody>
                                                <?php $num =1; if($state){ foreach($state as $value){ ?>
                                                   <tr>
                                                       <td><?= $num?></td>
                                                       <td><?= $value->state_name?></td>   
                                                       <td><?= $value->country_name?></td>    
                                                       <td><?php if($value->status==1){?>
                                                           <span class="badge badge-pill badge-success">Active</span>  
                                                        <?php }else{ ?>
                                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                                        <?php } ?></td>                                                   
                                                       <td>
                                                           <button class="btn btn-outline-warning btn-sm" onclick="edit_stateFun(<?= $value->id ;?>)"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                                                           <button class="btn btn-outline-danger btn-sm" onclick="delete_stateFun(<?= $value->id ;?>);"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                       </td>
                                                   </tr>     
                                                <?php $num++;  } } ?>
                                            </tbody>
                                        </table>                                       
									</div>
								  </div>
								</div>
								<!-- Nav tabs -->
							</div>
						</div>
                        <!-- Tab panels -->
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
		<script src="<?php echo base_url('assets/js/mycustomscripts.js')?>"></script>	
        <script>
           $( document ).ready(function() {
                $('#state_table').DataTable();
            });
           
        </script>                                                    
	</body>
</html>
