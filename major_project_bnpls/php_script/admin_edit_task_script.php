<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['admin'])){
    extract($_POST);
    $update_query = "update task set task_name = '$task_name', task_detail = '$task_detail', task_type = '$task_type', xp = '$xp', status = '$status' where task_id = '$task_id'";
    $update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
    if($update_query_result){
        header('location:../admin_task_list.php');
    }
}else{
    header('location:index.php');
}
?>