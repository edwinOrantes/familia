	<input type="hidden" value="<?php echo base_url(); ?>" id="raizAdorno"/>
</main>
<!-- MODALS -->
<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog ms-modal-dialog-width">
		<div class="modal-content ms-modal-content-width">
			<div class="modal-header  ms-modal-header-radius-0">
				<h4 class="modal-title text-white">Make An Appointment</h4>
				<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">x</button>

			</div>
			<div class="modal-body p-0 text-left">
				<div class="col-xl-12 col-md-12">
					<div class="ms-panel ms-panel-bshadow-none">
						<div class="ms-panel-header">
							<h6>Patient Information</h6>
						</div>
						<div class="ms-panel-body">
							<form class="needs-validation" novalidate>
								<div class="form-row">
									<div class="col-md-4 mb-3">
										<label for="validationCustom01">Patient Name</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom01" placeholder="Enter Name" required>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom02">Date Of Birth</label>
										<div class="input-group">
											<input type="number" class="form-control" id="validationCustom02" required>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom03">Disease</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom03" placeholder="Disease" required>

										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-4 mb-2">
										<label for="validationCustom04">Address</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom04" placeholder="Add Address" required>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom05">Phone no.</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom05" placeholder="Enter Phone No." required>

										</div>

									</div>

									<div class="col-md-4 mb-3">
										<label for="validationCustom06">Department Name</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom06" placeholder="Enter Department Name" required>

										</div>
									</div>
								</div>



								<div class="form-row">
									<div class="col-md-4 mb-3">
										<label for="validationCustom07">Appointment With</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom07" placeholder="Enter Doctor Name" required>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom08">Appointment Date</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom08" placeholder="Enter Appointment Date" required>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label>Sex</label>
										<ul class="ms-list d-flex">
											<li class="ms-list-item pl-0">
												<label class="ms-checkbox-wrap">
                            <input type="radio" name="radioExample" value="">
                            <i class="ms-checkbox-check"></i>
                          </label>
												<span> Male </span>
											</li>
											<li class="ms-list-item">
												<label class="ms-checkbox-wrap">
                            <input type="radio" name="radioExample" value="" checked="">
                            <i class="ms-checkbox-check"></i>
                          </label>
												<span> Female </span>
											</li>
										</ul>
									</div>
								</div>
								<button class="btn btn-warning mt-4 d-inline w-20" type="submit">Reset</button>
								<button class="btn btn-primary mt-4 d-inline w-20" type="submit">Add Appointment</button>
							</form>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="prescription" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog ms-modal-dialog-width">
		<div class="modal-content ms-modal-content-width">
			<div class="modal-header  ms-modal-header-radius-0">
				<h4 class="modal-title text-white">Make a prescription</h4>
				<button type="button" class="close  text-white" data-dismiss="modal" aria-hidden="true">x</button>

			</div>
			<div class="modal-body p-0 text-left">
				<div class="col-xl-12 col-md-12">
					<div class="ms-panel ms-panel-bshadow-none">
						<div class="ms-panel-header">
							<h6>Patient Information</h6>
						</div>
						<div class="ms-panel-body">
							<form class="needs-validation" novalidate>
								<div class="form-row">
									<div class="col-md-4 mb-3">
										<label for="validationCustom09">Patient Name</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom09" placeholder="Enter Name" required>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom10">Date Of Birth</label>
										<div class="input-group">
											<input type="number" class="form-control" id="validationCustom10" required>

										</div>
									</div>
									<div class="col-md-4 mb-2">
										<label for="validationCustom11">Address</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom11" placeholder="Add Address" required>

										</div>
									</div>

								</div>
								<div class="form-row">
									<div class="col-md-4 mb-3">
										<label for="validationCustom12">Phone no.</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom12" placeholder="Enter Phone No." required>

										</div>

									</div>

									<div class="col-md-4 mb-3">
										<label for="validationCustom13">Medication</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom13" placeholder="Acetaminophen" required>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom14">Period Of medication</label>
										<div class="input-group">
											<input type="number" class="form-control" id="validationCustom14" placeholder="" required>

										</div>
									</div>
								</div>



								<div class="form-row">

									<div class="col-md-4 mb-3">
										<label for="validationCustom15">Appointment With</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom15" placeholder="Enter Doctor Name" required>

										</div>
									</div>

								</div>
								<button class="btn btn-warning mt-4 d-inline w-20" type="submit">Save Prescription</button>
								<button class="btn btn-primary mt-4 d-inline w-20" type="submit">Save & Print</button>
							</form>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="report1" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog ms-modal-dialog-width">
		<div class="modal-content ms-modal-content-width">
			<div class="modal-header  ms-modal-header-radius-0">
				<h4 class="modal-title text-white">Generate report</h4>
				<button type="button" class="close  text-white" data-dismiss="modal" aria-hidden="true">x</button>

			</div>
			<div class="modal-body p-0 text-left">
				<div class="col-xl-12 col-md-12">
					<div class="ms-panel ms-panel-bshadow-none">
						<div class="ms-panel-header">
							<h6>Patient Information</h6>
						</div>
						<div class="ms-panel-body">
							<form class="needs-validation" novalidate>
								<div class="form-row">
									<div class="col-md-4 mb-3">
										<label for="validationCustom16">Patient Name</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom16" placeholder="Enter Name" required>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom17">Date Of Birth</label>
										<div class="input-group">
											<input type="number" class="form-control" id="validationCustom17" required>

										</div>
									</div>
									<div class="col-md-4 mb-2">
										<label for="validationCustom22">Address</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom22" placeholder="Add Address" required>

										</div>
									</div>

								</div>
								<div class="form-row">
									<div class="col-md-4 mb-3">
										<label for="validationCustom18">Phone no.</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom18" placeholder="Enter Phone No." required>

										</div>

									</div>

									<div class="col-md-4 mb-3">
										<label for="validationCustom19">Report Type</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom19" placeholder="Diseases Report" required>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom23">Report Period</label>
										<div class="input-group">
											<input type="number" class="form-control" id="validationCustom23" placeholder="" required>

										</div>
									</div>
								</div>



								<div class="form-row">

									<div class="col-md-4 mb-3">
										<label for="validationCustom20">Appointment With</label>
										<div class="input-group">
											<input type="text" class="form-control" id="validationCustom20" placeholder="Enter Doctor Name" required>

										</div>
									</div>

								</div>
								<button class="btn btn-warning mt-4 d-inline w-20" type="submit">Generate Report</button>
								<button class="btn btn-primary mt-4 d-inline w-20" type="submit">Generate & Print</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	$conn = mysqli_connect("localhost", "root", "", "db_centro_medico");
	// $conn = mysqli_connect("192.168.1.253", "admin", "admin1234", "db_hospital_orellana");
	if (!$conn){die("Connection failed: " . mysqli_connect_error());}
	else{
		$hoy = date("Y-m-d");
		mysqli_query($conn, "SET CHARACTER SET 'utf8'");
		$acceso = $this->session->userdata("acceso_h");
		$consulta = "SELECT * FROM tbl_animations WHERE DATE(fechaAnimation) = '$hoy' ";
		$datos =  mysqli_query( $conn, $consulta);  
		$a = base_url();
		while($item = mysqli_fetch_array($datos)){
			echo '<input type="text" id="estadoAnimation" value="'.$item["estadoAnimation"].'"> <br>';
			echo '<input type="text" id="linkAnimation" value="'.base_url()."public/img/adornos/".$item["linkAnimation"].".png".'"> <br>';
			echo '<input type="text" id="fechaAnimation" value="'.$item["fechaAnimation"].'"> <br>';
			echo '<input type="text" id="hoy" value="'.date("Y-m-d").'"> <br>';
		}
	}
	mysqli_close($conn);
