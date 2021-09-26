<?php
            header('Content-type: text/html; charset=utf-8');

               
            // Setting the HTTP Request Headers
						$User_Agent = 'Mozilla/5.0 (Windows NT 6.1; rv:60.0) Gecko/20100101 Firefox/60.0';

						$request_headers[] = 'X-picturemaxx-api-key: key';
						$request_headers[] = 'Contect-Type:text/html';
						$request_headers[] = 'Accept:text/html';
						$request_headers[] = 'Accept: application/json';
						$request_headers[] = 'Content-type: application/json';
						$request_headers[] = 'Accept-Encoding:  gzip, deflate, identity';
						$request_headers[] = 'Expect: ';                   

						$dataj = array (
							'emailAddress' => $_POST['emailAddress'],
							'employeeCode' => $_POST['employeeCode'],
							'name' => $_POST['name'],
							'surname' => $_POST['surname']

	);
	$roleId = '1';
	$handle = curl_init();


	 
	 curl_setopt_array($handle,
	 array(
// URL to fetch
$url = "https://employee-tracker-apii.herokuapp.com/api/v1/users/signUp/" . $roleId
// Enable the post response.
		 // The data to transfer with the response.
	 )
 );
	
 $response = curl_exec($handle);

	
						 $data_json = json_encode($dataj);
						 $request_headers[] = 'Content-Length: ' . strlen($data_json);

					$ch = curl_init($url);
					// Set the url      

		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_ENCODING, "");
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
						curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
					//	curl -H "Authorization: Bearer <ACCESS_TOKEN>" http://www.example.com

						// Execute
						$result = curl_exec($ch);
					$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						// Performs the Request, with specified curl_setopt() options (if any).
						//$data = json_decode( file_get_contents( 'php://input' ), true )
						// Closing

		curl_close($ch);
	 
		if ($code === 200) {
			$result = json_decode($result, true);
			$success = 'Credentials successfully sent, check email and proceed to Login.';

	} 		else {
		 $error = 'Whoops! Something Wrong.';

	}
	print_r($result);


include('includes/head.php')

?>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
			                <div class="col-md-8 offset-md-2 pl-md-0">
			                  <div class="auth-form-wrapper px-4 py-5">
			                    <a href="#" class="noble-ui-logo d-block mb-2">EMPLOYEE<span>TRACKER</span></a>
			                    <h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>
													<?php
									if(isset($error)){
										echo '<p class="alert alert-danger">' . $error . '</p><br>';
									}
									elseif(isset($success)){
										echo '<p class="alert alert-success">' . $success . '</p><br>';
									}
								?>
			                    <form action="" class="forms-sample"  method="post">
														<div class="form-group">
			                        <label for="exampleInputEmail1">Email address</label>
			                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Address" name="emailAddress">
			                      </div>
			                      <div class="form-group">
			                        <label for="exampleInputUsername1">Employee Code</label>
			                        <input type="text" class="form-control" id="exampleInputUsername1"  placeholder="Employee Code" name="employeeCode">
			                      </div>   
													<div class="form-group">
														<label for="exampleInputPassword1">First Name</label>
			                        <input type="text" class="form-control" id="exampleInputPassword1"  placeholder="First Name" name="name">
			                      </div>   
														<div class="form-group">
			                        <label for="exampleInputPassword1">Last Name</label>
			                        <input type="text" class="form-control" id="exampleInputPassword1"  placeholder="Last Name" name="surname">
			                      </div>
			                      <div class="mt-3">
			                        <button type="submit" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
			                          Sign up
			                        </button>
			                      </div>
			                      <a href="/tracker/login.php" class="d-block mt-3 text-muted">Already a user? Sign in</a>
			                    </form>
			                  </div>
			                </div>
			              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="../../assets/vendors/core/core.js"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="../../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../../assets/js/template.js"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
	<!-- end custom js for this page -->
</body>
</html>