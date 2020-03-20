<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['admin'])){
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
    if($_GET['action'] == 'block'){
    $block_query = "update user set status = 'blocked', updated_at = '$today' where user_id = '{$_GET['user_id']}'";
    $block_query_result = mysqli_query($con, $block_query) or die(mysqli_error($con));
    if($block_query_result){
        header('location:../admin_user_list.php');
    }
    }else if($_GET['action'] == 'activate'){
    $active_query = "update user set status = 'active', updated_at = '$today' where user_id = '{$_GET['user_id']}'";
    $active_query_result = mysqli_query($con, $active_query) or die(mysqli_error($con));
    if($active_query_result){
        header('location:../admin_user_list.php');
    }
    }
}else{
    header('location:index.php');
}
?>