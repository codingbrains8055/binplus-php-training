<?php session_start();
if(isset($_SESSION['admin'])){
require('assets/includes/connection.php');
$task_info_query = "select * from task where task_id =  '{$_GET['task_id']}'";
$task_info_query_result = mysqli_query($con, $task_info_query) or die(mysqli_error($con));
$task_info_query_result_array = mysqli_fetch_array($task_info_query_result);
$info = $task_info_query_result_array;
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
<?php include ('assets/includes/header.php'); ?>    
</header>
<div class="container">
    <div class="container-scroller">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Task</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <br>
                  <form class="forms-sample" action="php_script/admin_edit_task_script.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Task Name</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="task_name" value="<?php echo $info['task_name']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Task Description</label>
                      <input type="text" class="form-control" id="exampleInputName1"   name="task_detail" value="<?php echo $info['task_detail']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Task Type</label>
                      <input type="text" class="form-control" id="exampleInputEmail3"   name="task_type" value="<?php echo $info['task_type']?>" >
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">XP</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="xp" value="<?php echo $info['xp']?>" >
                      </div>
                      <div class="form-group">
                        <label>Task Status</label>
                        <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" tabindex="-1" aria-hidden="true" name="status">
                          <option value="active">Active</option>
                          <option value="inactive">Blocked</option>
                        </select>
                      </div>
                <input type="hidden" class="form-control" id="exampleInputEmail3" name="task_id" value="<?php echo $info['task_id']?>">
                   <button type="submit" class="btn btn-success mr-2">Update</button>
                  </form>                 
                </div>
              </div>
                </div>
            </div>
</div>
    </div>
    </div>

<?php include ('assets/includes/footer1.php')?>
</body>
</html>
<?php }else{
    header('location:index.php');
}?>