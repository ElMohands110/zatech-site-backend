<?php
include 'connect.php';
if (!isset($_SESSION['email']))
    header('Location: index.php');
$pageTitle = 'Blog Categories';
include 'templates/header.php';

$sql = $con->prepare("SELECT * FROM `blog_categories`");
$sql->execute();
$rows = $sql->fetchAll();
$i = 0;

?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Categories</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php foreach ($rows as $row) {?>
                            <tr>
                                <td>
                                    <span class="fw-bold"><?php echo ++$i;?></span>
                                </td>
                                <td><?php echo $row['CatName'];?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['CatID'];?>">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" onclick="window.location.href='backend/del.php?do=blogCat&id=<?php echo $row['CatID'];?>'">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal edit Cat-->
                            <div class="modal fade text-start" id="edit<?php echo $row['CatID'];?>" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel4">Edit Category</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="backend/edit.php?do=blogCat" method="post">
                                            <input type="hidden" name="cat_id" value="<?php echo $row['CatID'];?>">
                                            <div class="modal-body">
                                                <label>Category </label>
                                                <div class="mb-1">
                                                    <input type="text" name="cat_name" placeholder="category" class="form-control" value="<?php echo $row['CatName'];?>"/>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
      <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT  &copy; 2021<a class="ms-25" href="#" target="_blank">Zatech</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- Modal Add -->
    <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Add new Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="backend/add.php?do=blogCat" method="post">
                    <div class="modal-body">
                        <label>Category </label>
                        <div class="mb-1">
                            <input type="text" name="cat_name" placeholder="category" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="add_blog_cat" class="btn btn-primary" data-bs-dismiss="modal" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <!-- END: Page JS-->

    <script src="app-assets/js/scripts/components/components-modals.min.js"></script>

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
</html>