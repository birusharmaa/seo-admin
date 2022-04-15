<?php $session = \Config\Services::session()?>

<?= $this->extend('template/main'); ?>
<?= $this->section('content');?>
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">
				Account Settings
			</h2>
			<ol class="breadcrumb mt-4">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">
					Settings
				</li>
			</ol>
		</div>
	</div>

    <div class="tab-content">
		<!-- Panel 1 -->
		<div class="tab-pane fade in show active" id="panel555" role="tabpanel">
			<!-- Nav tabs -->
			<div class="row mb-5 pt-3">
				<div class="col-md-3">
					<ul class="nav md-pills pills-primary flex-column" role="tablist">
						<li class="nav-item">
							<a class="nav-link tab active font-weight-bold side-links" data-toggle="tab" href="#panel21" role="tab">General

							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link tab font-weight-bold side-links" data-toggle="tab" href="#panel22" role="tab">Change Password

							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link tab font-weight-bold side-links" data-toggle="tab" href="#panel23" role="tab">Company Info

							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link tab font-weight-bold side-links" data-toggle="tab" href="#panel24" role="tab">Social Links

							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-9 m-auto box-shadow">
					<!-- Tab panels -->
					<div class="tab-content vertical p-3">
						<!-- Panel 1 -->
						<div class="tab-pane fade in show active" id="panel21" role="tabpanel">
							<input type="hidden" name="user_id" id="user_id" value="<?php echo  $userInfo->id; ?>">
							<input type="hidden" name="url" id="url" value="<?php echo base_url(); ?>">
							<form class="form-horizontal" id="GeneralForm">
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Partner Name</label>
										<input type="text" class="form-control" name="user_name" id="name" value="<?= $userInfo->user_name; ?>" placeholder="Enter Partner Name">
									</div>
								</div>
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Email</label>
										<input type="email" class="form-control" name="user_email" id="email" value="<?= $userInfo->user_email; ?>" placeholder="Enter Email">
									</div>
								</div>
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Phone No.</label>
										<input type="text" class="form-control" name="user_phone" id="phone" value="<?= $userInfo->user_phone; ?>" placeholder="Enter phone">
									</div>
								</div>
								<div class="form-group">
									<div class="mb-3">
										<div class="row">
											<div class="col-md-9">
												<label class="form-label font-weight-bold">Business Logo</label>
												<input type="file" class="form-control" accept="image/*" name="company_logo" id="logo" value="<?= isset($userInfo->company_logo) ? $userInfo->company_logo : '' ?>">
												<input type="hidden" name="site_logo" id="site_logo" value="<?= isset($userInfo->company_logo) ? $userInfo->company_logo : '' ?>">
											</div>
											<div class="col-md-3">
												<?php if (isset($userInfo->company_logo)) { ?>
													<img src="<?php echo base_url() . $userInfo->company_logo   ?>" alt="">
												<?php } else { ?>
													<img src="<?= base_url(); ?>/assets/img/users/comapny.jpg" alt="">
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
						<!-- Panel 1 -->
						<!-- Panel 2 -->
						<div class="tab-pane fade" id="panel22" role="tabpanel">
							<form class="form-horizontal" id="changePassForm">
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">New Password</label>
										<input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
									</div>
								</div>
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Retype New Password</label>
										<input type="password" class="form-control" name="confpassword" id="confpassword" placeholder="Enter Password">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Change Password</button>
								</div>
							</form>
						</div>
						<!-- Panel 2 -->
						<!-- Panel 3 -->
						<div class="tab-pane fade" id="panel23" role="tabpanel">
							<form class="form-horizontal" id="ComponyInfoForm">
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Company Name</label>
										<input type="text" class="form-control" name="company_name" id="name" value="<?= $userInfo->company_name; ?>" placeholder="Enter Company Name">
									</div>
								</div>
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Company Profile</label>
										<textarea class="form-control" name="company_profile" placeholder="Your business description data here...." rows="3"><?= $userInfo->company_profile; ?></textarea>
									</div>
								</div>
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Company Address</label>
										<input type="text" class="form-control" name="company_address" value="<?= $userInfo->company_address; ?>" placeholder="Type your complete Company address with pincode ">
									</div>
								</div>
								<div class="form-group ">
									<label class="form-label font-weight-bold">Phone No.</label>
									<input type="text" class="form-control" name="company_phone_no" id="phone" placeholder="phone" value="<?= $userInfo->company_phone_no; ?>" value="+ 3887322223">
								</div>
								<div class="form-group ">
									<label class="form-label font-weight-bold">Website URL</label>
									<input type="text" class="form-control" name="website_URL" value="<?= $userInfo->website_URL; ?>" placeholder="autoseoplugin.com">
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
						<!-- Panel 3 -->
						<!-- Panel 4 -->
						<div class="tab-pane fade" id="panel24" role="tabpanel">
							<form class="form-horizontal" id="SocialLinkForm">
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Facebook</label>
										<input type="text" class="form-control" name="facebook_link" value="<?= $userInfo->facebook_link; ?>" placeholder="Add Facebook Link">
									</div>
								</div>
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Twitter</label>
										<input type="email" class="form-control" name="twitter_link" value="<?= $userInfo->twitter_link; ?>" placeholder="Add Twitter Link">
									</div>
								</div>
								<div class="form-group ">
									<div class="mb-3">
										<label class="form-label font-weight-bold">Google Plus</label>
										<input type="text" class="form-control" name="google_plus" value="<?= $userInfo->google_plus; ?>" placeholder="Add Google Plus Link">
									</div>
								</div>
								<div class="form-group ">
									<label class="form-label font-weight-bold">LinkedIn</label>
									<input type="text" class="form-control" placeholder="Add LinkedIn Link" name="linkedIn" value="<?= $userInfo->linkedIn; ?>">
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
			<!-- Nav tabs -->

		</div>
	</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
	<script src="<?php echo base_url('assets/js/mycustomscripts.js') ?>"></script>
<?= $this->endSection(); ?>