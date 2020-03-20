<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['admin'])){
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
     extract($_POST);
    $task_id = "TSK".rand(1000,9999);
     $insert_query = "insert into task (task_id, task_name, task_detail, task_type, xp) values('$task_id', '$task_name', '$task_detail', '$task_type', '$xp')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    if($insert_query_result){
        echo "succcess";
        header('location:../admin_dashboard.php');
    }
}else{
    header('location:../index.php');
}
?>