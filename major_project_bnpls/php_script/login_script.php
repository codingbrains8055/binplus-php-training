<?php 
require('../assets/includes/connection.php');
if(isset($_POST['email']) and isset($_POST['password'])){
    extract($_POST);
    $error_msg = '';
    $fetch_query = "select email, password from user where email = '$email'";
    $fetch_query_result = mysqli_query($con, $fetch_query) or die(mysqli_error($con));
    if(mysqli_num_rows($fetch_query_result) > 0){
    $result = mysqli_fetch_array($fetch_query_result);
    $DBpass = $result['password'];
    if(md5($password) == $DBpass){
        echo "success";
        session_start();
        $_SESSION['user'] = $email;
        header('location:../index.php');
    }else{
        echo "wrong password";
        $error_msg = "You entered wrong password";
        header("location:../login.php?pass_msg=$error_msg");
    }
    }else{
        echo "user not found";
        $error_msg = "this email is not registered";
        header("location:../login.php?email_msg=$error_msg");
    }
}else{
header('location:../login.php');
}
?>