<?php 
require('../assets/includes/connection.php');
if(isset($_POST['email']) and isset($_POST['password'])){
    extract($_POST);
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
    }
    }else{
        echo "user not found";
    }
}else{
header('location:../login.php');
}
?>