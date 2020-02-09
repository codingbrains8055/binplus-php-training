<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    $selectquery = "select * from books";
    $selectqueryresult = mysqli_query($con, $selectquery) or die(mysqli_error($con));   
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
    <title>Online Library Management System | Manage Books</title>
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
                <h4 class="header-line">Manage Books</h4>
    </div>
     <div class="row">
 <!-- 
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 

</div>
</div>

<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 

</div>
</div>

<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 

</div>
</div>

<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 

</div>
</div>

-->
</div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>ISBN</th>
                                            <th>Price</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php
                                        $count = 1;
                                        while($print = (mysqli_fetch_array($selectqueryresult))){ 
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo($count)?>  </td>
                                            <td class="center"><?php echo($print['bookName'])?> </td>
                                            <td class="center"><?php echo($print['category'])?>  </td>
                                            <td class="center"><?php echo($print['author'])?>  </td>
                                            <td class="center"><?php echo($print['ISBN'])?>  </td>
                                            <td class="center"><?php echo($print['price'])?>  </td>
                                            <td class="center"><?php echo($print['status'])?>  </td>
                                            <td class="center">
                                                 <a href="edit-book.php?isbn=<?php echo($print['ISBN'])?> & bookname=<?php echo($print['bookName'])?> & category=<?php echo($print['category'])?> & price=<?php echo($print['price'])?>& author=<?php echo($print['author'])?> "><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button></a> 
                                             
                                              <a href="deleteinfoadmin.php?isbn=<?php echo($print['ISBN'])?>" onclick="return confirm('Are you sure you want to delete?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></a>
                                            </td>
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
