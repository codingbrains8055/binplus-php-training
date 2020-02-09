
<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      $email =  $_SESSION['user'];
      $selectquery = "select * from students where email = '$email'";
      $selectqueryresult = mysqli_query($con, $selectquery) or die(mysqli_error($con));
      $userinfo = mysqli_fetch_array($selectqueryresult); 
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
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Student Signup</title>
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
                <h4 class="header-line">My Profile</h4>
                
                            </div>

        </div>
             
             
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           Update My Profile
                        </div>
                        <div class="panel-body">
                 
                            <form name="signup" action="updateinfo.php" method="post">


<div class="form-group">
<label>Profile Status : </label>
<?php if($userinfo['status'] == 'active'){?>
<span style="color: green">Active</span>
<?php } ?>
<?php if($userinfo['status'] == 'blocked'){?>
<span style="color: red">Blocked</span>
<?php } ?>    
 <?php if($userinfo['status'] == 'pending'){?>
<span style="color: yellow">Pending</span>
<?php } ?>   

</div>


<div class="form-group">
<label>Enter Full Name</label>
<input class="form-control" type="text" name="fullname" value="<?php echo($userinfo['fullname']); ?>" autocomplete="off" required />
</div>


<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobileno" maxlength="10" value="<?php echo($userinfo['mobileno']); ?>" autocomplete="off" required />
</div>
                                        
<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid" value="<?php echo($userinfo['email']); ?> "  autocomplete="off" required readonly />
</div>
                              
<button type="submit" name="update" class="btn btn-primary" id="submit" onclick="delay()">Update Now </button>

                                    </form>
                            </div>
                        </div>
                            </div>
    </div>
    </div>
        
        
        
        
 
<?php
if(isset($_SESSION['user'])){
    if(isset($_REQUEST['msg'])){
         if($_REQUEST['msg'] == "success"){  ?>
          <div class="succWrap" id="sucsmsg"  ><strong>SUCCESS</strong> </div>       
       <?php  }else if($_REQUEST['msg'] == "failure"){?>
    <div class="errorWrap" id="ermsg"><strong>ERROR</strong> </div>       
        <?php }
    }
}else{ ?>
  <script>
alert("you are not allowed to visit this page, login first!!!!");
     window.location.href=('index.php');
</script>  
<?php }
?>       
        
        
        
        
        
        
        
        
        
 
         <div class="succWrap" id="sucsmsg" style="visibility:hidden" ><strong>SUCCESS</strong> </div>                                                 
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
