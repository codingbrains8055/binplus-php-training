<?php 
require('../assets/includes/connection.php');
if(isset($_POST['email']) and isset($_POST['mobile']) and isset($_POST['pass']) and isset($_POST['conf_pass'])){
    extract($_POST);
     date_default_timezone_set("Asia/Calcutta");
     $updated_at = date('Y-m-d H:i:s');
    list($usr, $domain) = explode('@',$email);
    $usr = rand(9999,1000)."_".$usr;
    echo $pass." ".$conf_pass;
    
    //chack for valid password
    if($pass === $conf_pass){
        echo "pass match";
        if(strlen($pass) >= 8){
            echo "pass length ok";
            if(preg_match("/(?=.*[A-Za-z])(?=.*\d)(?=.*[@!#*%?&])[A-Za-z\d@$!%*#?&]{8,}/", $pass) and strtoupper($pass)){
                echo "pass is ok";
            }else{
                echo "pass is not ok";
            }
        }else{
            echo "pass lenght not ok";
        }
    }else{
        echo "passwords do not match";
    }
    $pass = md5($pass);
    $query = "insert into user (user_id, email, mobile, first_name, last_name, username, password, updated_at) values('$usr','$email', '$mobile', '$first_name', '$last_name','$username', '$pass','$updated_at')";
    $query_result = mysqli_query($con, $query) or die(mysqli_error($con));
    if($query_result){
        echo "registration successful";
        //header('location:../login.php');
    }
}else{ 
    echo "error";
header('location:../signup.php');
     }
?>