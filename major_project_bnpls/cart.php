<?php session_start();
require('assets/includes/connection.php');
if(isset($_SESSION['user'])){
    $paid = false;
$fetch_user_info = "select user_id from user where email = '{$_SESSION['user']}'";
$fetch_user_info_result = mysqli_query($con, $fetch_user_info) or die(mysqli_error($con));
$user = mysqli_fetch_array($fetch_user_info_result);
$fetch_course_query = "select * from courses  RIGHT OUTER JOIN cart ON courses.course_id = cart.course_id  where cart.status = 'added_to_cart' and cart.user_id = '{$user['user_id']}'";
$fetch_course_query_result = mysqli_query($con, $fetch_course_query) or die(mysqli_error($con));

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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Your Cart</h4>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Sr. No.</th>
                        <th>Course Name</th>
                          <th>Course Cost(<i class="mdi mdi-currency-inr"></i>)</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php 
if(mysqli_num_rows($fetch_course_query_result) > 0){
    $count = 1;
  while($print = mysqli_fetch_array($fetch_course_query_result)){ $paid = false;?>
                        <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $print['course_name']?></td>
                        <td><?php echo $print['course_cost'];?></td>                            
<!--   check if  paid for course start -->
    <?php 
        $trans_query = "select course_transaction_id from  course_transaction where user_id = '{$user['user_id']}' and course_id = '{$print['course_id']}'";
        $trans_query_result = mysqli_query($con, $trans_query) or die(mysqli_error($con));
        if(mysqli_num_rows($trans_query_result) > 0){
            $paid = true;
        }
    ?>
<!--   check if  paid for course end -->
                            
                        <td>
    <?php if($paid){ ?>
                            <span><a href="php_script/take_course_script.php?course_id=<?php echo $print['course_id'];?>&user_id=<?php echo $user['user_id'];?>"><button type="button" class="btn btn-dark btn-rounded btn-fw">Take this course</button></a></span>    
   <?php }else{ ?>
                              <span><a href="php_script/course_payment_script.php?amount=<?php echo $print['course_cost'];?>&course_id=<?php echo $print['course_id'];?>&user_id=<?php echo $user['user_id'];?>"><button type="button" class="btn btn-dark btn-rounded btn-fw">Pay</button></a></span>   
  <?php  } if(!$paid){ ?>

                            <span><a href="php_script/remove_from_cart_script.php?course_id=<?php echo $print['course_id'];?>&user_id=<?php echo $user['user_id'];?>"><button type="button" class="btn btn-dark btn-rounded btn-fw">Remove<i class="mdi mdi-close-circle"></i></button></a></span>
<?php } ?>
                        </td>
                      </tr>    
 <?php $count++;} }else{ ?>
    <tr><td>
    <div class="row grid-margin">
                    <div class="col-12">
                      <div class="alert alert-warning" role="alert">
                          <strong>Oops!</strong> Looks like you don't have anything in cart at this moment.
                      </div>
                    </div>
                  </div>
       </td> </tr>
<?php }                      
?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
 </div>   
    </div>
<footer>
<?php include('assets/includes/footer1.php')?>    
</footer>
    </body>
</html>
<?php }else{
header('location:index.php');
} ?>