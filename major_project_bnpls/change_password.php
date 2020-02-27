<?php session_start();
if(isset($_SESSION['user'])){
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
<?php include ('assets/includes/header.php'); ?>    
    </header>
<div class="container">
    <div class="container-scroller">
<div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Change password</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <br>
                 <form class="form-sample" action="php_script/change_pass_script.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputPassword4"> Current Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" name="pass" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4"> ChangePassword</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" name="new_pass" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4"> Conform Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" name="conf_pass" placeholder="Password">
                    </div>
                  
                   
                   
                   <a href=""> <button type="submit" class="btn btn-success mr-2">Update</button></a>
                   <!-- <a href="change-password.php"><button class="btn btn-light"></button></a> -->
                  </form>
                </div>
              </div>
                </div>
            </div>

    </div>
    </div>
<?php include ('assets/includes/footer1.php')?>
    </body>
</html>
<?php }else{
 header('location:index.php');   
}?>
