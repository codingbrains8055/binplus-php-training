<?php 
require('../assets/includes/connection.php');
if(isset($_POST['email']) and isset($_POST['password'])){
    extract($_POST);
    $fetch_query = "select username, password from admin where username = '$email'";
    $fetch_query_result = mysqli_query($con, $fetch_query) or die(mysqli_error($con));
    if(mysqli_num_rows($fetch_query_result) > 0){
    $result = mysqli_fetch_array($fetch_query_result);
    $DBpass = $result['password'];
    if($password == $DBpass){
        echo "success";
        session_start();
        $_SESSION['admin'] = $email;
        header('location:../admin_dashboard.php');
    }else{
        echo "wrong password";
        $error_msg = "You entered wrong password";
        header("location:../admin_login.php?pass_msg=$error_msg");
    }
    }else{
        echo "user not found";
        $error_msg = "this email is not registered";
        header("location:../admin_login.php?email_msg=$error_msg");
    }
}else{
header('location:../admin_login.php');
}
?>