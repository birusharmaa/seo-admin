		<?php    $session = \Config\Services::session();
        $this->session = $session;		
		if($this->session->has('login_user')){
            $user_data = $this->session->get('login_user');
        }?>
		<link
			href="<?=base_url();?>/assets/plugins/bootstrap/css/bootstrap.min.css"
			rel="stylesheet"
		/>
		<link href="<?=base_url();?>/assets/plugins/web-fonts/icons.css" rel="stylesheet" />
		<link
			href="<?=base_url();?>/assets/plugins/web-fonts/font-awesome/font-awesome.min.css"
			rel="stylesheet"
		/>
		<link href="<?=base_url();?>/assets/plugins/web-fonts/plugin.css" rel="stylesheet" />

		<link href="<?=base_url();?>/assets/css/style/style.css" rel="stylesheet" />
		<link href="<?=base_url();?>/assets/css/skins.css" rel="stylesheet" />

		<link href="<?=base_url();?>/assets/css/colors/default.css" rel="stylesheet" />
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?=base_url();?>/assets/css/colors/color1.css"/>		

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url();?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
		<link
			rel="stylesheet"
			href="<?=base_url();?>/assets/plugins/multipleselect/multiple-select.css"
		/>
		<link href="<?=base_url();?>/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<!-- <link href="<?= base_url();?>//assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" /> -->

		<!-- <link href="<?=base_url();?>/assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" /> -->
		<link href="<?=base_url();?>/assets/css/sidemenu/sidemenu.css" rel="stylesheet" />
		<link href="<?=base_url();?>/assets/switcher/css/switcher.css" rel="stylesheet" />
		<link href="<?=base_url();?>/assets/switcher/demo.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url('assets/notify/dist/notiflix-3.2.4.min.css')?>">
	