<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['user'])){
      extract($_POST);
      $fetch_xp = "select experience_point from user where email = '{$_SESSION['user']}'";
      $fetch_xp_result = mysqli_query($con, $fetch_xp) or die(mysqli_error($con));
      $xp = mysqli_fetch_array($fetch_xp_result);
      $xp = $xp['experience_point'];
      $xp = $xp + $task_xp;
    $user_id_query = "select user_id from user where email = '{$_SESSION['user']}'";
    $user_id_query_result = mysqli_query($con, $user_id_query) or die(mysqli_error($con));
    $user_id = mysqli_fetch_array($user_id_query_result);
    $user_id = $user_id['user_id'];
      $update_user_task = "update user_task set is_submitted = '1' where user_id = '$user_id' and task_id = '$task_id'";
    $update_user_task_result = mysqli_query($con, $update_user_task) or die(mysqli_error($con));
      $update_query = "update user set experience_point = '$xp' where email = '{$_SESSION['user']}'";
      $update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
      if($update_query_result and $update_user_task_result){
          header('location:../dashboard.php');
      }else{
          echo "error";
      }
}else{
    header('location:../index.php');
}
?>  