

<?php 
require_once("includes/config.php");
if(!empty($_POST["bookid"])) {
 $isbn = $_POST["bookid"];
    $sql = "select bookName, status from books where ISBN='$isbn'";
    $sqlresult = mysqli_query($con, $sql) or die(mysqli_error($con));
    if(mysqli_num_rows($sqlresult)> 0){  
        $print = mysqli_fetch_array($sqlresult);
           if($print['status']=='issued') {
echo ("<span style='color:red'> Book already issued </span>"."<br />");
echo ("<b>Book Name-</b>" .$print['bookName']);
 echo ("<script>$('#submit').prop('disabled',true);</script>");
 } else {
echo (htmlentities($print['bookName']));
 echo ("<script>$('#submit').prop('disabled',false)</script>");
} 
    }
}
?>
