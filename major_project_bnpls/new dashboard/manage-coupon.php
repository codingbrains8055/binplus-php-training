<?php include ('includes/header.php'); include ('includes/sidebar.php') ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="row">
                        <div class="col-12">
                            <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="order-listing_length">
                                            <label>Show
                                                <select name="order-listing_length" aria-controls="order-listing" class="form-control">
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="-1">All</option>
                                                </select> entries</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="order-listing_filter" class="dataTables_filter">
                                            <label>
                                                <input type="search" class="form-control" placeholder="Search" aria-controls="order-listing">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" > #</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending">Coupon name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" >Exepriy date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >price</th>

                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Ship to: activate to sort column ascending">Coupon Type</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Base Price: activate to sort column ascending" >Off%</th>
                                                    <!-- <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased Price: activate to sort column ascending" style="width: 129px;">Purchased Price</th> -->
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">1</td>
                                                    <td>abs</td>
                                                    <td>30-01-19</td>
                                                    <td>
                                                        2000
                                                    </td>
                                                    <td>xyz</td>
                                                    <td>20%</td>
                                                   
                                                    <td>
                                                    <div class="btn-group" role="group">
                                                            <button class="file-upload-browse btn btn-info" id="btnGroupDrop1" type="button" class="btn btn-sucess dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                            <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i>Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">1</td>
                                                    <td>cad</td>
                                                    <td>30-01-19</td>
                                                    <td>
                                                        2000
                                                    </td>
                                                    <td>xyz</td>
                                                    <td>20%</td>
                                                    
                                                    <td>
                                                    <div class="btn-group" role="group">
                                                            <button class="file-upload-browse btn btn-info" id="btnGroupDrop1" type="button" class="btn btn-sucess dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                            <a class="dropdown-item" href="edit-coupon.php"><i class="fa fa-pencil"></i>Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                    </div>
                                                    </td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="order-listing_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="order-listing_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="order-listing_previous"><a href="#" aria-controls="order-listing" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="order-listing" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item next disabled" id="order-listing_next"><a href="#" aria-controls="order-listing" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include ('includes/footer.php') ?>