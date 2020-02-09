 



<?php 
require_once("includes/config.php");
if(!empty($_POST["studentid"])) {
 $studentid = $_POST["studentid"];
    $sql = "select fullname, status from students where student_id='$studentid'";
    $sqlresult = mysqli_query($con, $sql) or die(mysqli_error($con));
    $print = mysqli_fetch_array($sqlresult);
    if(mysqli_num_rows($sqlresult)> 0){
           if($print['status']=="blocked") {
echo ("<span style='color:red'> Student ID Blocked </span>"."<br />");
echo ("<b>Student Name-</b>" .$print['fullname']);
 echo ("<script>$('#submit').prop('disabled',true);</script>");
 } else if($print['status'] == 'pending'){
         echo ("<span style='color:yellow'> Student ID Pending </span>"."<br />");
echo ("<b>Student Name-</b>" .$print['fullname']);
 echo ("<script>$('#submit').prop('disabled',true);</script>");           
           } else {
  
echo (htmlentities($print['fullname']));
 echo ("<script>$('#submit').prop('disabled',false)</script>");
} 
       
    }
}
?>