?>
 <!-- scripts -->
	<!-- Global Required Scripts Start -->
	<script src="<?php echo base_url(); ?>public/tema/assets/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>public/tema/assets/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>public/tema/assets/js/perfect-scrollbar.js"></script>
	<script src="<?php echo base_url(); ?>public/tema/assets/js/jquery-ui.min.js"></script>
	
	
	<!-- Global Required Scripts End -->
	<script src="<?php echo base_url(); ?>public/tema/assets/js/d3.v3.min.js"></script>
	<script src="<?php echo base_url(); ?>public/tema/assets/js/topojson.v1.min.js"></script>
	<script src="<?php echo base_url(); ?>public/tema/assets/js/datamaps.all.min.js"></script>
	<!-- Page Specific Scripts Start -->
	
	
	<!-- Page Specific Scripts Start -->
	<script src="<?php echo base_url(); ?>public/tema/assets/js/datatables.min.js"> </script>
	<script src="<?php echo base_url(); ?>public/tema/assets/js/data-tables.js"> </script>
	
	<!-- Page Specific Scripts Finish -->
	<!-- <script src="<?php echo base_url(); ?>public/tema/assets/js/calendar.js"></script>-->
	<!-- medjestic core JavaScript -->
	<script src="<?php echo base_url(); ?>public/tema/assets/js/framework.js"></script>
	<!-- Settings -->
	<script src="<?php echo base_url(); ?>public/tema/assets/js/settings.js"></script>
	<script src="<?php echo base_url(); ?>public/js/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>public/js/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url(); ?>public/js/timepicker/jquery.timepicker.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url(); ?>public/tema/assets/js/toastr.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>public/tema/assets/js/toast.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>public/js/fullcalendar/lib/main.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>public/js/fullcalendar/lib/locales-all.js" type="text/javascript"></script>

	<script src="<?php echo base_url(); ?>public/js/funciones.js"></script>

	

	<!-- Dashboard -->
	<script src="<?php echo base_url(); ?>public/tema/assets/js/dashboard.js"> </script>		

	<!-- Procesos para sumas en datatable -->
	<script src="<?php echo base_url(); ?>public/js/sum().js"> </script>

	<!-- Procesos para nieve -->
