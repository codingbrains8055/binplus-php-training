<?php session_start();
require('assets/includes/connection.php');
if(isset($_SESSION['user'])){
$fetch_user_info = "select user_id from user where email = '{$_SESSION['user']}'";
$fetch_user_info_result = mysqli_query($con, $fetch_user_info) or die(mysqli_error($con));
$user = mysqli_fetch_array($fetch_user_info_result);
$message_query = "select * from messages where receiver_id = '{$user['user_id']}'";
$message_query_result = mysqli_query($con, $message_query) or die(mysqli_error($con));
}
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
 <?php 
   include('assets/includes/header.php');
?>  
</header>
<div class="container">
 <div class="container-fluid">
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->


      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->

      <!-- partial -->
    
          <div class="email-wrapper wrapper">
            <div class="row align-items-stretch">

              <div class="mail-list-container col-md-3 pt-4 pb-4 border-right bg-white">
                <div class="border-bottom pb-4 mb-3 px-3">
                  <div class="form-group">
                    <input class="form-control form-control-sm w-100" type="search" placeholder="Search mail" id="Mail-rearch">
                  </div>
                  </div>
<?php while($print = mysqli_fetch_array($message_query_result)){
$sender_info_query = "select first_name, last_name from user where user_id = '{$print['sender_id']}'";
$sender_info_query_result = mysqli_query($con, $sender_info_query) or die(mysqli_error($con));
$sender_info = mysqli_fetch_array($sender_info_query_result);
                  ?>
                <div class="mail-list">
                  <div class="content">
                    <p class="sender-name"><?php echo $sender_info['first_name']." ".$sender_info['last_name']?></p>
                    <p class="message_text"><?php echo $print['message_content']?></p>
                  </div>
                  <div class="details">
                    <i class="mdi mdi-star favorite"></i>
                  </div>
                </div>    
<?php }?>
              </div>
              <div class="mail-view d-none d-md-block col-md-9 col-lg-9 bg-white">
   
                <div class="message-body">
                  <div class="sender-details">
                    <img class="img-sm rounded-circle mr-3" src="../../images/faces/face11.jpg" alt="">
                    <div class="details">
                      <p class="msg-subject">
                        Weekly Update - Week 19 (May 8, 2017 - May 14, 2017)
                      </p>
                      <p class="sender-email">
                        Sarah Graves
                        <a href="#">itsmesarah268@gmail.com</a>
                        &nbsp;<i class="mdi mdi-account-multiple-plus"></i>
                      </p>
                    </div>
                  </div>
                  <div class="message-content">
                    <div class="card-body"></div>
                    <div class="card-footer">
                    <form method="get" action="php_script/send_message_script.php">
                        <input name="receiver_id" value="7008_aniketsingh12889" hidden>
                        <input name="sender_id" value="<?php echo $user['user_id']?>" hidden>
                     <div class="input-group ">
                     <input type="text" name="message_content" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Send</button>
                    </div>
                     </div>   
                     </form>                      
                     </div>
                  </div>
                </div>
              </div>
            </div>
        
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
      
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
 </div>   
    </div>
<footer>
<?php include('assets/includes/footer1.php')?>    
</footer>
    </body>
</html>