<?php 
session_start();
require('assets/includes/connection.php');
if(isset($_SESSION['user'])){
$fetch_user_info = "select user_id from user where email = '{$_SESSION['user']}'";
$fetch_user_info_result = mysqli_query($con, $fetch_user_info) or die(mysqli_error($con));
$user = mysqli_fetch_array($fetch_user_info_result);
$user = $user['user_id'];
$message_query = "select * from messages where user_id = '$user'";
$message_query_result = mysqli_query($con, $message_query) or die(mysqli_error($con));
}
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
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
<div class="card-body">
									<h5 class="card-title">Notice</h5>
									<ul class="bullet-line-list">
    <?php while($print = mysqli_fetch_array($message_query_result)){ ?>
										<li>
											<p class="mb-0"><?php echo $print['msg']?></p>
											<p class="text-muted">
												<i class="mdi mdi-clock"></i>
												<?php echo $print['received_at'];?>
											</p>
										</li>
                            <?php } ?>
									</ul>
								</div>

        
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
      
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
 </div> 
            </div>
        </div>
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
       
    </div>     
    
  
<footer>
<?php include('assets/includes/footer1.php')?>    
</footer>
    </body>
</html>