<?php 
session_start();
if(isset($_SESSION['admin'])){
require('assets/includes/connection.php');
//count users
$course_query = "select * from courses";
$course_query_result = mysqli_query($con, $course_query) or die(mysqli_error($con));
//count courses
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
<link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
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
 
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>Sr. #</th>
                          <th>Course Id</th>
                          <th>Course Name</th>
                          <th>Course Type</th>
                          <th>Course Cost(<i class="mdi mdi-currency-inr"></i>)</th>
                          <th>Course Content</th>
                          <th>Status</th>
                          <th>Course Questions</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
<?php $count = 1; while($print = mysqli_fetch_array($course_query_result)){?>
                      <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $print['course_id']; ?></td>
                          <td><?php echo $print['course_name']; ?></td>
                          <td><?php echo $print['type']; ?></td>
                          <td><?php if($print['course_cost'] == 0){ echo "Free";}else{echo $print['course_cost'];} ?></td>
                          <td><?php echo $print['course_content'];?></td>
                          <td><?php echo $print['status']; ?></td>
                          <td><a class="link" href="admin_course_questions.php?course_id=<?php echo $print['course_id'];?>"><button class="btn">View<i class="mdi mdi-eye"></i></button></a></td>
                          <td>
                            <a href="admin_edit_course.php?course_id=<?php echo $print['course_id'];?>"><button class="btn"><i class="mdi mdi-pen"></i>Edit</button></a>
                          </td>
                      </tr> 
<?php $count++;} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
 
        <!-- partial -->
   
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


    </body>

</html>
<?php }else{
    header('location:index.php');
}?>