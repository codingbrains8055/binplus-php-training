<?php
session_start();
if(isset($_SESSION['user'])){
include('includes/config.php');
      //$email =  $_SESSION['user'];
    //$user = $_SESSION['user'];
    $error = 'false';
  $selectquery = "select * from students";
    $selectqueryresult = mysqli_query($con, $selectquery) or die(mysqli_error($con));
    
       date_default_timezone_set("Asia/Calcutta");
       $updated_at = date('Y-m-d H:i:s');     
    
    #acivate student
    if(isset($_GET['actid'])){
        extract($_GET);
         $updatetquery = "UPDATE students SET status = 'active', updated_at='$updated_at' WHERE student_id = '$actid'";
  $updatetqueryresult = mysqli_query($con, $updatetquery) or die(mysqli_error($con)); 
        header('location:reg-students.php');
    }
    
    
    #inacivate student
    if(isset($_GET['inactid'])){
        extract($_GET);
         $updatetquery = "UPDATE students SET status = 'blocked', updated_at='$updated_at' WHERE student_id = '$inactid'";
  $updatetqueryresult = mysqli_query($con, $updatetquery) or die(mysqli_error($con)); 
        header('location:reg-students.php');
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
    <title>Online Library Management System | Manage Reg Students</title>
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
                <h4 class="header-line">Manage Reg Students</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Reg Students
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Email id </th>
                                            <th>Mobile Number</th>
                                            <th>Reg Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $count = 1;
                                        while($print = mysqli_fetch_array($selectqueryresult)){
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo($count)?> </td>
                                            <td class="center"><?php echo($print['student_id'])?> </td>
                                            <td class="center"> <?php echo($print['fullname'])?></td>
                                            <td class="center"><?php echo($print['email'])?> </td>
                                            <td class="center"><?php echo($print['mobileno'])?> </td>
                                             <td class="center"><?php echo($print['added_at'])?> </td>
                                            <td class="center"><?php echo($print['status'])?> </td>
                                            <td class="center">
                                            <?php if($print['status']=='active'){?>
                                              <a href="reg-students.php?inactid=<?php echo($print['student_id'])?>" onclick="return confirm('Are you sure you want to block this student?');" >  <button class="btn btn-danger"> Inactive</button></a>
                                            <?php } 
                                                if($print['status']=='pending' || $print['status']=='blocked' ){
                                                ?>
                                              <a href="reg-students.php?actid=<?php echo($print['student_id'])?>" onclick="return confirm('Are you sure you want to active this student?');"><button class="btn btn-primary"> Active</button> </a>
                                          
                                          <?php }?>
                                            </td>
                                        </tr>
                                        <?php $count++; }?>
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
