<?php 
session_start();
if(isset($_SESSION['user'])){
require('assets/includes/connection.php');
$userinfo_query = "select profile_pic from user where email =  '{$_SESSION['user']}'";
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
<div class="container-fluid page-body-wrapper">
<?php include('assets/includes/sidebar.php');?>   

<div class="main-panel">
<!--        <div class="row w-100">-->
            <div class="row justify-content-center">
<div class="container">
<div class="container-scroller">
    <div class="row justify-content-center">
   <div class="col-md-6">
       <img class="" src="profile_pic/<?php echo $userinfo_query_result_array['profile_pic'];?>" alt="profile image">
     </div> 
    </div>
                 <form class="form-sample" action="php_script/change_profile_pic_script.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputPassword4">Choose Profile Picture </label>
                      <input type="file" class="form-control" name="profile_pic">
                   <?php if(isset($_GET['img_size_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['img_size_msg'];?></span>
                  <?php  } ?>
                   <?php if(isset($_GET['img_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['img_msg'];?></span>
                  <?php  } ?>
                    </div>
                   <a href=""> <button type="submit" class="btn btn-success mr-2">Upload<i class="mdi mdi-upload"></i></button></a>
                   <!-- <a href="change-password.php"><button class="btn btn-light"></button></a> -->
                  </form>
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
    </div>
    </div>
            </div>
        </div>
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
       
    </div> 
    

<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/data-table.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>  
<script src="assets/js/custom_js.js"></script>
    </body>
</html>
<?php }else{
    header('location:index.php');
}?>