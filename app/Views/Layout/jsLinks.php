

		<script src="<?=base_url();?>/assets/plugins/jquery/jquery.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/validation/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url('assets/notify/dist/notiflix-3.2.4.min.js')?>"></script>

	
		<script>
			function updateTheme(value){
				const BASEURL = $('#url').val();				
				$.ajax({
					url: BASEURL + '/update-theme/'+value,
					type: 'POST',
					success: function (data) {						
					}
				});
			}
		</script>