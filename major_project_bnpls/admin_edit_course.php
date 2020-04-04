<?php 
session_start();
if(isset($_SESSION['admin'])){
require('assets/includes/connection.php');
$course_info_query = "select * from courses where course_id =  '{$_GET['course_id']}'";
$course_info_query_result = mysqli_query($con, $course_info_query) or die(mysqli_error($con));
$course_info_query_result_array = mysqli_fetch_array($course_info_query_result);
$info = $course_info_query_result_array;
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
<?php include ('assets/includes/admin_header.php'); ?>    
</header>
<div class="container-fluid page-body-wrapper">
<?php include('assets/includes/admin_sidebar.php');?>   

<div class="main-panel">
<!--        <div class="row w-100">-->
            <div class="row justify-content-center">
<div class="container">
    <div class="container-scroller">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Course</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <br>
                  <form class="forms-sample" action="php_script/admin_edit_course_script.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Course Name</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="course_name" value="<?php echo $info['course_name']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Course Description</label>
                      <input type="text" class="form-control" id="exampleInputName1"   name="course_desc" value="<?php echo $info['course_description']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Course Type</label>
                      <input type="text" class="form-control" id="exampleInputEmail3"  name="course_type" value="<?php echo $info['type']?>" >
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Course Cost(<i class="mdi mdi-currency-inr"></i>)</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="course_cost" value="<?php echo $info['course_cost']?>" >
                      </div>
                      <div class="form-group">
                        <label>Course Status</label>
                        <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" tabindex="-1" aria-hidden="true" name="course_status">
                          <option value="active">Active</option>
                          <option value="not_active">Blocked</option>
                        </select>
                      </div>
                      <input type="hidden" name="course_id" value="<?php echo $info['course_id'];?>">
                      <button type="submit" class="btn btn-success mr-2">Update</button>
                  </form>  
                  <br>
                   <h4 class="card-title">Upload Course Content</h4>
                  <form class="forms-sample" action="php_script/admin_upload_course_content_script.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail3">Course Content</label>
                      <input type="file" class="form-control" id="exampleInputEmail3" name="course_content" value="<?php echo $info['course_content'];?>" >
                   <?php if(isset($_GET['file_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['file_msg'];?></span>
                  <?php  } ?>
                   <?php if(isset($_GET['size_msg'])){ ?>
                      <span class="errormsg"><?php echo $_GET['size_msg'];?></span>
                  <?php  } ?>
                      </div>
                      <input type="hidden" name="course_id" value="<?php echo $info['course_id'];?>">
                      <button type="submit" class="btn btn-success mr-2">Upload</button>
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