<?php 
session_start();
if(isset($_SESSION['admin'])){
require('assets/includes/connection.php');
//count users
$task_query = "select * from task";
$task_query_result = mysqli_query($con, $task_query) or die(mysqli_error($con));
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
    
    
<div class="container">
<div class="container-scroller">
 
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>Sr. #</th>
                          <th>Task Id</th>
                          <th>Task Name</th>
                          <th>Task Type</th>
                          <th>XP</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
<?php $count = 1; while($print = mysqli_fetch_array($task_query_result)){?>
                      <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $print['task_id']; ?></td>
                          <td><?php echo $print['task_name']; ?></td>
                          <td><?php echo $print['task_type']; ?></td>
                          <td><?php echo $print['xp'];?></td>
                          <td><?php echo $print['status']; ?></td>
                          <td>
                            <a href="admin_edit_task.php?task_id=<?php echo $print['task_id'];?>"><button class="btn"><i class="mdi mdi-pen"></i>Edit</button></a>
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