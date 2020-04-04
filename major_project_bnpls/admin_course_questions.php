<?php 
session_start();
if(isset($_SESSION['admin'])){
require('assets/includes/connection.php');
//count users
$course_query = "select * from course_questions where course_id= '{$_GET['course_id']}'";
$course_query_result = mysqli_query($con, $course_query) or die(mysqli_error($con));
$print = mysqli_fetch_array($course_query_result);
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
                          <th>Question Id</th>
                          <th>Question</th>
                          <th>Option #1</th>
                          <th>Option #2</th>
                          <th>Option #3</th>
                          <th>Option #4</th>
                          <th>Answer</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php $count = 1; while($print = mysqli_fetch_array($course_query_result)){
                        if($print['status'] != 0){
                        ?>
                      <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $print['course_id']; ?></td>
                          <td><?php echo $print['question_id']; ?></td>
                          <td><?php echo $print['question']; ?></td>
                          <td><?php echo $print['option_1']; ?></td>
                          <td><?php echo $print['option_2']; ?></td>
                          <td><?php echo $print['option_3']; ?></td>
                          <td><?php echo $print['option_4']; ?></td>
                          <td><?php echo $print['ans']; ?></td>
                          <td><a class="link" href="php_script/admin_delete_question_script.php?question_id=<?php echo $print['question_id'];?>"><button     class="btn">Delete<i class="mdi mdi-delete"></i></button></a>
                          </td>
                      </tr> 
<?php $count++; }} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    <center>
        <a href="admin_add_question.php?course_id=<?php echo $_GET['course_id']; ?>"><button class="btn btn-primary">Add A Question</button></a>  
    </center>
   
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