<?php 
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>admin dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/puse-icons-feather/feather.css">
 
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>
<style>
    .form{
        padding:10px;
        box-shadow: 0px -2px 30px -22px rgba(0,0,0,0.75);
        background:#FBFCFC;
    }
</style>
<body>
    <section >
    <div class="container">
       <br><br>
            <div class="row">
                <div class="col-md-3"></div> 
                <div class="col-md-6">
                <div class="card form">
                    <div class="card-body">
                    
                        
                        <div class="card-img-top">
                            <center><img src="data:image/png;base64,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" style="height:150px; width:150px; border-radious:50%;">
                                 </center>
                            </div>
                      <!-- <h4 class="card-title">Admin Login</h4> -->
                      <!-- <p class="card-description">
                        Basic form layout
                      </p> -->
                      <form class="forms-sample">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success mr-2" style="width:100%">Login</button>
                        <br><br>
                      </form>
                    </div>
                  </div>
                </div> 
                <div class="col-md-3"></div> 
            </div> 
        
</div> 
    </section>
         
</body>
