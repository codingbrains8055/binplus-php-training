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
<div class="container">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Register</h2>
            <div class="auto-form-wrapper">
              <form class="cmxform" action="php_script/signup_script.php" method="post" enctype="multipart/form-data">
                  <?php if(isset($_GET['msg'])){
                 echo '<span style="color:red; font-size:10px">Fields should not be empty</span>';
} ?> 
                <div class="form-group">
                  <div class="input">
                    <input type="email" class="form-control" placeholder="E-mail" name="email">
                  </div>
                   <?php if(isset($_GET['email_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['email_msg'];?></span>
                  <?php  } ?>
                </div>

                <div class="form-group">
                  <div class="input">
                    <input type="number" class="form-control" placeholder="Mobile Number" name="mobile">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input">
                    <input type="text" class="form-control" placeholder="First Name" name="first_name">
                  </div>
                </div>                  
                
                <div class="form-group">
                  <div class="input">
                    <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                  </div>
                  </div>

                <div class="form-group">
                  <div class="input">
                    <input type="file" class="form-control" placeholder="profile picture" name="profile_pic">
                      <small>Your profile picture</small>
                  </div>
                   <?php if(isset($_GET['img_size_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['img_size_msg'];?></span>
                  <?php  } ?>
                   <?php if(isset($_GET['img_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['img_msg'];?></span>
                  <?php  } ?>
                </div>
                  
                <div class="form-group">
                  <div class="input">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input">
                    <input type="password" class="form-control" placeholder="Password" name="pass" id="password" oninput="checkpass()">
                  </div>
                    <span id="pass_strength" class="errormsg"></span>
                   <?php if(isset($_GET['pass_lenght_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['pass_lenght_msg'];?></span>
                  <?php  } ?>
                   <?php if(isset($_GET['pass_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['pass_msg'];?></span>
                  <?php  } ?>
                    
                </div>
                <div class="form-group">
                  <div class="input">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="conf_pass" id="conf_password" onBlur="matchpasswords()">
                  </div>
                </div>
                   <?php if(isset($_GET['pass_match_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['pass_match_msg'];?></span>
                  <?php  } ?>
                  <div class="input">
                      <span id="error" class="errormsg"></span>
                  </div>
<!--
                <div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">S
                      <input type="checkbox" class="form-check-input" name="i_agree">
                      I agree to the terms
                    </label>
                  </div>
                </div>
-->
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Register</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have an account ?</span>
                  <a href="login.php"s class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
    </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
<footer>
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/form-validation.js"></script>
<script src="assets/js/bt-maxLength.js"></script>
<script src="assets/js/custom_js.js"></script>  
</footer>

  
  <!-- endinject -->    
    </body>
</html>