<?php session_start();
if(isset($_SESSION['user'])){
require('assets/includes/connection.php');

$fetch_course_query = "select * from courses";
$fetch_course_query_result = mysqli_query($con, $fetch_course_query) or die(mysqli_error($con));
if(isset($_SESSION['user'])){
$fetch_user_info = "select user_id from user where email = '{$_SESSION['user']}'";
$fetch_user_info_result = mysqli_query($con, $fetch_user_info) or die(mysqli_error($con));
$user = mysqli_fetch_array($fetch_user_info_result);  
}
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
 <?php 
   include('assets/includes/header.php');
?>  
</header>
<div class="container">
 <div class="container-fluid">
     <div class="row justify-content-center">
        <?php while($print = mysqli_fetch_array($fetch_course_query_result)) {?>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $print['course_name'];?></h5>
    <p class="card-text"><?php echo $print['course_description'];?></p>
  </div>
  <div class="card-body">
<a href="php_script/take_course_script.php?course_id=<?php echo $print['course_id'];?>&user_id=<?php echo $user['user_id'];?>"><button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button></a>
  </div>
</div>
</div>
<?php }?>
     </div>    
     

 </div>   
    </div>
<footer>
<?php include('assets/includes/footer1.php')?>    
</footer>
    </body>
</html>
<?php }else{
    header('location:index.php');
}?>