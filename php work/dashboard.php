<?php
session_start();
if(isset($_SESSION['user'])){
   echo("hello". $_SESSION['user']); ?>
<a href="logout.php">Log out</a>
<?php }else{ ?>
  <script>
alert("you are not allowed to visit this page, login first!!!!");
     window.location.href=('login.php');
</script>  
<?php }
?>