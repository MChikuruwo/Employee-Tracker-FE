<?php 

  if(isset($_POST["deleteID"])){
    @$postData = array(
      '_method' => "DELETE"
    );

    $userID = '';
    $employeeStatusID = '';
    $jobTitleID = '';
    $handle = curl_init();
     
    curl_setopt_array($handle,
      array(
         CURLOPT_URL => 'https://employee-tracker-apii.herokuapp.com/api/v1/employees/delete/' . $_POST['deleteID'],
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
      $success = 'Employee successfully deleted';
    }
    else $error = "Whoops! an error occurred";
  }

  $url = "https://employee-tracker-apii.herokuapp.com/api/v1/employees/"; 
  $ch = curl_init();   
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
  curl_setopt($ch, CURLOPT_URL, $url);   
  $response = curl_exec($ch);  
  curl_close($ch);
  include('includes/head.php');
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

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-11">
                        <h6 class="card-title">Employees</h6>
                      </div>
                      <div class="col-sm-1">
                      <a href="/tracker/AddEmployee.php" class="nav-link" style="float:right">
              <i class="link-icon" data-feather="user-plus"></i>
              <span class="link-title">Add</span>
            </a>
</div></div>
            <?php
                          if($response === false){
                            echo '</tbody></thead><p class="alert alert-danger">An error occurred!</p><br>';
                          }
                          elseif (empty($response)){
                              echo '</tbody></thead><br><br<br><h3 class="text-center text-muted">No employees!</h3><br><br<br>';
                          }
                          else{
                            if(isset($error)){
                              echo '<p class="alert alert-danger">' . $error . '</p><br>';
                            }
                            elseif(isset($success)){
                              echo '<p class="alert alert-success">' . $success . '</p><br>';
                            }
            ?>


                        <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                      <th>EmpCode</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>D.O.B</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>E-mail</th>
                        <th>Res_Status</th>
                        <th>Emp_Status</th>
                        <th>Job_Title</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        <?php
                            foreach (json_decode($response) as $record){
                              echo '<tr><td>'.$record->employeeCode.'</td>
                              <td>'.$record->name.'</td>
                              <td>'.$record->surname.'</td>
                              <td>'.$record->dateOfBirth.'</td>
                              <td>'.$record->gender.'</td>
                              <td>'.$record->mobileNumber.'</td>
                              <td>'.$record->emailAddress.'</td>
                              <td>'.$record->residentialStatus.'</td>
                              <td>'.$record->employmentStatus.'</td>
                              <td>'.$record->jobTitle.'</td>
                                  <td></td>
                              <td>
                                  <a href="/tracker/EditEmployee.php?id='.$record->id.'" class="btn btn-info btn-sm">Edit</a>
                                  <button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById(`deleteform'.$record->id.'`).submit();">Delete</button>

                                  <form action="" method="post" id="deleteform'.$record->id.'"><input type="hidden" name="deleteID" value="'.$record->id.'"/></form>
                              </td></tr>';
                            }
                        ?>            
                    </tbody>
                  </table>
                </div>
                <?php 
                  }
                ?>
              </div>
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
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>	
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