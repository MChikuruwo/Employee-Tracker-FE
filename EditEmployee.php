<?php 
	$id = $_GET['id'];
	if (empty($id) || is_null($id))header("location:../employees.php");

	$url = "https://employee-tracker-apii.herokuapp.com/api/v1/employees/by-user/" . $id;  
  $ch = curl_init();   
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
  curl_setopt($ch, CURLOPT_URL, $url);   
  $response = curl_exec($ch);  
  curl_close($ch);

  if (!$response)die("<h3>Employee not found!</h3>");
  $response = json_decode($response);


	if(isset($_POST["submit"])){
	  @$postData = array(
	  	'_method' => 'PUT',
		  'name' => $_POST['name'],
		  'surname'  => $_POST['surname'],
		  'employeeCode'    => $_POST['employeeCode'],
		  'gender' => $_POST['gender'],
		  'mobileNumber' => $_POST['mobileNumber'],
		  'residentialStatus' => $_POST['residentialStatus']
		);

		$userID = '';
		$employeeStatusID = '';
		$jobTitleID = '';
		$handle = curl_init();
		 
		curl_setopt_array($handle,
		  array(
		     CURLOPT_URL => 'https://employee-tracker-apii.herokuapp.com/api/v1/employees/edit/' . $id,
		     // Enable the post response.
		    CURLOPT_POST       => true,
		    // The data to transfer with the response.
		    CURLOPT_POSTFIELDS => $postData,
		    CURLOPT_RETURNTRANSFER     => true,
		  )
		);
		 
		$res = curl_exec($handle);
		 
		curl_close($handle);
		 
		if ($res !== false){
			$success = 'Employee successfully Edited';
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
								<h6 class="card-title">Edit Employee</h6>
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
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Name" name="name" value="<?php echo $response->name ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">surname</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Surname" name="surname"  value="<?php echo $response->surname ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">EmployeeCode</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off" name="employeeCode" placeholder="EmployeeCode"  value="<?php echo $response->employeeCode ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Gender</label>
										<div class="col-sm-9">
											<select name="gender">
     							 <option value="MALE" <?php if (strtoupper($response->gender)=="MALE") echo " selected" ?>>MALE</option>
   								 <option value="FEMALE" <?php if (strtoupper($response->gender)=="FEMALE") echo " selected" ?>>FEMALE</option>
  									</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile Number</label>
										<div class="col-sm-9">
											<input type="number" class="form-control" id="exampleInputMobile" placeholder="Mobile number" name="mobileNumber" value="<?php echo $response->mobileNumber ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputResidentialStatus" class="col-sm-3 col-form-label">Residential Status</label>
										<div class="col-sm-9">
											<select name="residentialStatus">
     							 <option value="PERMANENT" <?php if (strtoupper($response->residentialStatus)=="PERMANENT") echo " selected" ?>>PERMANENT</option>
   								 <option value="MORTGAGE" <?php if (strtoupper($response->residentialStatus)=="MORTGAGE") echo " selected" ?>>MORTGAGE</option>
									<option value="RENTAL" <?php if (strtoupper($response->residentialStatus)=="RENTAL") echo " selected" ?>>RENTAL</option>
  									</select>
										</div>
									</div>
									<button type="submit" name="submit" class="btn btn-primary mr-2">Add</button>
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