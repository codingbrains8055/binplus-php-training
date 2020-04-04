<?php session_start();?>
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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
           <h2 class="text-center mb-4">Log In</h2>
            <div class="auto-form-wrapper">
              <form action="php_script/login_script.php" method="post">
                <div class="form-group">
                  <div class="input">
                    <input type="text" class="form-control" id="userEmail" placeholder="Username" name="email" onfocus="tell()">
                  </div>
                   <?php if(isset($_GET['email_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['email_msg'];?></span>
                  <?php  } ?>
                </div>
                <div class="form-group">
                  <div class="input">
                    <input type="password" class="form-control" placeholder="*********" name="password">
                  </div>
                   <?php if(isset($_GET['pass_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['pass_msg'];?></span>
                  <?php  } ?>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input text-small" oninput="remember()">
                      Remember me
                     </label>
                    </div>
                    <div>
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a></div>
                </div>
                <div class="form-group">
                  <button class="btn btn-block g-login"><img class="mr-3" src="assets/images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="signup.php" class="text-black text-small">Create new account</a>
                </div>
              </form>
            </div>
              <footer>
            <ul class="auth-footer">
              <li><a href="#">Conditions</a></li>
              <li><a href="#">Help</a></li>
              <li><a href="#">Terms</a></li>
            </ul> </footer>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    </div>
            </div>
        </div>
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
       
    </div> 
    

  <!-- container-scroller -->
  <!-- plugins:js -->
<footer>
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
</footer>
  <!-- endinject -->    
    </body>
</html>