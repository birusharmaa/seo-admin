

		<script src="<?=base_url();?>/assets/plugins/jquery/jquery.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/select2/js/select2.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/sidemenu/sidemenu.js"></script>
		<script src="<?=base_url();?>/assets/plugins/sidebar/sidebar.js"></script>
		<script src="<?=base_url();?>/assets/js/perfect-scrollbar.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/jquery-steps/jquery.steps.min.js"></script>
		<!-- <script src="<?=base_url();?>/assets/js/form-wizard.js"></script> -->
		<script src="<?=base_url();?>/assets/js/jquery.accordion-wizard.min.js"></script>
		<!-- <script src="<?=base_url();?>/assets/plugins/datatable/dataTables.responsive.min.js"></script> -->
		<script src="<?=base_url();?>/assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/chart.js/Chart.bundle.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/peity/jquery.peity.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/validation/js/jquery.validate.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/raphael/raphael.min.js"></script>
		<script src="<?=base_url();?>/assets/plugins/morris.js/morris.min.js"></script>
		<script src="<?=base_url();?>/assets/js/circle-progress.min.js"></script>
		<!-- <script src="<?=base_url();?>/assets/js/chart-circle.js"></script> -->
		<!-- <script src="<?=base_url();?>/assets/js/index.js"></script> -->
		<script src="<?=base_url();?>/assets/js/sticky.js"></script>
		<script src="<?=base_url();?>/assets/js/custom.js"></script>
		<script src="<?=base_url();?>/assets/js/myScript.js"></script>
		<script src="<?php echo base_url('assets/notify/dist/notiflix-3.2.4.min.js')?>"></script>
		<!-- <script src="<?=base_url();?>//assets/switcher/js/switcher.js"></script> -->

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