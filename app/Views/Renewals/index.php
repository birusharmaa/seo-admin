<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
			name="viewport"
		/>
		<title><?= $title ?></title>

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
								<?= $title ?>
								</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">
									<?= $title ?>
									</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->
						<!--Row-->
						<div class="row row-sm mx-auto">
							<div class="col-md-12 ">
							<div class="row mt-4">
								<?php // print_r( $data); ?>
							<?php if($data): foreach($data as $value) {// print_r($value);  ?>
                                <div class="col-md-4">
									<div class="card mb-5 box-shadow border-transparent" style="width: 20rem;" >
									
										<ul class="list-group list-group-flush py-3 px-4">
										<div class="d-flex">
											<div class="media-icon text-danger "> <i class="icon ion-md-phone-portrait"></i> </div>
												<li class="list-group-item border-none px-0"><?= $value->phone; ?></li>
											</div>
											<div class="d-flex">
											<div class="media-icon text-warning"> <i class="fas fa-envelope fa-fw"></i> </div>
												<li class="list-group-item border-none px-0"><?= $value->email; ?></li>
											</div>
											<div class="d-flex">
											<div class="media-icon text-primary"> <i class="fa fa-rupee-sign"></i> </div>
												<li class="list-group-item border-none px-0 text-danger fw-bold">
													<?php if($value->is_installed == 0)
														{ echo 'Uninstalled';} 
														else
													{ echo 'Installed';    } ?>	
												</li>
											</div>
											<div class="d-flex">
											<div class="media-icon text-info"> <i class="fa fa-arrow-circle-right"></i> </div>
												<li class="list-group-item border-none px-0"><?= $value->plugin_key; ?></li>
											</div>
											<div class="d-flex">
											<div class="media-icon text-success"> <i class="fa fa-key"></i> </div>
												<li class="list-group-item border-none px-0"><?= $value->password; ?></li>
											</div>
											<div class="d-flex">
											<div class="media-icon text-danger"> <i class="fa fa-hourglass-end"></i></div>
												<li class="list-group-item border-none px-0">Expires in : 27</li>
											</div>
											<div class="text-center">
												<a href="<?=base_url();?>/manage-plugins/<?= $value->id?>">
												<button class="btn btn-primary shadow-none mt-5 mb-2 w-100 border-transparent shadow ">Manage Plugin</button>
											</a>
									
											</div>
										</ul>
									
									
									</div>
								</div>
								<?php } endif; ?>
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
	</body>
</html>
