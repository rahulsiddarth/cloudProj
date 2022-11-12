<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:http://localhost/loginRegister/login.php");
}
if(isset($_POST['but_logout'])){
    session_destroy();
    header("location:http://localhost/loginRegister/login.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php  echo $_SESSION['username']?></p>
    <form method='post' action=""  >
        <input type="submit" value="Logout" name="but_logout">
    </form>
    
</body>
</html>