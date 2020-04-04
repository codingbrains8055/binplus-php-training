<?php session_start();
require('assets/includes/connection.php');
if(isset($_SESSION['user'])){
    $user_query = "select user_id from user where email = '{$_SESSION['user']}'";
    $user_query_result = mysqli_query($con, $user_query) or die(mysqli_error($con));
    $user_id = mysqli_fetch_array($user_query_result);
    $user_id = $user_id['user_id'];
    $task_query = "select * from task";
    $task_query_result = mysqli_query($con, $task_query) or die(mysqli_error($con));   
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
<link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom_style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<header>
 <?php 
   include('assets/includes/header.php');
?>  
</header>
    
<div class="container-fluid page-body-wrapper">
<?php include('assets/includes/sidebar.php');?>   

<div class="main-panel">
<!--        <div class="row w-100">-->
            <div class="row justify-content-center">
<div class="container">
 <div class="container-fluid">
 
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>Sr. #</th>
                          <th>Task Name</th>
                          <th>Dessription</th>
                          <th>Type</th>
                          <th>Point</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
<?php $count = 1; while($print = mysqli_fetch_array($task_query_result)){
                        $user_task_query = "select user_task_id from user_task where user_id = '$user_id' and task_id = '{$print['task_id']}'";
                        $user_task_query_result = mysqli_query($con, $user_task_query) or die(mysqli_error($con));
                        if(mysqli_num_rows($user_task_query_result) < 0){
                                                                                              
                        ?>
                      <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $print['task_name']; ?></td>
                          <td><?php echo $print['task_detail']; ?></td>
                          <td><?php echo $print['task_type']; ?></td>
                          <td><?php echo $print['xp']; ?></td>
                          <td>
                            <a href="php_script/take_task_script.php?task_id=<?php echo $print['task_id'];?>&user_id=<?php echo $user_id; ?>"><button class="btn btn-success">Take<i class="mdi mdi-arrow-right-bold-circle"></i></button></a>
                      </tr> 
<?php $count++; } } ?>
                    </tbody>
                  </table>
                    
                    
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
    </body>
</html> 
<?php }else{
    header('location:index.php');
} ?>