<?php 
session_start();
require('assets/includes/connection.php');
$userinfo_query = "select * from user where email =  '{$_SESSION['user']}'";
$userinfo_query_result = mysqli_query($con, $userinfo_query) or die(mysqli_error($con));
$userinfo_query_result_array = mysqli_fetch_array($userinfo_query_result);
?>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/morris.js/morris.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom_style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<header>
<?php include('assets/includes/header.php')?>
</header>
    
    
<div class="container">
<div class="container-scroller">
    
      
<!--        <div class="row w-100">-->
<div class="content-wrapper">
 <div class="row">
   <div class="left col-md-1"><img class="img-md rounded-circle" src="assets/images/faces-clipart/pic-1.png" alt="jrofile image">
     </div> 
   <div class="right col-md-11">
       <span><h2><?php echo $userinfo_query_result_array['first_name']." ".$userinfo_query_result_array['last_name'];?></h2><br><span>Level <?php echo $userinfo_query_result_array['level']?></span><br><span><?php echo $userinfo_query_result_array['experience_point'];?> xp</span></span> 
     </div>
</div>
</div> 
<div class="content-wrapper">
 <div class="row">
   <div class="left col-md-12"><h3>My Courses</h3>
     </div> 
   <div class="right col-md-12">
<span>Course1</span><span>course2</span><span>course3</span><span>Course4</span> 
     </div>
</div>
</div> 

<p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>

      
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
    </div>
    </div>    

    

    </body>
<?php include('assets/includes/footer1.php')?>
</html>