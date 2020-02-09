<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    $error = 'false';
    $msg = "";
    if(isset($_POST['author'])){
     extract($_POST);
     date_default_timezone_set("Asia/Calcutta");
     $added_at = date('Y-m-d H:i:s');   
    $checkquery = "select author_id from authors where author_name = '$author'";
    $checkqueryresult = mysqli_query($con, $checkquery) or die(mysqli_error($con));
    $checkqueryresultinfo = mysqli_fetch_array($checkqueryresult);
    if(mysqli_num_rows($checkqueryresult) <= 0){
        $insertquery = "insert into authors (author_name, added_on) values('$author', '$added_at')";
        $insertqueryresult = mysqli_query($con, $insertquery) or die(mysqli_error($con));
        $msg = "success";
    }else{ 
        $error = 'true'; 
    }      
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
    <title>Online Library Management System | Add Author</title>
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
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Author</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <?php if($error == 'true'){?>
    <span style="color:red">Author Exists!!!!!</span>
    <?php }?>
     <?php if($msg == 'success'){?>
    <span style="color:green">Author added!!!!!</span>
    <?php }?>   
<div class="panel panel-info">
<div class="panel-heading">
Author Info
</div>
<div class="panel-body">
<form role="form" action=" " method="post">
<div class="form-group">
<label>Author Name</label>
<input class="form-control" type="text" name="author" autocomplete="off"  required />
</div>
<input type=hidden name="ath" value="yes"/>
<button type="submit" name="create" class="btn btn-info">Add </button>

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

