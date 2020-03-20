<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['user'])){
    $insert_query = "insert into user_task (task_id, user_id) values('{$_GET['task_id']}', '{$_GET['user_id']}')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    if($insert_query_result){
        echo "success";
        header('location:../task.php');
    }else{
        echo "some error occured";
    }
}else{
    header('location:../index.php');
}
?>