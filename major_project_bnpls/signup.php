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
              <form action="php_script/signup_script.php" method="post">
                  
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="E-mail" name="email">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <input type="number" class="form-control" placeholder="Mobile Number" name="mobile">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
                    </div>
                  </div>
                </div>                  
                
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
                    </div>
                  </div>
                </div>                  
                  
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" name="pass" id="password">
                    <div class="input-group-append">
                      <span class="input-group-text" id="checkit"><i class="mdi mdi-check-circle-outline"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="conf_pass" id="conf_password" onBlur="matchpasswords()">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
                    </div>
                  </div>
                </div>
                  <div class="input-group">
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
                  <span class="text-small font-weight-semibold">Already have and account ?</span>
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
<?php include('assets/includes/footer1.php')?>    
</footer>

  
  <!-- endinject -->    
    </body>
</html>