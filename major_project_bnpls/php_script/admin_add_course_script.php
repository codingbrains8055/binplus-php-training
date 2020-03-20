<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['admin'])){
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
     extract($_POST);
    $course_id = "CRS".rand(1000000,9999999);
     $insert_query = "insert into courses (course_id, course_name, course_description, type, course_cost) values('$course_id','$course_name', '$course_description', '$course_type', '$course_cost')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    if($insert_query_result){
        echo "succcess";
        header('location:../admin_dashboard.php');
    }
}else{
    header('location:../index.php');
}
?>