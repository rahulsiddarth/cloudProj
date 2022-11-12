<?php
session_start();
$username = "test";
$password = "testing";
$host = "100.25.168.213";
$db = "db1";
$conn = mysqli_connect($host,$username,$password,$db);
// if(!$conn){
//     echo "Error";
// }else{
//     echo "Connection Successful";
// }
?>