<?php
namespace login_system_oop;

include "inc/Query.php";
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <script src="vendor/jquery/jquery-3.4.0.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

	<title></title>
</head>
<body>

	<div class="container">
		<h2 class="text-center">Registration</h2>
		<hr>

		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<header class="card-header">
						<a href="index.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
						<h4 class="card-title mt-2">Sign up</h4>
					</header>

					<article class="card-body">
						<form action="registration.php" method="post">
							<div class="form-row">
								<div class="col form-group">
									<label>First name </label>   
								  	<input type="text" name="fname" class="form-control" placeholder="">
								</div> <!-- form-group end.// -->

								<div class="col form-group">
									<label>Last name</label>
								  	<input type="text" name="lname" class="form-control" placeholder=" ">
								</div> <!-- form-group end.// -->
							</div> <!-- form-row end.// -->

							<div class="form-group">
								<label class="form-check form-check-inline">
							    	<input class="form-check-input" name="gender" type="radio" checked name="gender" value="male">
								    <span class="form-check-label"> Male </span>
								</label>

								<label class="form-check form-check-inline">
							    	<input class="form-check-input" name="gender" type="radio" name="gender" value="female">
								    <span class="form-check-label"> Female </span>
								</label>

								<label class="form-check form-check-inline">
							    	<input class="form-check-input" name="gender" type="radio" name="gender" value="other">
								    <span class="form-check-label"> Other</span>
								</label>
							</div> <!-- form-group end.// -->

							<div class="form-group">
								<label>Email address</label>
								<input type="email" name="email" class="form-control" placeholder="">
								<small class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div> <!-- form-group end.// -->

							<div class="form-row">
								<div class="form-group col-md-6">
								    <label>Country</label>
								    <select name="country" class="form-control" required>
									    <option selected disabled value="choose">Choose...</option>
									    <option value="afganistan">Afganistan</option>
									    <option value="bangladesh">Bangladesh</option>
									    <option value="india">India</option>
									    <option value="russia">Russia</option>
									    <option value="usa">United States</option>
									    <option value="uzbkstn">Uzbekistan</option>
								    </select>
								</div> <!-- form-group end.// -->

								<div class="form-group col-md-6">
								    <label>City</label>
									<input type="text" name="city" class="form-control">
								</div> <!-- form-group end.// -->
							</div> <!-- form-row.// -->

							<div class="form-group">
								<label>Create password</label>
							    <input class="form-control" name="password" type="password">
							</div> <!-- form-group end.// -->  

						    <div class="form-group">
						        <button type="submit" name="submit" class="btn btn-primary btn-block"> Register  </button>
						    </div> <!-- form-group// --> 

						    <small class="text-muted">By clicking the <span style="color: blue">Register</span> button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                             									  
						</form>
					</article> <!-- card-body end .// -->
				<div class="border-top card-body text-center">Have an account? <a href="index.php">Log In</a></div>
				</div> <!-- card.// -->
			</div> <!-- col.//-->
		</div> <!-- row.//-->
	</div> 
		<!--container end.//-->
	<br><br>

</body>
</html>

<?php

if (isset($_POST['submit'])) {
	$obj = new Query;
	$myarray = array(
		"fname"    => $_POST['fname'],
		"lname"    => $_POST['lname'],
		"gender"   => $_POST['gender'],
		"email"    => $_POST['email'],
		"country"  => $_POST['country'],
		"city"     => $_POST['city'],
		"password" => md5($_POST['password'])
	);

	if ($obj->insert("user_info", $myarray)) {
	echo "<script>alert('data inserted successfully');</script>";
    echo "<script>window.open('index.php','_self')</script>";
	}
	
}

?>