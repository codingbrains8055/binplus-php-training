<?php include ('includes/header.php'); include ('includes/sidebar.php') ?>
<div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Admin Profile</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <br>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" readonly>
                    </div>
                    <!-- <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputCity1">Address</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Mobile no</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="mobile no" readonly>
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                    </div> -->
                   <a href="edit-profile.php"> <button type="submit" class="btn btn-success mr-2">Edit profile</button></a>
                   <a href="change-password.php"><button class="btn btn-light">Change-password</button></a>
                  </form>
                </div>
              </div>
                </div>
            </div>
</div>
<?php include ('includes/footer.php')?>