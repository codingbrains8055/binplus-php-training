<?php 
require('assets/includes/connection.php');
if(isset($_SESSION['user'])){
    $header_query = "select username from user where email = '{$_SESSION['user']}'";
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
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/brand-logo/leaning_adda_logo.PNG" height=150% width=150%></a>
<!--        <a class="navbar-brand brand-logo-mini" href="index.html"></a>-->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
<!--
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
-->
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item active">
            <a href="#" class="nav-link"><i class="mdi mdi-elevation-rise"></i>Courses</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="mdi mdi-bookmark-plus-outline"></i>Discussion</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
<?php if(isset($_SESSION['user'])){?>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-message-text-outline"></i>
              <span class="count bg-warning">2</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">You have 7 unread mails
                </p>
                <span class="badge badge-inverse-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal text-dark mb-1">David Grey
                    <span class="float-right font-weight-light small-text text-gray">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal text-dark mb-1">Tim Cook
                    <span class="float-right font-weight-light small-text text-gray">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal text-dark mb-1"> Johnson
                    <span class="float-right font-weight-light small-text text-gray">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count bg-success">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-inverse-info float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-inverse-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                  <p class="font-weight-light small-text mb-0">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-inverse-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                  <p class="font-weight-light small-text mb-0">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-inverse-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                  <p class="font-weight-light small-text mb-0">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
<?php }?>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="mr-3">Hello, <?php if(isset($_SESSION['user'])){echo $username;}else{echo "User";}?> !</span><img class="img-xs rounded-circle" src="assets/images/faces-clipart/pic-1.png" alt="jrofile image">
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
                Manage Accounts
              </a>
              <a class="dropdown-item">
                Dashboard
              </a>
              <a class="dropdown-item" href="logout.php">
                Sign Out
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
                Sign In
              </a>
            </div>
<?php }?>             
              
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>   
        </div>
<?php if(!isset($_SESSION['user'])){?>
    <div class="learn_to_code">
        <h4>Learn To Code For Free</h4>
        <h5>Free, Fun affective</h5>
        <a href="login.php"><button type="button" class="btn btn-inverse-secondary btn-rounded btn-fw">Start Learnig Now</button></a>
        </div>
<?php }?>
    </nav>   
    </div>