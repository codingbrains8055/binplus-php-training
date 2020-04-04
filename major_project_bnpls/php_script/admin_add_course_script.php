<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['admin'])){
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
     extract($_POST);
    $ok = false;
    $course_content = $_FILES['course_content'];
    //file validation
    $extension = pathinfo($course_content['name'], PATHINFO_EXTENSION);
    print_r($extension); 
    if($extension == 'pdf' or $extension == 'PDF'){
        if($course_content['size'] < 5242880){
            $ok = 'true';
        }else{
            echo "file size should not be greater than 1 MB";
            $ok = false;
            $error_msg =  "file size should not be greater than 1 MB";
           header("location:../admin_edit_course.php?size_msg='{$error_msg}'&course_id={$course_id}");
        }
    }else{
        echo "file must be an PDF";
        $ok = false;
        $error_msg =  "File must be a PDF";
        header("location:../admin_edit_course.php?file_msg={$error_msg}&course_id={$course_id}");
    }
     $course_id = "CRS".rand(1000000,9999999);
     if($ok){
     $location = "course_content";
     $pname = $course_content['name'];
     move_uploaded_file($course_content['tmp_name'], "$location/$pname");
     $insert_query = "insert into courses (course_id, course_name, course_description, type, course_cost, course_content) values('$course_id','$course_name', '$course_description', '$course_type', '$course_cost', '$pname')";
     $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
     if($insert_query_result){
        echo "succcess";
        header('location:../admin_dashboard.php');
    }
    }
}else{
    header('location:../index.php');
}
?>