<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
			name="viewport"
		/>
		<title><?= $title; ?></title>

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
								<h2 class="main-content-title tx-24 mg-b-5"><?= $title; ?></h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">
									<?= $title; ?>
									</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->
						<!--Row-->
						<div class="row row-sm mx-auto">
							<div class="col-md-12 ">
								<div class="row">
                                    <div class="col-md-4 box-shadow border">
                                       <form class="py-4 px-2" id="buyInventory">
											<div class="form-group ">					
												<div class="mb-3">
													<label class="form-label font-weight-bold">Total Available Inventory</label>				
													<input type="text" class="form-control" name="totalInventory" id="totalInventory" value="5" readonly>
												</div>
											</div>
											<div class="form-group ">					
												<div class="mb-3">
													<label class="form-label font-weight-bold">Per Inventory Price</label>				
													<input type="text" class="form-control" name="price" id="price" value="5000" readonly>
												</div>
											</div>
											<div class="form-group ">					
												<div class="mb-3">
													<label class="form-label font-weight-bold">Purchase Inventory</label>
													<input type="text" class="form-control" name="purchaseInventory" id="purchaseInventory" placeholder="0" onkeyup="calculateTotalAmount(this.value)"     >
												</div>
											</div>
											<div class="form-group ">					
												<div class="mb-3">
													<label class="form-label font-weight-bold">Total Amount with 18% GST</label><input type="text" class="form-control" name="total_amount" id="total_amount" placeholder="0"  readonly>
												</div>
											</div>
											<div>
												<button class="btn btn-primary w-100">Buy Now</button>
											</div>
									   </form>
									</div>
									<div class="col-md-8 ">

									<div class="card custom-card overflow-hidden shadow">
									<div class="card-body">
									
										<div class="table-responsive">
											<table class="table" id="inventory-table">
												<thead>
													<tr>
														<th class="wd-20p">S.No</th>
														<th class="wd-25p">Date</th>
														<th class="wd-20p">Payment Id</th>
														<th class="wd-15p">Amount</th>
														<th class="wd-20p">Inventory</th>
														<th class="wd-20p">Status</th>
													</tr>
												</thead>
												<tbody>												
												<?php $i=1; if($inventry): foreach($inventry as $value) { ?>
													<tr>
														<td><?= $i ?></td>
														<td><?= $value->purchase_date; ?></td>
														<td><?= $value->payment_id; ?></td>
														<td><?= $value->total_amount; ?></td>
														<td><?= $value->purchase_inventry; ?></td>
														<td><?php if($value->status==1){ echo 'Active'; }else{  echo 'Inactive'; } ?></td>
													</tr>
												<?php $i++; } endif;?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

									</div>
								</div>
                         
								
							</div>
						</div>
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
			$(document).ready(function(){
				$('#inventory-table').DataTable();
			})
    </script>
	<script src="<?php echo base_url('assets/js/mycustomscripts.js')?>"></script>	
	<script>
	
	</script>
	</body>
</html>
