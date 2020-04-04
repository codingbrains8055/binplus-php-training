<?php 
session_start();
if(isset($_SESSION['user'])){
require('assets/includes/connection.php');
$userinfo_query = "select * from user where email =  '{$_SESSION['user']}'";
$userinfo_query_result = mysqli_query($con, $userinfo_query) or die(mysqli_error($con));
$userinfo_query_result_array = mysqli_fetch_array($userinfo_query_result);
$xp = $userinfo_query_result_array['experience_point'];
$lvl = floor($xp / 10);
$update_lvl = "update user set level = '$lvl' where email = '{$_SESSION['user']}'";
$update_lvl_result = mysqli_query($con, $update_lvl) or die(mysqli_error($con));
$fetch_course_query = "select * from courses  RIGHT OUTER JOIN user_course ON courses.course_id = user_course.course_id LEFT OUTER JOIN user ON user_course.user_id = user.user_id"; //where issued_books.iss_book_id ='$rid'";
$fetch_course_query_result = mysqli_query($con, $fetch_course_query) or die(mysqli_error($con));

$fetch_task_query = "select * from task  RIGHT OUTER JOIN user_task ON task.task_id = user_task.task_id LEFT OUTER JOIN user ON user_task.user_id = user.user_id where user_task.is_submitted = '0'"; //where issued_books.iss_book_id ='$rid'";
$fetch_task_query_result = mysqli_query($con, $fetch_task_query) or die(mysqli_error($con));
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
<?php include('assets/includes/header.php')?>
</header>
 
<div class="container-fluid page-body-wrapper">
<?php include('assets/includes/sidebar.php');?>   

<div class="main-panel">
<!--        <div class="row w-100">-->
            <div class="row justify-content-center">
<div class="container">
<div class="container-scroller">
    
      
<!--        <div class="row w-100">-->
<div class="content-wrapper">
 <div class="row">
   <div class="left col-md-1"><img class="img-md rounded-circle" src="profile_pic/<?php echo $userinfo_query_result_array['profile_pic'];?>" alt="profile image"> <a href="change_profile_pic.php">change</a>
     </div> 
   <div class="right col-md-11">
       <span><h2><?php echo $userinfo_query_result_array['first_name']." ".$userinfo_query_result_array['last_name'];?></h2><br><span>Level <?php echo $userinfo_query_result_array['level']?></span><br><span><?php echo $userinfo_query_result_array['experience_point'];?> xp</span></span> 
     </div>
</div>
</div> 
<div class="content-wrapper">
 <div class="row">
   <div class="left col-md-12"><h3>My Courses</h3>
     </div> 
   <div class="right col-md-12">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Course Name
                        </th>
                        <th>
                          Progress
                        </th>
                        <th>
                          Score
                        </th>
                          <th>
                          Action
                          </th>
                      </tr>
                    </thead>
                    <tbody>
       <?php $count = 1; while($print = mysqli_fetch_array($fetch_course_query_result)){?>
                      <tr>
                        <td class="py-1">
                           <?php echo $count;?>
                        </td>
                        <td>
                          <?php echo($print['course_name']);?>
                        </td>
                        <td>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo($print['score'])?>%" aria-valuenow="<?php echo($print['score'])?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td>
                         <?php echo($print['score']);?>
                        </td>
                        <td>
                         <a href="study.php?course_id=<?php echo $print['course_id'];?>"><button class="btn btn-primary">Continue<i class="mdi mdi-arrow-right-circle"></i></button></a>
                        </td>
                      </tr>
<?php $count++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>      
     </div>
</div>
</div> 
    
<div class="content-wrapper">
 <div class="row">
   <div class="left col-md-12"><h3>My Tasks</h3>
     </div> 
   <div class="right col-md-12">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Task Name
                        </th>
                        <th>
                          Xp
                        </th>
                        <th>
                         Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
       <?php $count = 1; while($print = mysqli_fetch_array($fetch_task_query_result)){
                        ?>
                      <tr>
                        <td class="py-1">
                           <?php echo $count;?>
                        </td>
                        <td>
                          <?php echo($print['task_name']);?>
                        </td>
                        <td>
                          <?php echo($print['xp']);?>
                        </td>
                        <td> 
                           <a href="complete_task.php?xp=<?php echo $print['xp'];?>&task_id=<?php echo $print['task_id'];?>"><button class="btn btn-primary">Complete Task</button> </a>
                        </td>
                      </tr>
<?php $count++; }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> 
     </div>
</div>
</div>     
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
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