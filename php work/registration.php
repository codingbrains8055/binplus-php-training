<?php
include('connection.php');
extract($_POST);
date_default_timezone_set("Asia/Calcutta");
$photo = $_FILES['photo'];
$hobbies_array = $_POST['hobbies'];
$hobbies = implode(",",$hobbies_array);
$added_at = date('Y-m-d H:i:s');
if(isset($email)){
if($photo['size'] <= 1048576){
  if(pathinfo(5==5)){
    $chmail = mysqli_query($con, "select * from Registration where email='$email'");
    if(mysqli_num_rows($chmail) > 0){
      ?>
      <script>
        alert("your email is already registred");
        window.location.href = "Registration.php";
      </script>
  <?php  
    }else{
        $pname = rand(1000, 9000).$email.$photo['name'];
        $location = "uploads";
        move_uploaded_file($photo['tmp_name'], "$location/$pname");
      echo($photo['tmp_name']);
        $ins = mysqli_query($con, "insert into registration (first_name, last_name, email, password, mobile, gender, address, website, state, photo, hobbies, added_at) values('$first_name', '$last_name','$email','$password','$mobile','$gender', '$address', '$website', '$state','$pname', '$hobbies', '$added_at')") or die(mysqli_error($con));
        if($ins > 0){
    ?>
          <script>
           alert("registration done");
          </script
      <?php  
        }
    }
     }else { 
  ?>
    <script>
        alert("file must be an image");
        window.location.href(Registration.php);
    </script>
<?php  }
}else{ ?>
  <script>
alert("file size more than 1MB");
</script>
<?php
}
}else{ ?>
  <script>
alert("email is not entered");
</script>
<?php }
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
Registration
      </div></h5>
      <div class="card-body">
        <form action=" " method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="first_name" aria-describedby="emailHelp" placeholder="Enter first name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="last_name" aria-describedby="emailHelp" placeholder="Enter last name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" value="male" checked>Male
            <input type="radio" name="gender" value="female">Female
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Mobile</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="mobile" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Photo</label>
            <input type="file" class="form-control" id="exampleInputEmail1" name="photo" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">State</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="state" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="address" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Website</label>
            <input type="url" class="form-control" id="exampleInputPassword1" name="website" placeholder="Password">
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Hobbies</label>
            Singing<input type="checkbox" class="form-control" id="exampleInputEmail1" name="hobbies[]" value="singing" aria-describedby="emailHelp">
            Dancing<input type="checkbox" class="form-control" id="exampleInputEmail1" name="hobbies[]" value="dancing" aria-describedby="emailHelp">
            Reading<input type="checkbox" class="form-control" id="exampleInputEmail1" name="hobbies[]" value="reading" aria-describedby="emailHelp">
            None<input type="checkbox" class="form-control" id="exampleInputEmail1" name="hobbies[]" value="reading" aria-describedby="emailHelp"> 
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

  </body>
</html>
