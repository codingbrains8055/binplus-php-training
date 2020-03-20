<?php 
require('assets/includes/connection.php');
if(isset($_SESSION['admin'])){
    if(isset($_SESSION['admin'])){
        $username = $_SESSION['admin'];
    }else {
        $username = "user";
    }
}
?>
<div class="container-fluid">
     <nav class="navbar default-layout sticky-top col-lg-12 col-12 flex-row">
  <a class="navbar navbar-brand brand-logo" href="admin_dashboard.php">
    <img src="assets/images/brand-logo/leaning_adda_logo.PNG" width="200" height="70" class="d-inline-block align-top" alt="">
  </a>
      <div class="navbar-menu-wrapper d-flex align-items-center">
<!--
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
--> 
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item active">
              <?php if(isset($_SESSION['admin'])){ ?>
<!--    <a href="courses.php" class="nav-link"><i class="mdi mdi-elevation-rise"></i>Courses</a>-->
<?php }else{ ?>
<!--<a href="login.php" class="nav-link"><i class="mdi mdi-elevation-rise"></i>Courses</a>   -->
<?php }?> ?>
            
          </li>
          <li class="nav-item">
<!--            <a href="#" class="nav-link"><i class="mdi mdi-bookmark-plus-outline"></i>Discussion</a>-->
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
<?php if(isset($_SESSION['admin'])){?>
          <li class="nav-item dropdown">
<?php }?>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="mr-3">Hello! <?php if(isset($_SESSION['admin'])){echo $username;}else{echo "User";}?> !</span><img class="img-xs rounded-circle" src="assets/images/faces-clipart/pic-1.png" alt="profile image">
            </a>
<?php if(isset($_SESSION['admin'])){?>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center"><i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i></div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right"><i class="mdi mdi-account-outline mr-0 text-gray"></i></div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center"><i class="mdi mdi-alarm-check mr-0 text-gray"></i></div>
                </div>
              </a>
              <a class="dropdown-item" href="admin_dashboard.php">
                <i class="mdi mdi-monitor"></i>Dashboard
              </a>
              <a class="dropdown-item" href="admin_add_course.php">
                <i class="mdi mdi-plus-circle"></i>Add a course
              </a>
              <a class="dropdown-item" href="admin_add_task.php">
                <i class="mdi mdi-plus-circle"></i>Add a task
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout"></i>Sign Out
              </a>
            </div>
<?php }else{?>             
              
           <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center"><i class="mdi  mr-0 text-gray"></i></div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right"><i class="mdi mr-0 text-gray"></i></div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center"><i class="mdi  mr-0 text-gray"></i></div>
                </div>
              </a>
              <a class="dropdown-item" href="login.php">
                Log In(User)
              </a>
              <a class="dropdown-item" href="admin_login.php">
                Log In(Admin)
              </a>
            </div>
<?php }?>             
              
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>   
        </div>
    </nav>   
    </div>