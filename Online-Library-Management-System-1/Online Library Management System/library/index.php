<?php 
include('includes/config.php');
$_SESSION['user'] = "";
if(isset($_POST['email'])){
    extract($_POST);
    $selectquery = "select * from students where email = '$email'";
    $selectqueryresult = mysqli_query($con, $selectquery) or die(mysqli_error($con));
    $userinfo = mysqli_fetch_array($selectqueryresult);
    if($email == $userinfo['email']){
        if($password == $userinfo['password']){
            session_start();
            $_SESSION['user'] = $email;
            header('location:my-profile.php');
        }else{ ?>
           <script>
             alert("wrong password");
               window.location.href="index.php";
           </script> 
    <?php    }
    }else{ ?>
       <script>
          alert("you are not registered with us");
           window.location.href="signup.php";
       </script> 
<?php    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">USER LOGIN FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" action=" " method="post">

<div class="form-group">
<label>Enter Email id</label>
<input class="form-control" type="text" name="email" required autocomplete="on" />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" required autocomplete="on"  />
<!--<p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>-->
</div>

 <!--<div class="form-group">
<label>Verification code : </label>
<input type="text" class="form-control1"  name="vercode" maxlength="5" autocomplete="off" required  style="height:25px;" />&nbsp;<img src="captcha.php">
</div>  -->

 <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="signup.php">Not Register Yet</a>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
 <?php include('includes/footer.php');?>
     <!-- CONTENT-WRAPPER SECTION END-->
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
