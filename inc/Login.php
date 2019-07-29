<?php
namespace login_system_oop;
session_start();
include ("DB.php");

class Login extends DB {

	public function login_check($table, $where){
        $sql = "";
        $condition = "";

        foreach ($where as $key => $value) {
            //id = "" AND name = "";
            $condition .= "`".$key."` "." = "."'".$value."'"." AND ";
        }
        $condition = substr($condition, 0, -5); //remove last AND;

        //echo $condition;
        $sql = "SELECT * FROM `".$table."` WHERE ".$condition;
        //echo $sql;
        $query = mysqli_query($this->conn, $sql);
        $row = mysqli_num_rows($query);

        return $row;
    } 
 
}


if (isset($_POST['submit'])) {
    $obj = new Login;
    
    $myarray = array(
        "email" => $_POST['email'],
        "password"  => md5($_POST['password'])
    );

    // print_r($obj->check_login("user_info", $myarray));

     if($obj->login_check("user_info", $myarray)) {
        $_SESSION['user_name'] = $_POST['email'];
        header("location:../home.php");
        // print_r($_SESSION['user_name']);
    }else{
        echo "<script>alert('Password or Username is incorrect');</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}


?>