<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      $email =  $_SESSION['user'];
      date_default_timezone_set("Asia/Calcutta");
       $today = date('Y-m-d H:i:s'); 
  // get student id
      $student_query = "select student_id from students where email = '$email'";
      $student_query_result = mysqli_query($con, $student_query) or die(mysqli_error($con));
      $student_rows = mysqli_fetch_array($student_query_result);
      $studentid = $student_rows['student_id'];
    $status = "issued";
//get isbn of all issued books for prticular student
  $isbn_query = "select ISBN from issued_books where student_id = '$studentid' and status = '$status'";
  
  
  
    $thisquery = "select * from books  RIGHT OUTER JOIN issued_books ON books.ISBN = issued_books.ISBN where student_id = '$studentid' and issued_books.status ='$status'";
    $thisqueryresult = mysqli_query($con, $thisquery) or die(mysqli_error($con)); 
    $isany = mysqli_num_rows($thisqueryresult);
    if($isany > 0){
    while($result = mysqli_fetch_array($thisqueryresult)){
      echo "<br>";
      $diff =  (strtotime($result['return_date']) - strtotime($today))/86400;
      if($diff <= 2 and $diff > 0){
        $due_date = TRUE;
      }else{
        list($day,$hour) = explode(".", $diff);
        $hour = (float) "0.$hour";
        list($hour, $minute) = explode(".", $hour*24);
        $minute = (float) "0.$minute";
        list($minute, $second) = explode(".", $minute*60);
        $second = (float) "0.$second";
        list($second, $mili) = explode(".", $second*60);
        $due_date = FALSE;
      }
/*      $query = "update issued_books set fine = '$fine' where iss_book_id = '{$result['iss_book_id']}' and student_id='{$result['student_id']}' and ISBN = '{$result['ISBN']}' and status = '{$result['status']}'";
      $queryresult = mysqli_query($con, $query) or die(mysqli_error($con));*/
    }    
    }else{
     $due_date = FALSE;   
    }

}else{ ?>
  <script>
alert("you are not allowed to visit this page, login first!!!!");
     window.location.href=('index.php');
</script>  
<?php }
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">My Profile</h4>
                
                            </div>

        </div>
             
             
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           Notifiacations
                        </div>
                        <div class="panel-body">
                          <?php if($due_date){ ?>
                          <p>You have books to return in <span style="color:red"><?php echo $day;?></span>day <span style="color:red"><?php echo $hour?></span>hour <span style="color:red"><?php echo $minute?></span>minute <span style="color:red"><?php echo $second?></span>second</p>

<?php }else{ ?>
  <p>No new notification</p>
<?php }?>
                     
                            </div>
                        </div>
                            </div>
    </div>
    </div>
 
         <div class="succWrap" id="sucsmsg" style="visibility:hidden" ><strong>SUCCESS</strong> </div>                                                 
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>