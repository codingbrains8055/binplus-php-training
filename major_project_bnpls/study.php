<?php session_start();
require('assets/includes/connection.php');
if(isset($_SESSION['user'])){
$query = "select course_content from courses where course_id = '{$_GET['course_id']}'";
$query_result = mysqli_query($con, $query) or die(mysqli_error($con));
$query_result_array = mysqli_fetch_array($query_result);
$question_query = "select * from course_questions where course_id = '{$_GET['course_id']}'";
$question_query_result = mysqli_query($con, $question_query) or die(mysqli_error($con));
?>

<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/morris.js/morris.css">
  <!-- End plugin css for this page -->
<link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom_style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<header>
 <?php 
   include('assets/includes/header.php');
?>  
</header>
    
<div class="container-fluid page-body-wrapper">
<?php include('assets/includes/sidebar.php');?>   

<div class="main-panel">
<!--        <div class="row w-100">-->
            <div class="row justify-content-center">
<div class="container">
 <div class="container-fluid">
 
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
<!--
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-1787146a-81e5-4319-9cf4-916485f2e0ed"></div>
-->
                    <embed src="course_content/<?php echo $query_result_array['course_content'];?>" type="application/pdf" width="100%" height="500">  
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
<?php $count = 1; while($print = mysqli_fetch_array($question_query_result)){  
                    if($print['status'] != 0){
                    ?>
        <form></form>
        <div class="card">
       <div class="question col-md-12">
           <div class="col-md-12 card-header ">Q.<?php echo $count." ".$print['question'];?></div>
           <div class="row card-body">
            <div class="col-md-6">
                <input type="radio"  name="answer<?php echo $count;?>" oninput="checkanswer('<?php echo $print['option_1'];?>' , '<?php echo $print['ans'];?>', 'one<?php echo $count;?>')">
                (A) <?php echo $print['option_1'];?><i id="one<?php echo $count;?>" class=""></i>
               </div>
            <div class="col-md-6">
                <input type="radio"   name="answer<?php echo $count;?>" oninput="checkanswer('<?php echo $print['option_2'];?>', '<?php echo $print['ans'];?>', 'two<?php echo $count;?>')">
                (B) <?php echo $print['option_2'];?><i id="two<?php echo $count;?>" class=""></i>
               </div>
            <div class="col-md-6">
                <input type="radio"  name="answer<?php echo $count;?>" oninput="checkanswer('<?php echo $print['option_3'];?>', '<?php echo $print['ans'];?>', 'three<?php echo $count;?>')">
                (C) <?php echo $print['option_3'];?><i id="three<?php echo $count;?>" class=""></i>
               </div>
            <div class="col-md-6">
                <input type="radio"   name="answer<?php echo $count;?>" oninput="checkanswer('<?php echo $print['option_4'];?>', '<?php echo $print['ans'];?>', 'four<?php echo $count;?>')">
                (D) <?php echo $print['option_4'];?><i id="four<?php echo $count;?>" class=""></i>
               </div>
           </div>
        </div>
        <div class="card-footer"><center><button class="btn btn-primary">Submit</button></center></div>
        </div>
   <br>
   <?php $count++; } }?>
                </div>
              </div>
            </div>
 </div>   
    </div>
            </div>
        </div>
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
       
    </div>     
    

<footer>
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/data-table.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>  
<script src="assets/js/custom_js.js"></script>
</footer>
    </body>
</html>
<?php }else{
header('location:index.php');
} ?>