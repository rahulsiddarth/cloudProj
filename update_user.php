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
<?php
error_reporting(0);
require('dbconfig.php');
$result = mysqli_query($conn,"SELECT * FROM user where username = '".$_SESSION['username']."'");

?>
<head>
    <meta charset="utf-8">
    <title>FindMyPal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/reset.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/header-8.css" />
    <style type="text/css">
    	body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: black;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<header class="site-header" style="background:black">
      <div class="wrapper site-header__wrapper" style="color:white">
        <div class="site-header__start">
          <a href="#" class="brand" style="color:white">FindMyPal</a>
        </div>
        <div class="site-header__middle">
          <nav class="nav">
            <button class="nav__toggle" aria-expanded="false" type="button">
              menu
            </button>
            <ul class="nav__wrapper">
              <li class="nav__item"><a href="display.php" style="color:white">Home</a></li>
              <li class="nav__item"><a href="user_profile.php" style="color:white">About</a></li>
            </ul>
          </nav>
        </div>
        <div class="site-header__end">
        <form method='post' action=""  >
            <button type="submit" class="btn btn-outline-light me-2" name="but_logout">Log out</button>
          </form>
        </div>
      </div>
    </header>
    <hr style="background:white">
          <br><br>
        <div class="container">
    <div class="main-body">
        <form action="update.php" method="POST">
            <?php
             if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {
             ?> 
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="image/<?php echo $row['image']?>.jpeg" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['username'] ?></h4>
                      <p class="text-secondary mb-1"><?php echo $row["about"]?></p>
                      <p class="text-muted font-size-sm"><?php echo $row["place"]?></p>
                      <!-- <button class="btn btn-primary">Follow</button> -->
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary"><input type="text" name="instagram"value="<?php echo $row["instagram"]?>"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary"><input type="text" name="facebook" value="<?php echo $row["facebook"]?>"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="margin:0 auto">
                   <button class="btn btn-outline-primary"type="submit" name="submit">SUBMIT</button>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="fullname" value="<?php echo $row["fullname"]?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="email" value="<?php echo $row["email"]?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="numbers" value="<?php echo $row["numbers"]?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="adddress" value="<?php echo $row["adddress"]?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row gutters-sm">
              <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h4 class="d-flex align-items-center mb-3">Project Status<h4>
                      <h2>Total No. of Meets</h2>
                      <h6><?php echo $row["meets"]?></h6>
                        <br>
                      <h6>Interests</h>
                        <br>
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked value="gym">GYM
                            </label>
                            <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option2" autocomplete="off" value="techtalks">TECH TALKS
                            </label>
                            <label class="btn btn-secondary active">
                            <input type="radio" name="options" id="option3" autocomplete="off" valu="jogging">JOGGING
                            </label>
                            <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option4" autocomplete="off" value="meditation">MEDITATE
                            </label>
                      </div>
                      </div>
                    </div>
                  </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>STATUSES</h6>
                      <h3>Active</h3>
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="option1" id="option1" autocomplete="off" checked value="Yes"> Yes
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="option1" id="option2" autocomplete="off" value="No"> No
                        </label>
                      </div>
                      <!-- <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div> -->
                      <!-- <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">ACTIVE</label>
                      </div> -->
                      <h3>Introvert</h3>
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="option2" id="option1" autocomplete="off" checked value="Yes"> Yes
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="option2" id="option2" autocomplete="off" > No
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php
                }
            }
            ?>
            </form>
            <script src="js/header-8.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>