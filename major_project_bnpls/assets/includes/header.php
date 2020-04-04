<?php 
require('assets/includes/connection.php');
if(isset($_SESSION['user'])){
    $header_query = "select * from user where email = '{$_SESSION['user']}'";
    $header_query_result = mysqli_query($con, $header_query) or die(mysqli_error($con));
    $header_query_result_array =  mysqli_fetch_array($header_query_result);
    if($header_query_result_array != NULL){
        $username = $header_query_result_array['username'];
    }else {
        $username = "user";
    }
}
?>
<div class="container-fluid">
     <nav class="navbar default-layout sticky-top col-lg-12 col-12 flex-row">
         <!-- Image and text -->
  <a class="navbar navbar-brand brand-logo" href="index.php">
    <img src="assets/images/brand-logo/leaning_adda_logo.PNG" width="200" height="70" class="d-inline-block align-top" alt="">
  </a>

<!--
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" >
        <a class="navbar-brand brand-logo" href="index.php"></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"></a>
      </div>
-->
      <div class="navbar-menu-wrapper d-flex align-items-center">
<!--
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
--> 
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item active">
              <?php if(isset($_SESSION['user'])){ ?>
    <a href="courses.php" class="nav-link"><i class="mdi mdi-book-open"></i>Courses</a>
<?php }else{ ?>
<a href="login.php" class="nav-link"><i class="mdi mdi-book-open"></i>Courses</a>   
<?php }?> ?>  
          </li>
          <li class="nav-item active">
              <?php if(isset($_SESSION['user'])){ ?>
    <a href="task.php" class="nav-link"><i class="mdi mdi-book"></i>Task</a>
<?php }else{ ?>
<a href="login.php" class="nav-link"><i class="mdi mdi-book"></i>Task</a>   
<?php }?> ?>  
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
<?php if(isset($_SESSION['user'])){?>
          <li class="nav-item dropdown">
<?php }?>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="mr-3"><i class="mdi mdi-hand"></i>Hello! <?php if(isset($_SESSION['user'])){echo $username;}else{echo "User";}?> !</span> 
                <?php if(isset($_SESSION['user'])){ ?>
                <img class="img-xs rounded-circle" src="<?php echo "profile_pic/".$header_query_result_array['profile_pic']?>" alt="profile image">
<?php }else{ ?>
                <img class="img-xs rounded-circle" src="assets/images/faces-clipart/pic-1.png" alt="profile image">
                <?php } ?>  
            </a>
<?php if(isset($_SESSION['user'])){?>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center"><i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i></div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right"><i class="mdi mdi-account-outline mr-0 text-gray"></i></div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center"><i class="mdi mdi-alarm-check mr-0 text-gray"></i></div>
                </div>
              </a>
              <a class="dropdown-item mt-2" href="manage_account.php">
                <i class="mdi mdi-account-check"></i>Manage Accounts
              </a>
              <a class="dropdown-item" href="dashboard.php">
                <i class="mdi mdi-monitor"></i>Dashboard
              </a>
              <a class="dropdown-item" href="cart.php">
                <i class="mdi mdi-cart"></i>Cart
              </a>
              <a class="dropdown-item" href="messages.php">
                <i class="mdi mdi-message"></i>Message
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
                <i class="mdi mdi-login"></i>Log In(User)
              </a>
              <a class="dropdown-item" href="admin_login.php">
                <i class="mdi mdi-login"></i>Log In(Admin)
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