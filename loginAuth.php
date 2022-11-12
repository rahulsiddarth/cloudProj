<?php

require('dbconfig.php');
include "dbconfig.php";

if (isset($_POST['username']) and isset($_POST['pass'])){
	
    // Assigning POST values to variables.
    $username = $_POST['username'];
    $password = $_POST['pass'];
    
    // CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM `user` WHERE username='$username' and uPassword='$password'";
     
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    
    if ($count == 1){
        session_start();
        $_SESSION['username']=$username;
        // echo $_SESSION['username'];
        header("location:display.php");
    
    //echo "Login Credentials verified";
    // echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
    
    }else{
        header("location:Login.php?msg=invalid");
    //echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
    //echo "Invalid Login Credentials";
    }
    }

?>