<?php
            header('Content-type: text/html; charset=utf-8');

                // URL to fetch
                $url = "https://employee-tracker-apii.herokuapp.com/api/v1/users/login/email";
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
							'password' => $_POST['password'],
	);
						 $data_json = json_encode($dataj);
						 $request_headers[] = 'Content-Length: ' . strlen($data_json);

						 function HandleHeaderLine( $curl, $header_line ) {
							echo "<br>Start: ".$header_line; // or do whatever
							return strlen($header_line);
					}

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
						//enable headers
						curl_setopt($ch, CURLOPT_HEADER, 1);
						//get only headers
					//	curl_setopt($ch, CURLOPT_NOBODY, 1);
						//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						//curl_setopt($ch, CURLOPT_HEADERFUNCTION, "HandleHeaderLine");
					//	curl_setopt($ch, CURLOPT_HEADERFUNCTION, array(&$object, 'methodName'));
						curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
						curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');

						// Execute
						$result = curl_exec($ch);
					$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						// Performs the Request, with specified curl_setopt() options (if any).
						//$data = json_decode( file_get_contents( 'php://input' ), true )
						// Closing
		curl_close($ch);

/*$headers = [];
$result = rtrim($result);
$data = explode("\n",$result);
$headers['status'] = $data[0];
array_shift($data);

foreach($data as $part){

    //some headers will contain ":" character (Location for example), and the part after ":" will be lost, Thanks to @Emanuele
    $middle = explode(":",$part,2);

    //Supress warning message if $middle[1] does not exist, Thanks to @crayons
    if ( !isset($middle[1]) ) { $middle[1] = null; }

    $headers[trim($middle[0])] = trim($middle[1]);
}
*/

	 
		if ($code == 200) {
			$result = json_decode($result, true);
			$success = 'Login successful';
			$_SESSION['Authorization']= print_r($headers['Authorization']);
			// die();
			

			header("Location: http://localhost/tracker/");

		
	} 		else {
		// $error = " ";

	}

	//print_r($result);

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
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    <?php
									if(isset($error)){
										echo '<p class="alert alert-danger">' . $error . '</p><br>';
									}
									elseif(isset($success)){
										echo '<p class="alert alert-success">' . $success . '</p><br>';
										header("Location: http://localhost/tracker/");

									}
								?>
                    <form action="" class="forms-sample"  method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name = "emailAddress">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password" name="password">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          Remember me
                        </label>
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-icon-text mb-2 mb-md-0" onclick="location.href = '/tracker/';">
                          Login
                        </button>
                      </div>
                      <a href="/tracker/register.php" class="d-block mt-3 text-muted">New user? Sign Up Here</a>
											<a href="/tracker/forgotPassword.php" class="d-block mt-3 text-muted"> Or Forgot Password?</a>
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