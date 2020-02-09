<?php
session_start();
if(isset($_SESSION['user'])){
     include('includes/config.php');
    $email = $_SESSION['user'];
    date_default_timezone_set("Asia/Calcutta");
    $today = date('Y-m-d H:i:s'); 

  
    $selectquery = "select * from students where email = '$email'";
    $selectqueryresult = mysqli_query($con, $selectquery) or die(mysqli_error($con));
    $studentinfo = mysqli_fetch_array($selectqueryresult);
    $studentid =$studentinfo['student_id'];
    
    $query = "select * from issued_books where student_id = '$studentid'";
    $queryresult = mysqli_query($con, $query) or die(mysqli_error($con));
    $queryresultinfo= mysqli_fetch_array($queryresult);
    
   // $bookquery = "select * from books where ISBN = '{$queryresultinfo['ISBN']}'";
    //$bookqueryresult = mysqli_query($con, $bookquery) or die(mysqli_error($con));
    //$bookqueryresultinfo= mysqli_fetch_array($bookqueryresult);
  //calculate fine
    $status = "issued";
    $thisquery = "select * from books  RIGHT OUTER JOIN issued_books ON books.ISBN = issued_books.ISBN where student_id = '$studentid' and issued_books.status ='$status'";
    $thisqueryresult = mysqli_query($con, $thisquery) or die(mysqli_error($con)); 
    while($result = mysqli_fetch_array($thisqueryresult)){
      echo "<br>";
      $diff = (strtotime($today) - strtotime($result['return_date']))/60/60/24;
      if($diff <= 0){
        $fine = 0.00;
      }else{
        $fine = 1*$diff;
      }
      $query = "update issued_books set fine = '$fine' where iss_book_id = '{$result['iss_book_id']}' and student_id='{$result['student_id']}' and ISBN = '{$result['ISBN']}' and status = '{$result['status']}'";
      $queryresult = mysqli_query($con, $query) or die(mysqli_error($con));
    }
  
    $status = "issued";
    $thisquery = "select * from books  RIGHT OUTER JOIN issued_books ON books.ISBN = issued_books.ISBN where student_id = '$studentid' and issued_books.status ='$status'";
    $thisqueryresult = mysqli_query($con, $thisquery) or die(mysqli_error($con));
   // $thisqueryresultinfo = mysqli_fetch_array($thisqueryresult);
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
    <title>Online Library Management System | Manage Issued Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <h4 class="header-line">Manage Issued Books</h4>
    </div>
    

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Issued Books 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>ISBN </th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Fine in(USD)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $count = 1;
                                        while($print = mysqli_fetch_array($thisqueryresult)){?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo($count)?></td>
                                            <td class="center"><?php echo($print['bookName'])?></td>
                                            <td class="center"><?php echo($print['ISBN'])?></td>
                                            <td class="center"><?php echo($print['issued_on'])?></td>
                                            <td class="center">                                            
                                                <span style="color:red"> <?php echo($print['return_date'])?></span>
                                          </td>
                                              <td class="center"><?php echo($print['fine'])?> </td>
                                         
                                        </tr>
  <?php $count++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>