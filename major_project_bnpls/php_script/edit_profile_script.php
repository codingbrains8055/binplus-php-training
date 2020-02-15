<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['user'])){
 extract($_POST);
 date_default_timezone_set("Asia/Calcutta");
 $updated_at = date('Y-m-d H:i:s');
    $update_query = "update user set first_name = '{$_POST['firstname']}', last_name = '{$_POST['lastname']}', username = '{$_POST['username']}', mobile = '{$_POST['mobile']}'";
 $update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
    if($update_query_result){
        header('location:../manage_account.php');
    }else{
        header('location:../edit_profile.php');
    }
}else{
    header('location:../index.php');
}
?>