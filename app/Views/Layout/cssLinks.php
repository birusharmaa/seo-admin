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
<link rel="stylesheet" href="<?php echo base_url('assets/notify/dist/notiflix-3.2.4.min.css')?>">

