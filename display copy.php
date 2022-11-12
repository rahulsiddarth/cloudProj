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
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    background:black;
    margin-top:20px;
}
.card-box {
    padding: 20px;
    border-radius: 30px;
    margin-bottom: 30px;
    background-color: white;
}

.social-links li a {
    border-radius: 50%;
    color: rgba(121, 121, 121, .8);
    display: inline-block;
    height: 30px;
    line-height: 27px;
    border: 2px solid rgba(121, 121, 121, .5);
    text-align: center;
    width: 30px
}

.social-links li a:hover {
    color: #797979;
    border: 2px solid #797979
}
.thumb-lg {
    height: 88px;
    width: 88px;
}
.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
}
.text-pink {
    color: #ff679b!important;
}
.btn-rounded {
    border-radius: 2em;
}
.text-muted {
    color: #98a6ad!important;
}
h4 {
    line-height: 22px;
    font-size: 18px;
}
    </style>
</head>
<body>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <!-- <img src="img-1.jpg" alt="" srcset="" height="15%" width="15%"> -->
        </a>
    
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="new_meet.php" class="nav-link px-2 link-dark">New Meet</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
            <li><a href="user_profile.php" class="nav-link px-2 link-dark">About</a></li>
          </ul>
    
          <div class="col-md-3 text-end">
          <form method='post' action=""  >
            <button type="submit" class="btn btn-outline-primary me-2" name="but_logout">Log out</button>
          </form>
            <!-- <button type="button" class="btn btn-primary">Sign-up</button> -->
          </div>
        </header>
<div class="content">
    <div class="container">
    <div class="btn-group btn-group-toggle" style="margin-left:10%"data-toggle="buttons">
        <label class="btn btn-secondary active" style="margin: 0 20%">
            <input type="radio" name="options" id="option1" autocomplete="off" checked> Gym
        </label>
        <label class="btn btn-secondary" style="margin: 0 20%">
            <input type="radio" name="options" id="option2" autocomplete="off"> TechTalks
        </label>
        <label class="btn btn-secondary" style="margin: 0 20%">
            <input type="radio" name="options" id="option3" autocomplete="off"> Jogging
        </label>
        <label class="btn btn-secondary" style="margin: 0 20%">
            <input type="radio" name="options" id="option4" autocomplete="off"> Meditation
        </label>
        </div>
        <br><br>
        <!-- <div class="row">
            <div class="col-sm-4"><a href="#custom-modal" class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="mdi mdi-plus"></i> Add Member</a></div>
            end col
        </div> -->
        <!-- end row -->
        <div class="row">
        <?php
        error_reporting(0);
        require('dbconfig.php');
        $result = mysqli_query($conn,"SELECT place FROM user where username = '".$_SESSION['username']."'");
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                $sql = "select * from user where place = '".$row['place']."'";
                $query_run = mysqli_query($conn,$sql);
                if(mysqli_num_rows($query_run)>0){
                    while($row1 = mysqli_fetch_assoc($query_run)){
                        ?>
            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <div class="">
                            <h4><?php echo $row1['username']?></h4>
                            <p class="text-muted"><?php echo $row1['place'] ?> <span>| </span><span><a href="#" class="text-pink"> <?php echo $row1['numbers']?></a></span></p>
                        </div>
                        <ul class="social-links list-inline">
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                        </ul>
                        <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col">
                                    <div class="mt-3">
                                        <h4><?php echo $row1['meets']?></h4>
                                        <p class="mb-0 text-muted">Meets</p>
                                    </div>
                                </div>
                                <!-- <div class="col-4">
                                    <div class="mt-3">
                                        <h4>6952</h4>
                                        <p class="mb-0 text-muted">Income amounts</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-3">
                                        <h4>1125</h4>
                                        <p class="mb-0 text-muted">Total Transactions</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            }
        }
    ?>
    </div>
    </div>
    </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>