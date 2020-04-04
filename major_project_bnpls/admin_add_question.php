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
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Add New question</h4>
                      <form class="forms-sample" action="php_script/admin_add_question_script.php" method="post">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-md-4 col-form-label">Question</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter the question" name="question">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-md-4 col-form-label">Option #1</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="first option" data-kwimpalastatus="alive" data-kwimpalaid="1583681097290-3" name="option_1">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-md-4 col-form-label">Option #2</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="second option" data-kwimpalastatus="alive" data-kwimpalaid="1583681097290-3" name="option_2">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-md-4 col-form-label">Option #3</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="third option" data-kwimpalastatus="alive" data-kwimpalaid="1583681097290-3" name="option_3">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-md-4 col-form-label">Option #4</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="fourth option" data-kwimpalastatus="alive" data-kwimpalaid="1583681097290-3" name="option_4">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-md-4 col-form-label">Answer</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Answer" data-kwimpalastatus="alive" data-kwimpalaid="1583681097290-3" name="ans">
                          </div>
                        </div>
                            <input type="hidden" class="form-control" id="exampleInputEmail2" name="course_id" value="<?php echo $_GET['course_id'];?>">
                        <button type="submit" class="btn btn-success mr-2">Add</button>
                      </form>
                    </div>
                  </div>
                </div>
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
<script src="assets/js/custom_js.js"></script>
    </body>
</html>
<?php }else{
    header('location:index.php');
}?>