<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
       date_default_timezone_set("Asia/Calcutta");
       $updated_at = date('Y-m-d H:i:s'); 
    
    #delete author
if(isset($_GET['authorid'])) {
  $authorid = $_GET['authorid'];
   $deletequery = "DELETE FROM authors WHERE author_id = '$authorid'";
   $deletequeryresult = mysqli_query($con, $deletequery) or die(mysqli_error($con));
    $msg == 'true';
   header("location:manage-authors.php?authdlt='{$msg}'");
}  
    
 #delete book
 if(isset($_GET['isbn'])) {
  $isbn = $_GET['isbn'];
   $deletequery = "DELETE FROM books WHERE ISBN = '$isbn'";
   $deletequeryresult = mysqli_query($con, $deletequery) or die(mysqli_error($con));
   $dltissbks = "delete from issued_books where ISBN ='$isbn'";
   $dltissbksrslt = mysqli_query($con, $dltissbks) or die(mysqli_error($con));  
   header('location:manage-books.php');
}  
    
    #delete category
    if(isset($_GET['category'])){
        $category = $_GET['category'];
        $deletequery = "DELETE FROM category WHERE cat_name = '$category'";
        $deletequeryresult = mysqli_query($con, $deletequery) or die(mysqli_error($con));
   header('location:manage-categories.php');
    }
    
}else{ ?>
  <script>
alert("you are not allowed to visit this page, login first!!!!");
     window.location.href=('index.php');
</script>  
<?php }
?>