<?php

namespace login_system_oop;
include "../inc/query.php";
$email = $_GET['email'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post" action="">
		<br /><br />
		<label><strong>Enter New Password:</strong></label><br />
		<input type="password" name="pass1" maxlength="15" required />
	    <br /><br />
		<!-- <label><strong>Re-Enter New Password:</strong></label><br />
		<input type="password" name="pass2" maxlength="15" required/>
	    <br /><br /> -->
		<input type="hidden" name="email" value="<?php echo $email;?>"/>
		<input type="submit" name="reset" value="Reset Password" />
	</form>

</body>
</html>

<?php

if (isset($_POST['reset'])) {
	$obj = new Query;

	$myarray = array(
		"password" => md5($_POST['pass1'])
	);
	$where = array(
		"email" => $_POST['email']
	);

	if ($obj->update_pass("user_info", $myarray, $where)) {
		echo "<script>alert('password change successfully');</script>";
    	echo "<script>window.open('../index.php','_self')</script>";
	}
}

?>