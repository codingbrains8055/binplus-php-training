<nav class="sidebar sidebar-offcanvas" id="sidebar">
<button class="navbar-toggler navbar-toggler-rights align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="profile_pic/<?php if(isset($_SESSION['user'])){echo $header_query_result_array['profile_pic'];}else{echo "profile_pic.png";} ?>" alt="image"> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name"><?php if(isset($_SESSION['user'])){echo $username;}else{echo "User";}?></p>
                <p class="designation">Level <?php if(isset($_SESSION['user'])){ echo $header_query_result_array['level']." ";}else{ echo "0"." ";} ?> XP <?php if(isset($_SESSION['user'])){echo $header_query_result_array['experience_point'];}else{ echo "0"." ";} ?></p>
              </div>
            </div>
          </li>
<?php if(isset($_SESSION['user'])){ ?>
            <li class="nav-item">
            <div>
              <a class="dropdown-item mt-2 nav-link" href="manage_account.php">
                <i class="mdi mdi-account-check"></i>Manage Accounts
              </a>
              <a class="dropdown-item nav-link" href="dashboard.php">
                <i class="mdi mdi-monitor"></i>Dashboard
              </a>
              <a class="dropdown-item nav-link" href="cart.php">
                <i class="mdi mdi-cart"></i>Cart
              </a>
              <a class="dropdown-item nav-link" href="messages.php">
                <i class="mdi mdi-message"></i>Message
              </a>
              <a class="dropdown-item nav-link" href="logout.php">
                <i class="mdi mdi-logout"></i>Sign Out
              </a>
            </div> </li>
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