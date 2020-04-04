<nav class="sidebar sidebar-offcanvas" id="sidebar">
<button class="navbar-toggler navbar-toggler-rights align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="profile_pic/<?php  echo "profile_pic.png"; ?>" alt="image"> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name"><?php if(isset($_SESSION['admin'])){echo $username;}else{echo "User";}?></p>
              </div>
            </div>
          </li>
<?php if(isset($_SESSION['admin'])){ ?>
            <li class="nav-item">
            <div>
              <a class="dropdown-item mt-2 nav-link" href="admin_dashboard.php">
                <i class="mdi mdi-account-check"></i>Dashboard
              </a>
              <a class="dropdown-item nav-link" href="admin_add_course.php">
                <i class="mdi mdi-monitor"></i>Add a Course
              </a>
              <a class="dropdown-item nav-link" href="admin_add_task.php">
                <i class="mdi mdi-cart"></i>Add a taskk
              </a>
              <a class="dropdown-item nav-link" href="logout.php">
                <i class="mdi mdi-logout"></i>Sign Out
              </a>
            </div>
            </li>
<?php }else{ ?> 
            <li class="nav-item">
           <div>
              <a class="dropdown-item nav-link" href="login.php">
                <i class="mdi mdi-login nav-item"></i>Log In(User)
              </a>
              <a class="dropdown-item nav-link" href="admin_login.php">
                <i class="mdi mdi-login"></i>Log In(Admin)
              </a>
            </div> </li>   
<?php }?>

        </ul>
      </nav> 