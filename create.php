<?php
require('dbconfig.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $number = $_POST['number'];
    $place = $_POST['place'];

    $query = "INSERT into user (username,uPassword,number,place) values ('$username','$password','$number','$place')";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        header("location:http://localhost/loginRegister/login.php");
    }else{
        echo "Error";
    }
}

?>