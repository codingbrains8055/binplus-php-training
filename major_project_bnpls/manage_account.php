<?php 
session_start();
if(isset($_SESSION['user'])){
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
  <title>Manage-account</title>
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
                <div class="col-md-6">
                <div class="card">
                <div class="card-body">
                  <center><h4 class="card-title">Profile</h4></center>
                  <br>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" value="<?php echo $userinfo_query_result_array['first_name'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" value="<?php echo $userinfo_query_result_array['last_name'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="<?php echo $userinfo_query_result_array['email'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Username</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="username" value="<?php echo $userinfo_query_result_array['username'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Mobile no</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="mobile no" value="<?php echo $userinfo_query_result_array['mobile'];?>" readonly>
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                    </div> -->
                  </form>
                   <a href="edit_profile.php"> <button class="btn btn-primary mr-2">Edit profile</button></a>
                   <a href="change_password.php"><button class="btn btn-light">Change-password</button></a>
                </div>
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
<?php } else{
header('location:index.php');
}?>