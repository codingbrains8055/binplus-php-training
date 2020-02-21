<?php session_start();?>
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
<?php if(isset($_SESSION['user'])){ ?>
      <div class="row justify-content-center">
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 1</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button>
  </div>
</div>
</div>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 2</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button>
  </div>
</div>
         </div>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 3</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button>
  </div>
</div>
         </div>
     </div>
     <div class="row justify-content-center">
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 1</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button>
  </div>
</div>
</div>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 2</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button>
  </div>
</div>
         </div>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 3</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button>
  </div>
</div>
         </div>
     </div>
     <div class="row justify-content-center">
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 1</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button>
  </div>
</div>
</div>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 2</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button>
  </div>
</div>
         </div>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 3</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button>
  </div>
</div>
         </div>
     </div>   
<?php }else{ ?>
      <div class="row justify-content-center">
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 1</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<a href="login.php"><button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button></a>
  </div>
</div>
</div>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 2</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<a href="login.php"><button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button></a>
  </div>
</div>
         </div>
      <div class="col-md-4 col-sm-12">
         <div class="card" style="width: 18rem;">
  <img src="assets/images/brand-logo/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Course 3</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body">
<a href="login.php"><button type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Take This Course</button></a>
  </div>
</div>
         </div>
     </div>    
<?php }     
?>
     

 </div>   
    </div>
<footer>
<?php include('assets/includes/footer1.php')?>    
</footer>
    </body>
</html>