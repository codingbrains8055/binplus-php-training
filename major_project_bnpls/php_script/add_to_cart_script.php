<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['user'])){
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
    $cart_query = "select cart_id from cart where course_id = '{$_GET['course_id']}' and user_id = '{$_GET['user_id']}' and status = 'removed'";
    $cart_query_result = mysqli_query($con, $cart_query) or die(mysqli_error($con));
    if(mysqli_num_rows($cart_query_result) > 0){
      $update_cart_query = "update cart set status = 'added_to_cart' , action_date = '$today' where course_id = '{$_GET['course_id']}' and user_id = '{$_GET['user_id']}'";
      $update_cart_query_result = mysqli_query($con, $update_cart_query) or die(mysqli_error($con));
    if($update_cart_query_result){
        header('location:../courses.php');       
      }
    }else{
    $insert_query = "insert into cart (user_id, course_id) values ('{$_GET['user_id']}', '{$_GET['course_id']}')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    if($insert_query_result){
        header('location:../courses.php');       
      }
    }
}else{
    header('location:../index.php');
}
?>