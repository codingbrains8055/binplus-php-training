<?php session_start();
if(isset($_SESSION['user'])){
require('assets/includes/connection.php');

$fetch_course_query = "select * from courses";
$fetch_course_query_result = mysqli_query($con, $fetch_course_query) or die(mysqli_error($con));
if(isset($_SESSION['user'])){
$fetch_user_info = "select user_id from user where email = '{$_SESSION['user']}'";
$fetch_user_info_result = mysqli_query($con, $fetch_user_info) or die(mysqli_error($con));
$user = mysqli_fetch_array($fetch_user_info_result);  
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
<div class="container">
 <div class="container-fluid">
     <div class="row justify-content-center">
        <?php while($print = mysqli_fetch_array($fetch_course_query_result)){
         if($print['status'] == "active"){
         ?>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $print['course_name'];?></h5>
    <p class="card-text"><?php echo $print['course_description'];?></p>
      <div><?php if($print['course_cost'] == 0){ echo "Free";}else{?> <i class="mdi mdi-currency-inr"></i><?php echo $print['course_cost'];}?></div>
<?php 
 $cart_query = "select status from cart where user_id = '{$user['user_id']}' and course_id = '{$print['course_id']}'";
 $cart_query_result = mysqli_query($con, $cart_query) or die(mysqli_error($con));
 $cart_query_result_array = mysqli_fetch_array($cart_query_result);
if(mysqli_num_rows($cart_query_result) > 0){
  if($cart_query_result_array['status'] == "removed"){ ?>
  <a href="php_script/add_to_cart_script.php?course_id=<?php echo $print['course_id'];?>&user_id=<?php echo $user['user_id'];?>"><button type="button" class="btn btn-inverse-primary btn-rounded btn-fw"><i class="mdi mdi-cart"></i>Add to cart</button></a>   
<?php }else if($cart_query_result_array['status'] == "added_to_cart"){ ?>
    <a href="cart.php"><button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Go to cart</button></a>
      <?php }else if($cart_query_result_array['status'] == "taken"){ ?>
       <a href="#"><button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Continue<i class="mdi mdi-arrow-right-circle"></i></button></a>
<?php } }else{ ?>
  <a href="php_script/add_to_cart_script.php?course_id=<?php echo $print['course_id'];?>&user_id=<?php echo $user['user_id'];?>"><button type="button" class="btn btn-inverse-primary btn-rounded btn-fw"><i class="mdi mdi-cart"></i>Add to cart</button></a>  
<?php }} ?>
  </div>
</div>
</div>
 <?php }?>       
     </div>    
    </div>
    </div>
<footer>
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/form-validation.js"></script>
<script src="assets/js/bt-maxLength.js"></script>
<script src="assets/js/custom_js.js"></script>  
</footer>
    </body>
</html>
<?php }else{
    header('location:index.php');
}?>