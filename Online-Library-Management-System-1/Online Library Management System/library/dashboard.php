<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      $email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    $selectquery = "select * from students where email = '$email'";
    $selectqueryresult = mysqli_query($con, $selectquery) or die(mysqli_error($con));
    $studentinfo = mysqli_fetch_array($selectqueryresult);
    $studentid =$studentinfo['student_id'];
    
    $query = "select * from issued_books where student_id = '$studentid'";
    $queryresult = mysqli_query($con, $query) or die(mysqli_error($con));
    $queryresultinfo= mysqli_fetch_array($queryresult); 
    $ttlissdbk = mysqli_num_rows($queryresult);
    $status = "issued";
    $query = "select * from issued_books where student_id = '$studentid' and status='$status'";
    $queryresult = mysqli_query($con, $query) or die(mysqli_error($con));
    $queryresultinfo= mysqli_fetch_array($queryresult); 
    $ntrtrnd = mysqli_num_rows($queryresult);
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
    <title>Online Library Management System | User Dash Board</title>
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
                <h4 class="header-line">DASHBOARD</h4>
                
                            </div>

        </div>
             
             <div class="row">



            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
 

                            <h3><?php echo($ttlissdbk)?>  </h3>
                            Book Issued
                        </div>
                    </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
 

                            <h3><?php echo($ntrtrnd)?>   </h3>
                          Books Not Returned Yet
                        </div>
                    </div>
        </div>


            
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
 
