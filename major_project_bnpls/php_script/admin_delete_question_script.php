<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['admin'])){ ?>
<script> window.alert("hii");</script>
<?php
    $update_query = "update course_questions set status = '0' where question_id='{$_GET['question_id']}'";
    $update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
    if($update_query_result){
        header('location:../admin_course_list.php');
    }
}else{
    header('location:../index.php');
}
?>