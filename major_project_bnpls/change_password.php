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
            <div class="row justify-content-center">
                <div class="col-md-6">
                <div class="card">
                <div class="card-body">
                   <?php if(isset($_GET['suc_msg'])){ ?>
                      <span class="errormsg" style="color:green"><?php echo $_GET['suc_msg']?></span>
                  <?php  } ?>
                  <h4 class="card-title">Change password</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <br>
                 <form class="form-sample" action="php_script/change_pass_script.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputPassword4"> Current Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" name="pass" placeholder="Current Password">
                   <?php if(isset($_GET['pass_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['pass_msg']?></span>
                  <?php  } ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">New Password</label>
                      <input type="password" class="form-control" id="password" name="new_pass" placeholder="New Password" oninput="checkpass()">
                    <span id="pass_strength" class="errormsg"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Confirm Password</label>
                      <input type="password" class="form-control" id="conf_password" name="conf_pass" placeholder="Confirm Password" onblur="matchpasswords()">
                      <span id="error" class="errormsg"></span>
                   <?php if(isset($_GET['conf_pass_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['conf_pass_msg']?></span>
                  <?php  } ?>
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
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/custom_js.js"></script>
    </body>
</html>
<?php }else{
 header('location:index.php');   
}?>
