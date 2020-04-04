<?php session_start();
if(isset($_SESSION['user'])){
require('assets/includes/connection.php');
$userinfo_query = "select * from user where email =  '{$_SESSION['user']}'";
$userinfo_query_result = mysqli_query($con, $userinfo_query) or die(mysqli_error($con));
$userinfo_query_result_array = mysqli_fetch_array($userinfo_query_result);
$info = $userinfo_query_result_array;
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit-profile</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/morris.js/morris.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/custom_style.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<header>
<?php include ('assets/includes/header.php'); ?>    
</header>
    
<div class="container-fluid page-body-wrapper">
<?php include('assets/includes/sidebar.php');?>   

<div class="main-panel">
<!--        <div class="row w-100">-->
            <div class="row justify-content-center">
<div class="container">
    <div class="container-scroller">
    
            <div class="row justify-content-center">
                <div class="col-md-6">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Profile</h4>
                  <br>
                  <form class="forms-sample" action="php_script/edit_profile_script.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="firstname" value="<?php echo $info['first_name']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" name="lastname" value="<?php echo $info['last_name']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Username</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Email" name="username" value="<?php echo $info['username']?>" >
                      </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Mobile no</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="mobile no" name="mobile" value="<?php echo $info['mobile']?>">
                    </div>
                   <button type="submit" class="btn btn-primary mr-2">Update</button>
                  </form>                 
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