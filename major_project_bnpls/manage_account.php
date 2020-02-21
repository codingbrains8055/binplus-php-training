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
                <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                  <center><h4 class="card-title">Profile</h4></center>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
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
                    <!-- <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputCity1">Mobile no</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="mobile no" value="<?php echo $userinfo_query_result_array['mobile'];?>" readonly>
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                    </div> -->
                  </form>
                   <a href="edit_profile.php"> <button class="btn btn-success mr-2">Edit profile</button></a>
                   <a href="change_password.php"><button class="btn btn-light">Change-password</button></a>
                </div>
              </div>
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