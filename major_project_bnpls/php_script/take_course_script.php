<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['user'])){
    $insert_query = "insert into user_course  (user_id, course_id) values ('{$_GET['user_id']}', '{$_GET['course_id']}')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
}else{
    header('location:../index.php');
}
?>