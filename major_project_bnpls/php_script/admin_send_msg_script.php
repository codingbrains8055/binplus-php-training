<?php 
session_start();
if(isset($_SESSION['admin'])){
    require('../assets/includes/connection.php');
    extract($_POST);
     date_default_timezone_set("Asia/Calcutta");
     $today = date('Y-m-d H:i:s');
    $insert_query = "insert into messages (user_id, msg, received_at) values ('$user_id', '$code_editable', '$today')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    if($insert_query_result){
        header('location:../admin_user_list.php');
    }
}else{
    header('location:../index.php');
}
?>