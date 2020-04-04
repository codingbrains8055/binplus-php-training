<?php 
session_start();
if(isset($_SESSION['admin'])){
require('assets/includes/connection.php');

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
  <!-- inject:css -->
<link rel="stylesheet" href="assets/vendors/codemirror/codemirror.css">
<!--<link rel="stylesheet" href="assets/vendors/codemirror/ambiance.css">-->
  <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom_style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<header>
<?php include('assets/includes/admin_header.php')?>
</header>
 
<div class="container-fluid page-body-wrapper">
<?php include('assets/includes/admin_sidebar.php');?>   

<div class="main-panel">
<!--        <div class="row w-100">-->
            <div class="row justify-content-center">
<div class="container">
<div class="container-scroller">
<div class="row justify-content-center">    
<div class="col-md-6">
<div class="card">
    <div class="card-header">Send a message</div>
      <form action="php_script/admin_send_msg_script.php" method="post">
    <div class="card-body">
            <input type="hidden" value="<?php echo $_GET['user_id']?>" name="user_id">
        <textarea rows="1" cols="50" name="code_editable" id="code_editable" style="display: none;"></textarea></div>
    <div class="card-footer"><center><button class="btn btn-success">send</button></center></div>    
    </form>
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
<script src="assets/vendors/codemirror/codemirror.js"></script>
<script src="assets/vendors/codemirror/javascript.js"></script>
<script src="assets/vendors/codemirror/shell.js"></script>
<script src="assets/js/codeEditor.js"></script>
<script src="assets/js/custom_js.js"></script>
    </body>
</html>
<?php }else{
    header('location:index.php');
}?>