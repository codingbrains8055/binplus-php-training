<?php 
session_start();
if(isset($_SESSION['admin'])){
require('assets/includes/connection.php');


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
<?php include('assets/includes/admin_header.php')?>
</header>

<div class="container-fluid page-body-wrapper">
<?php include('assets/includes/admin_sidebar.php');?>   

<div class="main-panel">
<!--        <div class="row w-100">-->
            <div class="row justify-content-center">
<div class="container">
<div class="container-scroller">
 <div class="row justify-content-center">
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Add Course</h4>
                      <form class="forms-sample" action="php_script/admin_add_course_script.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-md-4 col-form-label">Course Name</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter course name" name="course_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-md-4 col-form-label">Course Description</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="course discription" data-kwimpalastatus="alive" data-kwimpalaid="1583681097290-3" name="course_description">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-md-4 col-form-label">Course Type</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter course type" name="course_type">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-md-4 col-form-label">Course Cost(<i class="mdi mdi-currency-inr"></i>)</label>
                          <div class="col-md-8">
                            <input type="number" class="form-control" id="exampleInputEmail2" placeholder="Enter cost of course" name="course_cost">
                          </div>
                        </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail3" class="col-md-4">Course Content</label>
                        <div class="col-md-8">
                      <input type="file" class="form-control" id="exampleInputEmail3" name="course_content">
                        </div>
                   <?php if(isset($_GET['file_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['file_msg'];?></span>
                  <?php  } ?>
                   <?php if(isset($_GET['size_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['size_msg'];?></span>
                  <?php  } ?>
                      </div>
                        <button type="submit" class="btn btn-success mr-2">Add</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
<?php }else{
    header('location:index.php');
}?>