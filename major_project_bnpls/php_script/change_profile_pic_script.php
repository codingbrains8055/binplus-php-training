<?php 
session_start();
require('../assets/includes/connection.php');
if(isset($_SESSION['user'])){
 extract($_POST);
    $img_ok = false;
    $profile_pic = $_FILES['profile_pic'];
    date_default_timezone_set("Asia/Calcutta");
    $updated_at = date('Y-m-d H:i:s');
    $location = "../profile_pic";
    $pname = $user_id['user_id'].$profile_pic['name'];
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
           header("location:../change_profile_pic.php?img_size_msg='{$error_msg}'");
        }
    }else{
        echo "file must be an image";
        $img_ok = false;
        $error_msg =  "File must be an image";
        header("location:../change_profile_pic.php?img_msg='{$error_msg}'");
    }
    if($img_ok){
    move_uploaded_file($profile_pic['tmp_name'], "$location/$pname");
    $update_query = "update user set profile_pic = '$pname' where email = '{$_SESSION['user']}'";
    $update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
    if($update_query_result){
       header('location:../dashboard.php');
    }else{
        header('location:../change_profile_pic.php');
    }
    }
}else{
    header('location:../index.php');
}
?>