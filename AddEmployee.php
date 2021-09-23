<?php 

	if(isset($_POST["submit"])){
	  @$postData = array(
		  'name' => $_POST['name'],
		  'surname'  => $_POST['surname'],
			'gender' => $_POST['gender'],
			'dateOfBirth' => $_POST['dateOfBirth'],
		  'employeeCode'    => $_POST['employeeCode'],
		  'mobileNumber' => $_POST['mobileNumber'],
			'emailAddress' => $_POST['emailAddress'],
			'address1' => $_POST['address1'],
		  'residentialStatus' => $_POST['residentialStatus']
		);

		$userID = '';
		$employeeStatusID = '';
		$jobTitleID = '';
		$handle = curl_init();
		 
		curl_setopt_array($handle,
		  array(
		     CURLOPT_URL => 'https://employee-tracker-apii.herokuapp.com/api/v1/employees/add/' . $userID . '/' . $employeeStatusID . '/' . $jobTitleID,
		     // Enable the post response.
		    CURLOPT_POST       => true,
		    // The data to transfer with the response.
		    CURLOPT_POSTFIELDS => $postData,
		    CURLOPT_RETURNTRANSFER     => true,
		  )
		);
		 
		$response = curl_exec($handle);
		 
		curl_close($handle);
		 
		if ($response !== false){
			$success = 'Employee successfully added';
		}
		else $error = "Whoops! an error occurred";
	}

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
								<h6 class="card-title">Add New Employee</h6>
								<?php
									if(isset($error)){
										echo '<p class="alert alert-danger">' . $error . '</p><br>';
									}
									elseif(isset($success)){
										echo '<p class="alert alert-success">' . $success . '</p><br>';
									}
								?>
								<form class="forms-sample" action="" method="post">
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Name" name="name">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">surname</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Surname" name="surname">
										</div>
						
									</div>

									<div class="form-group row">
									<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Date Of Birth</label>
										<div class="col-sm-9">
											<input type="date" class="form-control" id="dateOfBirth" autocomplete="off" placeholder="YY-MM-DD" name="dateOfBirth">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Gender</label>
										<div class="col-sm-9">
											<select name="gender">
     							 <option value="MALE">MALE</option>
   								 <option value="FEMALE">FEMALE</option>
  									</select>
										</div>
										</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">EmployeeCode</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="EmployeeCode" name="employeeCode">
										</div>								
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile Number</label>
										<div class="col-sm-9">
											<input type="tel" class="form-control" id="exampleInputMobile" placeholder="+2637********" name="mobileNumber">
										</div>
									</div>
						<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Email Address</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="exampleInputMobile" placeholder="example@example.com" name="emailAddress">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Physical Address</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputMobile" placeholder="physical address" name="address1">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputResidentialStatus" class="col-sm-3 col-form-label">Residential Status</label>
										<div class="col-sm-9">
											<select name="Residential Status" name="residentialStatus">
     							 <option value="PERMANENT">PERMANENT</option>
   								 <option value="MORTGAGE">MORTGAGE</option>
									<option value="RENTAL">RENTAL</option>
  									</select>
										</div>
									</div>
									<button type="submit" name="submit" class="btn btn-primary mr-2" onclick="location.href = '/tracker/employees.php';">Add</button>
									<button type="reset" name ="discard"  class="btn btn-light" onclick="location.href = '/tracker/employees.php';">Discard</button>
								</form>
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