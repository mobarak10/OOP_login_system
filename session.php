<?php
session_start();
$userprofile = $_SESSION['user_name'];
if ($userprofile ==! true) {
	header('location:index.php');
}

?>