<!-- fin scripts -->

<script>
	// Obteniendo pivotes
	estadoAnimation = $("#estadoAnimation").val();
	linkAnimation = $("#linkAnimation").val();
	fechaAnimation = $("#fechaAnimation").val();
	hoy = $("#hoy").val();
	if(estadoAnimation == 1 && fechaAnimation == hoy){
		// Fin pivotes
		var raiz = document.getElementById('raizAdorno').value;
		if (!image_urls) {
			var image_urls = Array()
		}
		if (!flash_urls) {
			var flash_urls = Array()
		}
		image_urls['corazon'] = linkAnimation ;
		//image_urls['corazon'] = raiz+"public/img/adornos/heart.png";
		//image_urls['corazon'] = "https://cdn-icons-png.flaticon.com/512/833/833472.png";
		$(document).ready(function() {
			var c = $(window).width();
			var d = $(window).height();
			var e = function(a, b) {
				return Math.round(a + (Math.random() * (b - a)))
			};
			var f = function(a) {
				setTimeout(function() {
					a.css({
						left: e(0, c) + 'px',
						top: '-30px',
						display: 'block',
						opacity: '0.' + e(10, 100)
					}).animate({
						top: (d - 10) + 'px'
					}, e(8500, 10000), function() {
						$(this).fadeOut('slow', function() {
							f(a)
						})
					})
				}, e(1, 9000))
			};
			$('<div></div>').attr('id', 'corazonDiv').css({
				position: 'fixed',
				width: (c - 20) + 'px',
				height: '1px',
				left: '0px',
				top: '-5px',
				display: 'block'
			}).appendTo('body');
			for (var i = 1; i <= 15; i++) {
				var g = $('<img/>').attr('src', image_urls['corazon']).css({
					position: 'absolute',
					width: '25px',
					height: '25px',
					left: e(0, c) + 'px',
					top: '-30px',
					display: 'block',
					opacity: '0.' + e(10, 100),
					'margin-left': 0
				}).addClass('corazonDrop').appendTo('#corazonDiv');
				f(g);
				g = null
			};
			var h = 0;
			var j = 0;
			$(window).resize(function() {
				c = $(window).width();
				d = $(window).height()
			})
		});
	}
</script>
</body>
</html>