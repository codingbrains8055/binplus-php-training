<?php 
require('../assets/includes/connection.php');
if($_POST['email'] != '' and  $_POST['mobile'] != '' and  $_POST['pass'] != '' and  $_POST['conf_pass'] != '' ) {
    extract($_POST);
    $pass_ok = false;
    $img_ok = false;
    $email_ok = false;
    $profile_pic = $_FILES['profile_pic'];
     date_default_timezone_set("Asia/Calcutta");
     $updated_at = date('Y-m-d H:i:s');
    list($usr, $domain) = explode('@',$email);
    $usr = rand(9999,1000)."_".$usr;

//email availability
    $query = "select * from user where email = '$email'";
    $query_result = mysqli_query($con, $query) or die(mysqli_error($con));
    if(mysqli_num_rows($query_result) < 0){
        echo "email available";
        $email_ok = true;
    }else{
        echo "email is already registered";
        $email_ok = false;
        $error_msg =  "Email is already registered";
        header("location:../signup.php?email_msg='{$error_msg}'");
    }
    
    
    //chack for valid password
    if($pass === $conf_pass){
        echo "pass match";
        if(strlen($pass) >= 8){
            echo "pass length ok";
            if(preg_match("/(?=.*[A-Za-z])(?=.*\d)(?=.*[@!#*%?&])[A-Za-z\d@$!%*#?&]{8,}/", $pass) and strtoupper($pass)){
                echo "pass is ok";
                $pass_ok = true;
            }else{
                echo "pass is not ok";
                $pass_ok = false;
            $error_msg =  "passowrd must contain An upper case alphabet, a number and a specila sybmol";
           header("location:../signup.php?pass_msg='{$error_msg}'");
            }
        }else{
            echo "pass lenght not ok";
            $pass_ok = false;
            $error_msg =  "password lenght should be greater than 8 charecters";
           header("location:../signup.php?pass_lenght_msg='{$error_msg}'");
        }
    }else{
        echo "passwords do not match";
        $pass_ok = false;
        $error_msg =  "passwords and confrim passwords do not match";
        header("location:../signup.php?pass_match_msg='{$error_msg}'");
    }      
    
//valid profile pic
    $extension = pathinfo($profile_pic['name'], PATHINFO_EXTENSION);
    print_r($extension); 
    if($extension == 'jpg' or $extension == 'jpeg' or $extension == 'png' or $extension == 'PNG'){
        if($profile_pic['size'] < 1048576){
            $img_ok = 'true';
        }else{
            echo "image size should not be greater than 1 MB";
            $img_ok = false;
            $error_msg =  "Image size should not be greater than 1 MB";
           header("location:../signup.php?img_size_msg='{$error_msg}'");
        }
    }else{
        echo "file must be an image";
        $img_ok = false;
        $error_msg =  "File must be an image";
        header("location:../signup.php?img_msg='{$error_msg}'");
    }
    $pname = $usr.$profile_pic['name'];
    $location = "../profile_pic/";
    move_uploaded_file($profile_pic['tmp_name'], "$location/$pname");
    $pass = md5($pass);
    $query = "insert into user (user_id, email, mobile, first_name, last_name, username, password, profile_pic,updated_at) values('$usr','$email', '$mobile', '$first_name', '$last_name','$username', '$pass','$pname','$updated_at')";
    if($img_ok and $pass_ok and $email_ok){
    $query_result = mysqli_query($con, $query) or die(mysqli_error($con));
    if($query_result){
        echo "registration successful";
        header('location:../dashboard.php');
    }
    }

}else{ 
    $error_msg =  "fields should not be empty";
header("location:../signup.php?msg='{$error_msg}'");
     }
?> 