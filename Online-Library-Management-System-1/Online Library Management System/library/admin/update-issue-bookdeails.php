<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    $error = 'false';
    //$status = 'issued';
    $rid = $_GET['rid'];
        $thisquery = "select * from books  RIGHT OUTER JOIN issued_books ON books.ISBN = issued_books.ISBN LEFT OUTER JOIN STUDENTS ON issued_books.student_id = students.student_id where issued_books.iss_book_id ='$rid'"; 
        $thisqueryresult = mysqli_query($con, $thisquery) or die(mysqli_error($con));
        $thisqueryresultinfo = mysqli_fetch_array($thisqueryresult);
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
    <title>Online Library Management System | Issued Book Details</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script>
// function for get student name
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_book.php",
data:'bookid='+$("#bookid").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script> 
<style type="text/css">
  .others{
    color:red;
}

</style>


</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issued Book Details</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
<div class="panel panel-info">
<div class="panel-heading">
Issued Book Details
</div>
<div class="panel-body">
<form role="form" action="returnbook.php" method="post">

                   



<div class="form-group">
<label>Student Name :</label>
<?php echo htmlentities($thisqueryresultinfo['fullname'])?>
</div>

<div class="form-group">
<label>Book Name :</label>
<?php echo htmlentities($thisqueryresultinfo['bookName'])?>
</div>


<div class="form-group">
<label>ISBN :</label>
<?php echo htmlentities($thisqueryresultinfo['ISBN'])?>
</div>

<div class="form-group">
<label>Book Issued Date :</label>
<?php echo htmlentities($thisqueryresultinfo['issued_on'])?>
</div>
<input type="hidden" name="rid" value="<?php echo($rid)?>"/>
 <input type="hidden" name="isbn" value="<?php echo($thisqueryresultinfo['ISBN'])?>"/>
   

<div class="form-group">
<label>Book Returned Date :</label>
<?php echo htmlentities($thisqueryresultinfo['return_date'])?>
</div>

<div class="form-group">
<label>Fine (in Rs.) :</label>

<input class="form-control" type="text" name="fine" id="fine" value=<?php echo $thisqueryresultinfo['fine'];?> required />


</div>


<button type="submit" name="return" id="submit" class="btn btn-info">Return Book </button>

 </div>

                                    </form>
                            </div>
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
