<?php 
  include('includes/head.php');

  //get remote data
  $records = [
    [
      'name' => 'John',
      'surname' => 'Doe',
       'emailAddress' => 'jd@email.com',
       'nationalIdNumber' => '63-5428776D87',
       'mobileNumber' => "0778774778",
       'employer' => 'ECONET',
       'employerAddress' => '990 WILLOWVALE'
    ],
    [
      'name' => 'John',
      'surname' => 'Doe',
       'emailAddress' => 'jd@email.com',
       'nationalIdNumber' => '63-5478554S87',
       'mobileNumber' => "0778775779",
       'employer' => 'CASSAVA SMART TECH',
       'employerAddress' => '889 BORROWDALE'
    ],
  ];

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
                        <h6 class="card-title">Spouses</h6>
                      </div>
                      <div class="col-sm-1">
                      <a href="/tracker/AddSpouse.php" class="nav-link" style="float:right">
              <i class="link-icon" data-feather="user-plus"></i>
              <span class="link-title">Add</span>
            </a>
</div></div>
                        <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>National_Id_Number</th>
                        <th>Mobile_Number</th>
                        <th>E-mail_Address</th>
                        <th>Employer</th>
                        <th>Employer_Address</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        <?php
                          foreach ($records as $record){
                            echo '<tr><td>'.$record['name'].'</td>
                        <td>'.$record['surname'].'</td>
                        <td>'.$record['emailAddress'].'</td>
                        <td>'.$record['nationalIdNumber'].'</td>
                        <td>'.$record['mobileNumber'].'</td>
                        <td>'.$record['employer'].'</td>
                        <td>'.$record['employerAddress'].'</td>
                        <td></td>
                        <td>
                            <a href="/tracker/EditSpouse.php?id='.$record['name'].'" class="btn btn-info btn-sm">Edit</a>
                            <a href="/tracker/DeleteSpouse.php?id='.$record['name'].'" class="btn btn-danger btn-sm">Delete</a>
                        </td></tr>';
                          }
                        ?>
                      </tbody>
                  </table>
                </div>
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