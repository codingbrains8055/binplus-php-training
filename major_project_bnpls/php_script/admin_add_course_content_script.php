<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['admin'])){
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
     extract($_POST);
     $insert_query = "insert into course_content (course_id, no_of_chapters) values('$course_id', '$no_of_chapters')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    if($insert_query_result){
        echo "success";
        header('location:../admin_dashboard.php');
    }
}else{
    header('location:../index.php');
}
?>