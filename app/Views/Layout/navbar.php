<?php $session = \Config\Services::session()?>
<div class="main-header side-header sticky">
	<div class="container-fluid">
		<div class="main-header-left">
			<a class="main-header-menu-icon" href="#" id="mainSidebarToggle"
				><span></span
			></a>
		</div>
		<div class="main-header-center">
			<div class="responsive-logo">
				<a class="main-logo text-white" href="#"> SEO </a>
			</div>
		
		</div>
		<div class="main-header-right">
			<div class="dropdown d-md-flex">
				<a class="nav-link icon full-screen-link" href="#">
					<i
						class="fe fe-maximize fullscreen-button fullscreen header-icons"
					></i>
					<i
						class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"
					></i>
				</a>
			</div>
			<div class="dropdown main-header-notification">
				<a class="nav-link icon" href="#">
					<i class="fe fe-bell header-icons"></i>
					<span class="badge badge-danger nav-link-badge">4</span>
				</a>
				<div class="dropdown-menu">
					<div class="header-navheading">
						<p class="main-notification-text">
							You have 1 unread notification<span
								class="badge badge-pill badge-primary ml-3"
								>View all</span
							>
						</p>
					</div>
					<div class="main-notification-list">
						<div class="media new">
							<div class="main-img-user online">
								<img alt="avatar" src="assets/img/users/5.jpg" />
							</div>
							<div class="media-body">
								<p>
									Congratulate <strong>Olivia James</strong> for New
									template start
								</p>
								<span>Oct 15 12:32pm</span>
							</div>
						</div>
						<div class="media">
							<div class="main-img-user">
								<img alt="avatar" src="assets/img/users/2.jpg" />
							</div>
							<div class="media-body">
								<p><strong>Joshua Gray</strong> New Message Received</p>
								<span>Oct 13 02:56am</span>
							</div>
						</div>
						<div class="media">
							<div class="main-img-user online">
								<img alt="avatar" src="assets/img/users/3.jpg" />
							</div>
							<div class="media-body">
								<p>
									<strong>Elizabeth Lewis</strong> added new schedule
									realease
								</p>
								<span>Oct 12 10:40pm</span>
							</div>
						</div>
					</div>
					<div class="dropdown-footer">
						<a href="#">View All Notifications</a>
					</div>
				</div>
			</div>
			<?php 
			if($session->has('login_user')){
				$user_data = $session->get('login_user');
				$status = "Online";
			}
			?>
			<div class="main-header-notification">
				<a class="nav-link icon" href="#">
					<i class="fe fe-message-square header-icons"></i>
					<span class="badge badge-success nav-link-badge">6</span>
				</a>
			</div>
			<div class="dropdown main-profile-menu">
				<a class="d-flex" href="#">
					<span class="main-img-user">
						<?php if($user_data['company_logo'] ){ ?>
							<img alt="avatar" class="logo-images" src="<?php echo base_url().'/assets/img/logo/'.$user_data['company_logo'] ?>"/>
						<?php }else{ ?>
							<img alt="avatar" class="logo-images" src="assets/img/users/1.jpg"/>
						<?php }?>	
					</span>
				</a>
				
				<div class="dropdown-menu">
					<div class="header-navheading">
						<h6 class="main-notification-title"><?php echo $user_data['user_name']; ?></h6>
						<p class="main-notification-text text-success"><?php echo $status; ?></p>
					</div>
				
					<a class="dropdown-item border-top" href="<?=base_url();?>/profile">
						<i class="fe fe-user"></i> My Profile
					</a>
					<a class="dropdown-item" href="<?php echo base_url('sign-out')?>">
						<i class="fe fe-power"></i> Sign Out
					</a>
					<div class="swichermainleft my-4">
						<h5 class="text-center">Change Theme Color</h5>
						<div class="themeVarients">
							<a data-themeColor="red" class="theme-red changeThemeBtn" href="#" onclick="updateTheme('red');"></a>
							<a data-themeColor="primary" class="theme-primary changeThemeBtn" href="#" onclick="updateTheme('primary');" ></a>
							<a data-themeColor="green" class="theme-green changeThemeBtn" href="#" onclick="updateTheme('green');" ></a>
							<a data-themeColor="blue" class="theme-blue changeThemeBtn" href="#" onclick="updateTheme('blue');" ></a>
							<a data-themeColor="purple" class="theme-purple changeThemeBtn" href="#" onclick="updateTheme('purple');" ></a>
						</div>
						<!-- <a
							class="wscolorcode red-btn color blackborder color1"
							href="#"
							data-theme="assets/css/colors/color1.css"
						></a>
						<a
							class="wscolorcode purple-btn color blackborder color2"
							href="#"
							data-theme="assets/css/colors/color2.css"
						></a>
						<a
							class="wscolorcode green-btn color blackborder color3"
							href="#"
							data-theme="assets/css/colors/color3.css"
						></a>
						<a
							class="wscolorcode pink-btn color blackborder color4"
							href="#"
							data-theme="assets/css/colors/color4.css"
						></a>
						<a
							class="wscolorcode orange-btn color blackborder color5"
							href="#"
							data-theme="assets/css/colors/color5.css"
						></a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>