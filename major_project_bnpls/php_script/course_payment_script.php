<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['user'])){
    $transaction_id = rand(10000, 999999).rand(10000, 99999);
    $insert_query = "insert into course_transaction (course_transaction_id, user_id, course_id, amount) values ($transaction_id, '{$_GET['user_id']}', '{$_GET['course_id']}', '{$_GET['amount']}')";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    if(insert_query_result){
        echo "success";
        header('location:../cart.php');
    }else{
        echo "trasaction error";
        $error_msg = "trasaction failed";
        header("location:../cart.php?trans_err_msg=$error_msg");
    }
}else{
    header('location:../index.php');
}
?>