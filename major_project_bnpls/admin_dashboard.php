<?php 
session_start();
if(isset($_SESSION['admin'])){
require('assets/includes/connection.php');
//count users
$users_query = "select id from user";
$user_query_result = mysqli_query($con, $users_query) or die(mysqli_error($con));
$users_count = mysqli_num_rows($user_query_result);
//count courses
$course_query = "select course_id from courses";
$course_query_result = mysqli_query($con, $course_query) or die(mysqli_error($con));
$course_count = mysqli_num_rows($course_query_result);
//taken course count
$taken_course_query = "select user_course_id from user_course";
$taken_course_query_result = mysqli_query($con, $taken_course_query) or die(mysqli_error($con));
$taken_course_count = mysqli_num_rows($taken_course_query_result);
//transaction count
$trans_query = "select user_course_id from user_course";
$trans_query_result = mysqli_query($con, $trans_query) or die(mysqli_error($con));
$trans_count = mysqli_num_rows($trans_query_result);
//task count
$task_query = "select user_course_id from user_course";
$task_query_result = mysqli_query($con, $task_query) or die(mysqli_error($con));
$task_count = mysqli_num_rows($task_query_result);
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
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light mr-3">
                      <i class="mdi mdi-account text-success icon-lg"></i>
                    </div>
                    <div class="wrapper">
                      <p class="card-text mb-0">Registered Users</p>
                      <div class="fluid-container">
                        <h3 class="card-title mb-0"><?php echo $users_count?></h3>
                      </div>
                    </div>
                  </div>
                    <a class="nav-link" href="admin_user_list.php"><button type="button" class="btn btn-light btn-block">View </button></a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light mr-3">
                      <i class="mdi mdi-book-open text-primary icon-lg"></i>
                    </div>
                    <div class="wrapper">
                      <p class="card-text mb-0">Available Courses</p>
                      <div class="fluid-container">
                        <h3 class="card-title mb-0"><?php echo $course_count?></h3>
                      </div>
                    </div>
                  </div>
                     <a class="nav-link" href="admin_course_list.php"><button type="button" class="btn btn-light btn-block">View </button></a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light mr-3">
                      <i class="mdi mdi-briefcase-check text-primary icon-lg"></i>
                    </div>
                    <div class="wrapper">
                      <p class="card-text mb-0">Available Tasks</p>
                      <div class="fluid-container">
                        <h3 class="card-title mb-0"><?php echo $task_count?></h3>
                      </div>
                    </div>
                  </div>
                     <a class="nav-link" href="admin_task_list.php"><button type="button" class="btn btn-light btn-block">View </button></a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light mr-3">
                      <i class="mdi mdi-book text-danger icon-lg"></i>
                    </div>
                    <div class="wrapper">
                      <p class="card-text mb-0">Taken Courses</p>
                      <div class="fluid-container">
                        <h3 class="card-title mb-0"><?php echo $taken_course_count?></h3>
                      </div>
                    </div>
                  </div>
                     <a class="nav-link" href="admin_taken_course_list.php"><button type="button" class="btn btn-light btn-block">View </button></a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light mr-3">
                      <i class="mdi mdi-currency-inr text-success icon-lg"></i>
                    </div>
                    <div class="wrapper">
                      <p class="card-text mb-0">Total Transactions</p>
                      <div class="fluid-container">
                        <h3 class="card-title mb-0"><?php echo $trans_count?></h3>
                      </div>
                    </div>
                  </div>
                    <a class="nav-link" href="admin_transaction_list.php"><button type="button" class="btn btn-light btn-block">View </button></a>
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