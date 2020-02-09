<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
    extract($_GET);
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    //$athrname = $_GET['athrname'];
    //$selectquery = "select * from authors where author_name='$athrname'";
    //$selectqueyresult = mysqli_query($con, $selectquery) or die(mysqli_error($con));
   // $selectqueryresultinfo = mysqli_fetch_array($selectqueyresult);
    //$authorquery = "select * from ";
    $catquery = "select * from category where cat_id = '$catid'";
   // $catqueryresult = mysqli_query($con, $catquery) or die(mysqli_error($con));
     $catqueryresult = mysqli_query($con, $catquery) or die(mysqli_error($con)); 
     $catinfo = mysqli_fetch_array($catqueryresult);
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
    <title>Online Library Management System | Edit Categories</title>
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
                <h4 class="header-line">Edit category</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Category Info
</div>
 
<div class="panel-body">
<form role="form" action="updateinfoadmin.php" method="post">

<div class="form-group">
<label>Category Name</label>
<input class="form-control" type="text" name="category" value="<?php echo($catinfo['cat_name'])?>" required />
 <input class="form-control" type="hidden" name="catid" value="<?php echo($catinfo['cat_id'])?>" required/>   
</div>
<div class="form-group">
<label>Status</label>
<?php if($catinfo['status'] =='active'){ ?>
 <div class="radio">
<label>
<input type="radio" name="status" id="status" value="active" checked="checked">Active
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="status" id="status" value="inactive">Inactive
</label>
</div>
<?php } 
    if($catinfo['status'] == 'inactive'){
    ?>
    
<div class="radio">
<label>
<input type="radio" name="status" id="status" value="inactive" checked="checked">Inactive
</label>
</div>
 <div class="radio">
<label>
<input type="radio" name="status" id="status" value="active">Active
</label>
  </div>
<?php }?>
  </div>

<button type="submit" name="update" class="btn btn-info">Update </button>

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
