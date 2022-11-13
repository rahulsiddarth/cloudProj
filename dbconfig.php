<?php
session_start();
$username = "test";
$password = "testing";
$host = "54.237.9.84";
$db = "db1";
$conn = mysqli_connect($host,$username,$password,$db);
// if(!$conn){
//     echo "Error";
// }else{
//     echo "Connection Successful";
// }
?>