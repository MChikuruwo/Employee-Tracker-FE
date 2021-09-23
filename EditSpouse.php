<?php 
  include('includes/head.php')
?> 
	<div class="main-wrapper">

			<!-- partial:partials/_sidebar.html -->
			<?php 
      include('partials/_sidebar.html')
    ?> 
		<!-- partial -->
	
		<div class="page-wrapper">
					
        <?php 
            include('partials/_topnav.html')
        ?> 

<div class="page-content">

					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Edit Spouse</h6>
								<form class="forms-sample">
                <div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Id</label>
										<div class="col-sm-9">
											<input type="number" class="form-control" id="exampleInputMobile" placeholder="id">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">First Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputMobile" placeholder="First Name">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Surname</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputPassword2" autocomplete="off" placeholder="Surname">
										</div>
									</div>
                  <div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">National_Id_Number</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="NationalIdNumber">
										</div>
									</div>
                  <div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email Address</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="exampleInputUsername2" placeholder="Email Address" required>
										</div>
									</div>
                  </div>	
                  <div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Mobile Number</label>
										<div class="col-sm-9">
											<input type="tel" class="form-control" id="exampleInputUsername2" placeholder="Mobile Number" required>
										</div>
									</div>
                  <div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Employer</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Employer" >
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Employer Address</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Employer Address">
										</div>
								
									<button type="submit" class="btn btn-primary mr-2">Add</button>
									<button class="btn btn-light">Discard</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © 2021 <a href="https://www.aemaps.co.zw" target="_blank">Employee Tracker</a>. All rights reserved</p>
				<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="assets/vendors/chartjs/Chart.min.js"></script>
  <script src="assets/vendors/jquery.flot/jquery.flot.js"></script>
  <script src="assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
  <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/datepicker.js"></script>
	<!-- end custom js for this page -->
</body>
</html>    