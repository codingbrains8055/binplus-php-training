<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    $error = 'false';
    
 #get the  list of authors   
  $authorquery = "select author_name from authors";
  $authorqueryresult = mysqli_query($con, $authorquery) or die(mysqli_error($con)); 
    
  #get list of category
  $catquery = "select cat_name from category where status = 'active'";
  $catqueryresult = mysqli_query($con, $catquery) or die(mysqli_error($con));  
    
    if(isset($_POST['isbn'])){
     extract($_POST);
     date_default_timezone_set("Asia/Calcutta");
     $added_at = date('Y-m-d H:i:s'); 

    $checkquery = "select bookName from books where ISBN = '$isbn'";
    $checkqueryresult = mysqli_query($con, $checkquery) or die(mysqli_error($con));
    $checkqueryresultinfo = mysqli_fetch_array($checkqueryresult);
        
     $insertquery = "insert into books (ISBN, bookName, author,book_added_at, category, price) values('$isbn','$bookname', '$author','$added_at','$category','$price')";
    $selectquery = "select * from books where ISBN = '$isbn'";
    $slectquryresult = mysqli_query($con, $selectquery);
    if(mysqli_num_rows($slectquryresult) > 0){ ?>
        <script>
         alert("there is book available with this  isbn number");
         </script>
    <?php }else{
  $insertqueryresult = mysqli_query($con, $insertquery) or die(mysqli_error($con)); 
        $error='true';
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
    <title>Online Library Management System | Add Book</title>
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
                <h4 class="header-line">Add Book</h4>
                
                            </div>

</div>
<?php if($error =='true'){?>
<span style="color:green">Book added!!!!!</span>  
 <?php }?>            
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form role="form" action=" " method="post">
<div class="form-group">
<label>Book Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="bookname" autocomplete="off"  required />
</div>

<div class="form-group">
<label> Category<span style="color:red;">*</span></label>
<select class="form-control" name="category" required="required">
<option value=" ii"> Select Category</option>
 <?php while($print = mysqli_fetch_array($catqueryresult)){?>
<option value="<?php echo($print['cat_name'])?>"> <?php echo($print['cat_name'])?></option>
<?php }?>
</select>
</div>


<div class="form-group">
<label> Author<span style="color:red;">*</span></label>
<select class="form-control" name="author" required="required">
<option value=""> Select Author</option>
<?php while($print = mysqli_fetch_array($authorqueryresult)){?>
<option value="<?php echo($print['author_name'])?>"> <?php echo($print['author_name'])?></option>
<?php }?>
</select>
</div>

<div class="form-group">
<label>ISBN Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn"  required="required" autocomplete="off"  />
<p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
</div>

 <div class="form-group">
 <label>Price<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="price" autocomplete="off"   required="required" />
 </div>
<button type="submit" name="add" class="btn btn-info">Add </button>

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

