<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['user'])){
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
    $insert_query = "insert into user_course  (user_id, course_id) values ('{$_GET['user_id']}', '{$_GET['course_id']}')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    $update_cart_query = "update cart set status = 'taken', action_date = '$today' where user_id = '{$_GET['user_id']}' and course_id = '{$_GET['course_id']}'";
    $update_cart_query_result = mysqli_query($con, $update_cart_query) or die(mysqli_error($con));
//give some experience porint
    $get_xp_query = "select experience_point from user where user_id = '{$_GET['user_id']}'";
    $get_xp_query_result = mysqli_query($con, $get_xp_query) or die(mysqli_error($con));
    $old_xp = mysqli_fetch_array($get_xp_query_result);
    $old_xp = $old_xp['experience_point'];
    $xp = $old_xp + 5;
    $xp_query = "update user set experience_point = '$xp' where user_id = '{$_GET['user_id']}'";
    
    if($update_cart_query_result){
        echo "success";
        $xp_query_result = mysqli_query($con, $xp_query) or die(mysqli_error($con));
        header('location:../cart.php');
    }else{
        echo "some error occured";
    }
}else{
    header('location:../index.php');
}
?> 