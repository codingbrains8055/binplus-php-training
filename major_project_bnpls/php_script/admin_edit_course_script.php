<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['admin'])){
    extract($_POST);
    $update_query = "update courses set course_name = '$course_name', course_description = '$course_desc', type = '$course_type', course_cost = '$course_cost', status = '$course_status' where course_id = '$course_id'";
    $update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
    if($update_query_result){
        header('location:../admin_course_list.php');
    }
    
}else{
    header('location:index.php');
}
?>