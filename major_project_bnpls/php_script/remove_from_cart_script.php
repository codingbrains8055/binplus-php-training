<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['user'])){
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
    $update_cart_query = "update cart set status = 'removed', action_date = '$today' where user_id = '{$_GET['user_id']}' and course_id = '{$_GET['course_id']}'";
    $update_cart_query_result = mysqli_query($con, $update_cart_query) or die(mysqli_error($con));
    if($update_cart_query_result){
        header('location:../cart.php');
    }
}else{
    header('location:../index.php');
}
?> 