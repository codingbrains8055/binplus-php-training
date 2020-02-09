<?php 
    if(isset($_POST['fullname'])){
   include('includes/config.php');
       extract($_POST);
       date_default_timezone_set("Asia/Calcutta");
       $updated_at = date('Y-m-d H:i:s');  
       $updatequery = "update students set fullname = '$fullname', mobileno = '$mobileno',updated_at='$updated_at' where email = '$email'";
       $updatequeryresult = mysqli_query($con, $updatequery) or die(mysqli_error($con));
       if($updatequeryresult){ 
          $err="success";
          header("location:my-profile.php? msg=$err");
          }else{
          $err="failure";
          header("location:my-profile.php? msg=$err");
       }
   }else{ ?>
    <script>
     alert("you are illegly trying to visit this page!!!!!");
        window.location.href="index.php";
    </script>
   <?php }

?>