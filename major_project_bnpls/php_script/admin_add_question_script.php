<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['admin'])){
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
     extract($_POST);
     $question_id = "QS".rand(10000,99999);
     $insert_query = "insert into course_questions (course_id, question_id, question, option_1, option_2, option_3, option_4, ans) values('$course_id', '$question_id', '$question','$option_1', '$option_2','$option_3','$option_4','$ans')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    if($insert_query_result){
        echo "succcess";
        header("location:../admin_course_questions.php?course_id=$course_id");
    }
}else{
    header('location:../index.php');
}
?>