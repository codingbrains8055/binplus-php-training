<?php 
session_start();
if(isset($_SESSION['user'])){
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");
    $today = date('Y-m-d H-i-s');
require('../assets/includes/connection.php');
$info_query = "select password from user where email = '{$_SESSION['user']}'";
$info_query_result = mysqli_query($con, $info_query) or die(mysqli_error($con));
$info = mysqli_fetch_array($info_query_result);
$DBpass = $info['password']; 
$pass = md5($pass);
$new_pass = md5($new_pass);
$conf_pass = md5($conf_pass);
    if($DBpass == $pass){
        if($new_pass == $conf_pass){
            $update_query = "update user set password = '{$new_pass}', updated_at = '$today' where email = '{$_SESSION['user']}'";
            $update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
            if($info_query_result){
                echo "success";
                header('location:../index.php');
            }
        }else{
            echo "password and confirm do not match";
        }
    }else{
        echo $pass." ".$DBpass;
        echo "wrong password";
    }
}else {
    header('location:../login.php');
}
?>