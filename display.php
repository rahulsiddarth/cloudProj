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
    <title>FindMyPal</title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/reset.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/header-8.css" />
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
            <!-- <button type="button" class="btn btn-primary">Sign-up</button> -->
<div class="content">
    <div class="container">
    <form action="" method="POST">
        <div class="btn-group btn-group-toggle" style="margin-left:0%"data-toggle="buttons">
            <label class="btn btn-secondary active" style="margin: 0 20%">
                <!-- <input type="radio" name="options" id="interest" autocomplete="off" checked> Gym -->
                <button type="submit" class="btn" name="gym" style="color:white">Gym</button>
            </label>
            <label class="btn btn-secondary" style="margin: 0 20%">
                <!-- <input type="radio" name="options" id="interest" autocomplete="off"> TechTalks -->
                <button type="submit" class="btn" name="techtalks" style="color:white">TechTalks</button>
            </label>
            <label class="btn btn-secondary" style="margin: 0 20%">
                <!-- <input type="radio" name="options" id="interest" autocomplete="off"> Jogging -->
                <button type="submit" class="btn" name="jogging" style="color:white">Jogging</button>
            </label>
            <label class="btn btn-secondary" style="margin: 0 20%">
                <!-- <input type="radio" name="options" id="interest" autocomplete="off"> Meditation -->
                <button type="submit" class="btn" name="meditation" style="color:white">Meditation</button>
            </label>
        </div>
    </form>
        <br><br>
        <!-- <div class="row">
            <div class="col-sm-4"><a href="#custom-modal" class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="mdi mdi-plus"></i> Add Member</a></div>
            end col
        </div> -->
        <!-- end row -->
        <div class="row">
        <?php
        if(isset($_POST['gym'])){
        error_reporting(0);
        require('dbconfig.php');
        $result = mysqli_query($conn,"SELECT place FROM user where username = '".$_SESSION['username']."'");
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                $sql = "select * from user where place = '".$row['place']."'AND interests = 'gym'";
                $query_run = mysqli_query($conn,$sql);
                if(mysqli_num_rows($query_run)>0){
                    while($row1 = mysqli_fetch_assoc($query_run)){
                        if($row1['introvert'] == 0){

                        
                        ?>
            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><img src="image/<?php echo $row1['image']?>.jpeg" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <br><br>
                        <div class="">
                            <h4><?php echo $row1['username']?></h4>
                            <p class="text-muted"><?php echo $row1['place'] ?> <span>| </span><span><a href="#" class="text-pink"> <?php echo $row1['numbers']?></a></span></p>
                        </div>
                        
                        <form action="select_user.php" method="post">
                            <button type="submit" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">View</button>
                            <input type="hidden" name="username" value="<?php echo $row1["username"]?>">
                        </form>
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
                        }else{
                        
                        ?>
                        <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><img src="image/<?php echo $row1['image']?>.jpeg" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <br><br>
                        <div class="">
                            <h4><?php echo $row1['username']?></h4>
                            <p class="text-muted"><?php echo $row1['place'] ?> <span>
                        </div>
                        
                        <form action="select_user.php" method="post">
                            <button type="submit" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">View</button>
                            <input type="hidden" name="username" value="<?php echo $row1["username"]?>">
                        </form>
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
        }
    }
    ?>
    <?php
        if(isset($_POST['techtalks'])){
        error_reporting(0);
        require('dbconfig.php');
        $result = mysqli_query($conn,"SELECT place FROM user where username = '".$_SESSION['username']."'");
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                $sql = "select * from user where place = '".$row['place']."'AND interests = 'techtalks'";
                $query_run = mysqli_query($conn,$sql);
                if(mysqli_num_rows($query_run)>0){
                    while($row1 = mysqli_fetch_assoc($query_run)){
                        if($row1['introvert'] == 0){

                        
                            ?>
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="image/<?php echo $row1['image']?>.jpeg" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <br><br>
                            <div class="">
                                <h4><?php echo $row1['username']?></h4>
                                <p class="text-muted"><?php echo $row1['place'] ?> <span>| </span><span><a href="#" class="text-pink"> <?php echo $row1['numbers']?></a></span></p>
                            </div>
                            
                            <form action="select_user.php" method="post">
                                <button type="submit" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">View</button>
                                <input type="hidden" name="username" value="<?php echo $row1["username"]?>">
                            </form>
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
                            }else{
                            
                            ?>
                            <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="image/<?php echo $row1['image']?>.jpeg" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <br><br>
                            <div class="">
                                <h4><?php echo $row1['username']?></h4>
                                <p class="text-muted"><?php echo $row1['place'] ?> <span>
                            </div>
                            
                            <form action="select_user.php" method="post">
                                <button type="submit" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">View</button>
                                <input type="hidden" name="username" value="<?php echo $row1["username"]?>">
                            </form>
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
            }
        }
        ?>
    <?php
        if(isset($_POST['jogging'])){
        error_reporting(0);
        require('dbconfig.php');
        $result = mysqli_query($conn,"SELECT place FROM user where username = '".$_SESSION['username']."'");
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                $sql = "select * from user where place = '".$row['place']."'AND interests = 'jogging'";
                $query_run = mysqli_query($conn,$sql);
                if(mysqli_num_rows($query_run)>0){
                    while($row1 = mysqli_fetch_assoc($query_run)){
                        if($row1['introvert'] == 0){

                        
                            ?>
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="image/<?php echo $row1['image']?>.jpeg" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <br><br>
                            <div class="">
                                <h4><?php echo $row1['username']?></h4>
                                <p class="text-muted"><?php echo $row1['place'] ?> <span>| </span><span><a href="#" class="text-pink"> <?php echo $row1['numbers']?></a></span></p>
                            </div>
                            
                            <form action="select_user.php" method="post">
                                <button type="submit" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">View</button>
                                <input type="hidden" name="username" value="<?php echo $row1["username"]?>">
                            </form>
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
                            }else{
                            
                            ?>
                            <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="image/<?php echo $row1['image']?>.jpeg" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <br><br>
                            <div class="">
                                <h4><?php echo $row1['username']?></h4>
                                <p class="text-muted"><?php echo $row1['place'] ?> <span>
                            </div>
                            
                            <form action="select_user.php" method="post">
                                <button type="submit" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">View</button>
                                <input type="hidden" name="username" value="<?php echo $row1["username"]?>">
                            </form>
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
            }
        }
        ?>
    <?php
        if(isset($_POST['meditation'])){
        error_reporting(0);
        require('dbconfig.php');
        $result = mysqli_query($conn,"SELECT place FROM user where username = '".$_SESSION['username']."'");
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                $sql = "select * from user where place = '".$row['place']."'AND interests = 'meditation'";
                $query_run = mysqli_query($conn,$sql);
                if(mysqli_num_rows($query_run)>0){
                    while($row1 = mysqli_fetch_assoc($query_run)){
                        if($row1['introvert'] == 0){

                        
                            ?>
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="image/<?php echo $row1['image']?>.jpeg" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <br><br>
                            <div class="">
                                <h4><?php echo $row1['username']?></h4>
                                <p class="text-muted"><?php echo $row1['place'] ?> <span>| </span><span><a href="#" class="text-pink"> <?php echo $row1['numbers']?></a></span></p>
                            </div>
                            
                            <form action="select_user.php" method="post">
                                <button type="submit" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">View</button>
                                <input type="hidden" name="username" value="<?php echo $row1["username"]?>">
                            </form>
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
                            }else{
                            
                            ?>
                            <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="image/<?php echo $rows['image']?>.jpeg" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <br><br>
                            <div class="">
                                <h4><?php echo $row1['username']?></h4>
                                <p class="text-muted"><?php echo $row1['place'] ?> <span>
                            </div>
                            
                            <form action="select_user.php" method="post">
                                <button type="submit" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">View</button>
                                <input type="hidden" name="username" value="<?php echo $row1["username"]?>">
                            </form>
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
            }
        }
        ?>
    </div>
    </div>
    </div>
    <!-- <div style="float:right">
    <iframe width="350" height="430" allow="microphone;" src="https://console.dialogflow.com/api-client/demo/embedded/f83e1948-617f-407b-b88c-90132afaa91d"></iframe>

    </div> -->
    <script src="js/header-8.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>