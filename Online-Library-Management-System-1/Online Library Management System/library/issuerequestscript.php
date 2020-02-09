<?php
session_start();
if(isset($_SESSION['user'])){
     include('includes/config.php');
 extract($_POST);
    $selectquery = "select student_id from students where email = '{$student}'";
   $selectqueryresult = mysqli_query($con, $selectquery) or die(mysqli_error($con));
   $studentinfo = mysqli_fetch_array($selectqueryresult);
    $studentid  = $studentinfo['student_id'];
 
     $selectbookquery = "select ISBN from books where bookName = '{$bookName}'";
   $selectbookqueryresult = mysqli_query($con, $selectbookquery) or die(mysqli_error($con));
   $bookinfo = mysqli_fetch_array($selectbookqueryresult);
    $ISBN  = $bookinfo['ISBN'];  

 $updatequrey = "update books set status ='requested' where ISBN ='$ISBN'";
    $insertquery = "insert into book_request (student_id, ISBN) values('$studentid', '$ISBN')";
    $insertqueryresult = mysqli_query($con, $insertquery) or die(mysqli_error($con));
     $updatequeryresult = mysqli_query($con, $updatequrey) or die(mysqli_error($con));
   header("location:request-book.php"); 
  }else{ ?>
  <script>
alert("you are not allowed to visit this page, login first!!!!");
     window.location.href=('index.php');
</script>  
<?php }
?>