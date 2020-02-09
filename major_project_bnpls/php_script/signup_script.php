<?php 
if(isset($_POST['email'])){
    $con  = mysqli_connect('localhost','root','Ani@8127','learning_adda');
    extract($_POST);
     date_default_timezone_set("Asia/Calcutta");
     $updated_at = date('Y-m-d H:i:s');
    list($usr, $domain) = explode('@',$email);
    $usr = rand(9999,1000)."_".$usr;
    
    $pass = md5($pass);
    $query = "insert into user (user_id, email, mobile, first_name, last_name, password, updated_at) values('$usr','$email', '$mobile', '$first_name', '$last_name', '$pass','$updated_at')";
    $query_result = mysqli_query($con, $query) or die(mysqli_error($con));
}else{ 
header('location:../signup.html');
     }
?>