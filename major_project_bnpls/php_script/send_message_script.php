<?php 
session_start();
require('../assets/includes/connection.php');
extract($_GET);
print_r($_GET);
$insert_query = "insert into messages (sender_id, receiver_id, message_content) values ('{$_GET['sender_id']}', '{$_GET['receiver_id']}', '{$_GET['message_content']}')";
$insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
if($insert_query_result){
    echo "seccess";
}
?>