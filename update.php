<?php
// error_reporting(0);
require('dbconfig.php');
include "dbconfig.php";

if(isset($_POST['submit'])){
    // echo $_REQUEST['instagram'];
    $instagram = $_REQUEST['instagram'];
    $facebook = $_REQUEST['facebook'];
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $numbers = $_REQUEST['numbers'];
    $address = $_REQUEST['adddress'];
    $active = $_REQUEST['option1'];
    if($active == "Yes"){
        $active = 1;
    }else{
        $active = 0;
    }
    echo $active;
    $introvert = $_REQUEST['option2'];
    if($introvert == "Yes"){
        $introvert = 1;
    }else{
        $introvert = 0;
    }
    echo $introvert;
    $interests = $_REQUEST['options'];
    $update = "UPDATE user set instagram = '$instagram', facebook = '$facebook', fullname = '$fullname', email = '$email', numbers='$numbers', 
                adddress = '$address', active = '$active', introvert = '$introvert',interests = '$interests' where username = '".$_SESSION['username']."'";
    mysqli_query($conn,$update);
    header("location:user_profile.php");           
}else{
    echo "el";
}

?>