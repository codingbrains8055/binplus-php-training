<?php 
session_start();
if(isset($_SESSION['user'])){
require('assets/includes/connection.php');
$userinfo_query = "select * from user where email =  '{$_SESSION['user']}'";
$userinfo_query_result = mysqli_query($con, $userinfo_query) or die(mysqli_error($con));
$userinfo_query_result_array = mysqli_fetch_array($userinfo_query_result);
$fetch_course_query = "select * from courses  RIGHT OUTER JOIN user_course ON courses.course_id = user_course.course_id LEFT OUTER JOIN user ON user_course.user_id = user.user_id"; //where issued_books.iss_book_id ='$rid'";
$fetch_course_query_result = mysqli_query($con, $fetch_course_query) or die(mysqli_error($con));

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
    
    
<div class="container">
<div class="container-scroller">
    
      
<!--        <div class="row w-100">-->
<div class="content-wrapper">
 <div class="row">
   <div class="left col-md-1"><img class="img-md rounded-circle" src="assets/images/faces-clipart/pic-1.png" alt="jrofile image">
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
                          Course
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
                      </tr>
                    </thead>
                    <tbody>
       <?php while($print = mysqli_fetch_array($fetch_course_query_result)){?>
                      <tr>
                        <td class="py-1">
                          <img src="assets/images/faces-clipart/pic-1.png" alt="image"/>
                        </td>
                        <td>
                          <?php echo($print['type']);?>
                        </td>
                        <td>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo($print['score'])?>%" aria-valuenow="<?php echo($print['score'])?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td>
                         <?php echo($print['score']);?>
                        </td>
                      </tr>
<?php } ?>
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
     </div>
</div>
</div>     

<p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>

      
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
    </div>
    </div>    

    

    </body>
<?php include('assets/includes/footer1.php');?>
</html>
<?php }else{
    header('location:index.php');
}?>