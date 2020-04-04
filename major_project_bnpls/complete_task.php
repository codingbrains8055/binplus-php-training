<?php 
session_start();
require('assets/includes/connection.php');
if(isset($_SESSION['user'])){
$task_query = "select * from task where task_id =  '{$_GET['task_id']}'";
$task_query_result = mysqli_query($con, $task_query) or die(mysqli_error($con));
$task_query_result_array = mysqli_fetch_array($task_query_result);
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
<link rel="stylesheet" href="assets/vendors/codemirror/codemirror.css">
<link rel="stylesheet" href="assets/vendors/codemirror/ambiance.css">
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
    
 <div class="card-body">
                  <h4 class="card-title">Complete Your Task</h4>
                  <div class="row">
                    <div class="col-md-12 grid-margin" data-children-count="2">
                      <h5 class="card-subtitle">Task: <span style="color:red"><?php echo $task_query_result_array['task_detail']; ?></span></h5>
<textarea rows="10" cols="50" name="code-editable" id="code-editable" style="display: none;">
// Your code goes here
</textarea>
<form action="php_script/submit_task_script.php" method="post">
    <input type="hidden" name="task_xp" value="<?php echo $task_query_result_array['xp'];?>">
   <input type="hidden" name="task_id" value="<?php echo $task_query_result_array['task_id'];?>">
<center><button class="btn btn-primary">Submit</button></center>
    </form>
    </div>
  </div>
</div>     

      
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
    </div>
    </div> 
            </div>
        </div>
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
       
    </div>    
   
    </body>
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/ace-builds/src-min/ace.js"></script>
<script src="assets/vendors/codemirror/codemirror.js"></script>
<script src="assets/vendors/codemirror/javascript.js"></script>
<script src="assets/vendors/codemirror/shell.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/codeEditor.js"></script>
<script src="assets/js/custom_js.js"></script>

</html>
<?php } else{
    header('location:index.php');
} ?>