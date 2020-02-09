


<?php
session_start();
$success="";
if(isset($_SESSION['user'])){
  include('includes/config.php');

//echo(!isset($_SESSION['user']));
//if(!isset($_SESSION['user'])){ ?>
    <script>
  //    alert("you are not allowed to visit this page");
    //    window.location.href="index.php";
    </script>
<?php //}else 
    
if(isset($_POST['password'])){
    extract($_POST);
    $email = $_SESSION['user'];
    $selectquery = "select * from students where email = '$email'";
    $selectqueryresult = mysqli_query($con, $selectquery) or die(mysqli_error($con));
    $userinfo = mysqli_fetch_array($selectqueryresult);
    if($password == $userinfo['password']){
       $updatequery = "UPDATE students SET password = '$newpassword' WHERE email = '$email'"; 
        $updatequeryresult = mysqli_query($con, $updatequery) or die(mysqli_error($con));
        $success = 'true';
    }else{ ?>
        <script>
         alert("wrong password");
            window.location.href="change-password.php";
            $success = 'false';
       </script>
  <?php  }
}
 }else{ ?>
  <script>
alert("you are not allowed to visit this page, login first!!!!");
     window.location.href=('index.php');
</script>  
<?php }
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
  <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
    
function validate(){
    var np = document.getElementById("np").value;
    var cnp = document.getElementById("cnp").value;
    var spn = document.getElementById("spn");
    var btn = document.getElementById("btn");
    if(np != cnp){
        spn.style.visibility = "visible";
    }else{
      spn.style.visibility = "hidden";   
        btn.disabled= false;
    }
}
</script>

<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">User Change Password</h4>
</div>
</div>
 
    
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
Change Password
</div>
<div class="panel-body">
<form role="form" method="post" action=" " onSubmit="return valid();" name="chngpwd">

<div class="form-group">
<label>Current Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Enter Password</label>
<input class="form-control" type="password" name="newpassword" id="np" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Confirm Password </label>
<input class="form-control"  type="password" name="confirmpassword" id="cnp" autocomplete="off" oninput="validate()" required />
    <span id="spn" style="color:red; visibility:hidden">new passwords are not matching</span>
</div>

 <button type="submit" name="change" id="btn" class="btn btn-info" disabled>Chnage </button> 
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END--> 
   <?php if($success == "true"){ ?>
     <div class="succWrap"  id="np"><strong>SUCCESS</strong> </div> 
<?php }else if($success=="false"){ ?>
    <div class="errorWrap"  id="cnp"><strong>ERROR</strong> </div>  
<?php }
    ?>
 
           
          
           
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>

