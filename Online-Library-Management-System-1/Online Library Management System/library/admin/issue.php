<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    $error = 'false';
     if(isset($_GET['studentid'])){
     date_default_timezone_set("Asia/Calcutta");
     $added_at = date('Y-m-d H:i:s'); 
         $time=strtotime($added_at);
         $returndate = date("Y-m-d",strtotime("+1 month",$time));
         extract($_GET);
         $query = "insert into issued_books (student_id, ISBN, status,issued_on,return_date) values('$studentid', '$ISBN', 'issued','$added_at
         ','$returndate')";
         $queryresult = mysqli_query($con, $query) or die(mysqli_error($con));
         $updatequery = "update books set status = 'issued' where ISBN ='$ISBN'";
         $updatequeryresult = mysqli_query($con, $updatequery) or die(mysqli_error($con));
         
         $updatequery = "update book_request set status = 'processed', request_processed_on='$added_at' where ISBN ='$ISBN' AND student_id = '$studentid'";
         $updatequeryresult = mysqli_query($con, $updatequery) or die(mysqli_error($con)); 
         header('location:issue-book.php');
     }
}else{ ?>
  <script>
alert("you are not allowed to visit this page, login first!!!!");
     window.location.href=('index.php');
</script>  
<?php }
?>