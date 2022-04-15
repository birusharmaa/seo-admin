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
								<h2 class="main-content-title tx-24 mg-b-5">
								<?= $title;?>
								</h2>
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
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card  border-none">
									<div class="card-body box-shadow">
									
										<form id="add-pluginForm">
										<div id="wizard1">
											
											<h3 class="text-decoration-none">Step 1</h3>
											<section>
												<div class="row">
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold ">Client First Name</label>
															<input class="form-control" name="first_name" id="first_name" required="" type="text">
															<div id="first_name_error" class="text-danger"></div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold ">Client Last Name</label>
															<input class="form-control" name="last_name" id="last_name" required="" type="text" >
															<div id="last_name_error" class="text-danger"></div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold ">Email Address</label>
															<input class="form-control" name="email" id="email" required="" type="email">
															<div id="email_error" class="text-danger"></div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold ">Phone</label>
															<input class="form-control" name="phone" id="phone" required="" type="text">
															<div id="phone_error" class="text-danger"></div>
														</div>
													</div>
												</div>
											</section>

											<h3>Step 2</h3>
											<section>
											<div class="row">
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold ">Business Name</label>
															<input class="form-control" name="business_name" id="business_name" required="" type="text">
															<div id="business_name_error" class="text-danger"></div>
														</div>
													</div>													
													<div class="col-md-6">
														<div class="form-group">
														<label class="tx-gray-600 font-weight-bold ">Business Type</label>
														<select name="business_type" id="business_type" class="form-control select">
															<option value="">select</option>
															<?php if($type): foreach($type as $value): ?>
																<option value="<?= $value->id; ?>"><?= $value->business_type; ?></option>
															<?php endforeach; endif; ?>
														</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold ">Address</label>
															<input class="form-control" name="address"  id="address" required="" type="text">
															<div id="address_error" class="text-danger"></div>
														</div>
													</div>													
													<div class="col-md-6">
														<div class="form-group">
														<label class="tx-gray-600 font-weight-bold ">Country </label>
														<select name="country"  id="country" class="form-control select" onchange="getActiveSateById(this.value);">
															<option value="">Select</option>
															<?php if($country): foreach($country as $value): ?>
																<option value="<?= $value->id; ?>"><?= $value->country_name; ?></option>
															<?php endforeach; endif; ?>
														</select>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold ">State</label>
															<select name="state" class="form-control select" id="state" onchange="getActiveCityById(this.value);">																
															</select>
														</div>
													</div>	
													<div class="col-md-3">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold">City</label>
															<select name="city" id="city" class="form-control select" onchange="getActiveLocalityById(this.value);">
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold">Locality</label>
															<select name="locality" id="locality" class="form-control select" onchange="getActivePincodeById(this.value);">
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold ">Pin Code</label>															
															<select name="pin_code" id="pin_code" class="form-control select">
															</select>
														</div>
													</div>
												</div>
											</section>
											<h3>Step 3</h3>
											<section>
												<div class="row">
												<div class="col-md-6">
														<div class="form-group">
															<label class="tx-gray-600 font-weight-bold ">Website Domain</label>
															<input class="form-control" name="website_domain" id="website_domain" type="text" >
															<div id="website_domain_error" class="text-danger"></div>
														</div>
													</div>
												</div>
											</section>
										</div>

										</form>
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
	
		<script src="<?php echo base_url('assets/js/mycustomscripts.js')?>"></script>	


	</body>
</html>
