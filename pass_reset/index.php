<?php
namespace login_system_oop;
include "../inc/Query.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post" action=""><br /><br />
		<label><strong>Enter Your Email Address:</strong></label><br /><br />
		<input type="email" name="email" placeholder="username@email.com" />
		<br /><br />
		<input type="submit" name="submit" value="Reset Password"/>
	</form>

</body>
</html>

<?php

if (isset($_POST['submit'])) {
	$obj = new Query;
	$myarray = array(
		"email" => $_POST['email']
	);

	if ($obj->select("user_info", $myarray)) {
		$email = ($myarray['email']);
		header("location:reset_pass.php?email=$email");
	}else{
		echo "<script>alert('no email found');</script>";
        echo "<script>window.open('index.php','_self')</script>";
	}
}

?>