<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    $error = 'false';
  $status  = "available";
   $query = "select * from books where status ='$status'";
   $queryresult = mysqli_query($con, $query) or die(mysqli_error($con));
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
    <title>Online Library Management System | Request a new Book</title>
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
                <h4 class="header-line">Request a New Book</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
<div class="panel panel-info">
<div class="panel-heading">
Request a New Book
</div>
<div class="panel-body">
<form role="form" action="issuerequestscript.php" method="post">
<input type="hidden" name="student" value="<?php echo($_SESSION['user'])?>"/>
<div class="form-group">
<label> Book Name<span style="color:red;">*</span></label>
<select class="form-control" name="bookName" required="required">
<option value=""> Select Book</option>
 <?php while($print = mysqli_fetch_array($queryresult)){?>
<option value="<?php echo($print['bookName'])?>"> <?php echo($print['bookName'])?></option>
<?php }?>
</select>
</div>
 <div class="form-group">

    <!-- <span  class="form-control" name="bookdetails" id="get_book_name" readonly> </span> -->
   <span id="get_book_name" style="font-size:16px;"></span>
 </div>
<button type="submit" name="issue" id="submit" class="btn btn-info">Request </button>

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