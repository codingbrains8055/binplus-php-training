<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    $error = 'false';
    if(isset($_POST['rid'])){
      extract($_POST);
        $query1 = "update issued_books set status = 'returned' where iss_book_id = '$rid'";
        $queryresult1 = mysqli_query($con, $query1) or die(mysqli_error($con));
       $query2 = "update books set status = 'available' where ISBN = '$isbn'";
      $queryreusult2 = mysqli_query($con, $query2) or die(mysqli_error($con));
      
        header('location:manage-issued-books.php');
    }
}else{ ?>
  <script>
alert("you are not allowed to visit this page, login first!!!!");
     window.location.href=('index.php');
</script>  
<?php }
?>