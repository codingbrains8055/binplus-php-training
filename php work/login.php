<?php
   include('connection.php');
//echo($_POST['email'].$_POST['password']);
   if(isset($_POST['email'])){
   extract($_POST);
   $chmail = mysqli_query($con, "select * from registration where email = '$email'") or die(mysqli_error($con));
   if($user = mysqli_fetch_array($chmail, MYSQLI_BOTH)){
    if($password == $user['password']){
      session_start();
      $_SESSION['user'] = $email; 
      echo($email);
?>
  <script>
    window.location.href="dashboard.php";
  </script>
       
<?php 
    }else{ 
?>
      <script>
        alert("password not matched");
        window.location.href="login.php";
      </script>

  <?php
         }
    
  }else{ 
?>
  <script>
   alert("you are not registerd");
   window.location.href="registration.php";
  </script>   

<?php 
       }
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" href="../Bootstrap%20kit/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Bootstrap%2520kit/js/bootstrap.min.js"/>
  </head>
  <body>

    <div class="card bg-light text-black">
    <h5>  <div class="card-header text-center">
Log In
      </div></h5>
      <div class="card-body">
        <form action=" " method="post" enctype="multipart/form-data">

           <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="Enter your password" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
    
           <div class="form-group">
            <label for="exampleInputEmail1">Remember me</label>
            <input type="checkbox" class="" id="exampleInputEmail1" name="remember" value="checked">

          </div>
          <button type="submit" class="btn btn-primary">Log In</button>
        </form>
      </div>
    </div>

  </body>
</html>