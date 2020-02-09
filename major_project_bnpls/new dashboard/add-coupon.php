<?php include ('includes/header.php'); include ('includes/sidebar.php') ?>
<div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Add Coupon</h4>
                 <br>
                  <div class="form-group">
                    <label>Coupon Name</label>
                    <input type="text" class="form-control form-control-lg" placeholder="category name" aria-label="category name">
                  </div>
                  <div class="form-group"`>
                    <label>Expiry date</label>
                    <input type="text" class="form-control" placeholder="id" aria-label="id">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Category Type</label>
                    <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                      <option>type1</option>
                      <option>type2</option>
                      <option>type3</option>
                     
                    </select>
                  </div>
                 
                 
                  <div class="form-group"`>
                    <label>Coupon price</label>
                    <input type="text" class="form-control" placeholder="price" aria-label="price">
                  </div>
                  
                  <div class="form-group"`>
                    <label>Offer</label>
                    <input type="text" class="form-control" placeholder="offers" aria-label="price">
                  </div>
                 <a href=""> <button type="submit" class="btn btn-success mr-2">+ Add Coupon</button></a>
                 <!-- <a href=""> <button type="submit" class="btn btn-danger mr-2"></button></a> -->
                </div>
               
              </div>
                </div>
            </div>
        </div>    

<?php include ('includes/footer.php') ?>
