<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
       date_default_timezone_set("Asia/Calcutta");
       $updated_at = date('Y-m-d H:i:s'); 
  #updating author info
if(isset($_POST['authorid'])) {
  $authorname = $_POST['author'];
  $authorid = $_POST['authorid'];
  $searchauthor = mysqli_query($con,"select author_id from authors where author_name = '$authorname'");
  if(mysqli_num_rows($searchauthor) == 0){
  $updatetquery = "UPDATE authors SET author_name = '$authorname', updated_on='$updated_at' WHERE author_id = '$authorid'";
  $updatetqueryresult = mysqli_query($con, $updatetquery) or die(mysqli_error($con));
  $msg = "success";
  header("location:manage-authors.php?msg='{$msg}'"); 
  }else{?>
    <script>
     alert("An author exist with this name");
      window.location.href="manage-authors.php";
    </script>
 <?php }

}  
  
  #updating books info
 if(isset($_POST['isbn'])) {
extract($_POST);

  $updatetquery = "UPDATE books SET bookName = '$bookname', book_updated_at='$updated_at',category='$category',author='$author', price='$price' WHERE ISBN = '$isbn'";
  $updatetqueryresult = mysqli_query($con, $updatetquery) or die(mysqli_error($con));
  $msg = "success";
  header("location:manage-books.php?msg='{$msg}'"); 
  
 }
  
  #updating category
   if(isset($_POST['cat_id'])) {
extract($_POST);

  $updatetquery = "UPDATE category SET cat_name = '$category', status='$status', updated_at='$updated_at' WHERE cat_id = '$catid'";
  $updatetqueryresult = mysqli_query($con, $updatetquery) or die(mysqli_error($con));
  $msg = "success";
  header("location:manage-categories.php?msg='{$msg}'"); 
  
 }
  
}else{ ?>
  <script>
alert("you are not allowed to visit this page, login first!!!!");
     window.location.href=('index.php');
</script>  
<?php }
?>