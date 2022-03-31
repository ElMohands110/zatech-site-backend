<?php

include 'connect.php';
if (!isset($_SESSION['email']))
    header('Location: index.php');
$pageTitle = 'Blog Details';
include 'templates/header.php';

// Get Data from Blog Table And Fetch It In Website
$sql1 = $con->prepare("SELECT * FROM `blogs`");
$sql1->execute();
$rows1 = $sql1->fetchAll();

// Get Categories From Data Base And Fetch It In Select Input With Add Blogs
$sql2 = $con->prepare("SELECT * FROM `blog_categories`");
$sql2->execute();
$rows2 = $sql2->fetchAll();

?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row">

        <?php foreach ($rows1 as $row) {?>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card card-profile">
                    <img src="<?php echo $base_url . $row['BlogCover'];?>" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                    <div class="card-body">
                        <div class="profile-image-wrapper">
                            <div class="profile-image">
                                <div class="avatar">
                                    <img src="<?php echo $base_url . $row['BlogPhoto'];?>" alt="Profile Picture" />
                                </div>
                            </div>
                        </div>
                        <h3><?php echo $row['BlogName'];?></h3>
                        <h6 class="text-muted"><?php echo $row['BlogDescribe'];?></h6>
                        <span class="badge badge-light-primary profile-badge"><?php echo $row['BlogCat'];?></span>
                        <hr class="mb-2" />
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['BlogID'];?>">
                            Edit
                        </button>
                        <button type="button" class="btn btn-outline-danger" onclick="window.location.href='backend/del.php?do=blog&id=<?php echo $row['BlogID'];?>'">
                            Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal edit Member-->
            <div class="modal fade text-start" id="edit<?php echo $row['BlogID'];?>" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel4">Edit Blog</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="backend/edit.php?do=blog" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="blog_id" value="<?php echo $row['BlogID'];?>">
                            <div class="modal-body">
                                <div class="mb-1 mb-sm-0">
                                    <label for="formFile" class="form-label">Upload Blog Photo</label>
                                    <input class="form-control" type="file" id="formFile" name="blog_photo"/>
                                </div>
                                <label>Blog Name </label>
                                <div class="mb-1">
                                    <input type="text" name="blog_name" placeholder="name" class="form-control" value="<?php echo $row['BlogName'];?>"/>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="default-select2">Blog Category</label>
                                    <div class="mb-1">
                                        <select name="blog_cat" class="select2 form-select" id="default-select2">
                                            <?php foreach ($rows2 as $row1) {?>
                                                <option value="<?php echo $row1['CatName'];?>" <?php if ($row1['CatName'] == $row['BlogCat']) echo 'selected'?>><?php echo $row1['CatName'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-1 mb-sm-0">
                                    <label for="formFile" class="form-label">Upload Blog Cover</label>
                                    <input class="form-control" type="file" id="formFile" name="blog_cover"/>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="exampleFormControlTextarea2">Blog Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Blog Description" name="blog_describe"><?php echo $row['BlogDescribe'];?></textarea>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="exampleFormControlTextarea2">Blog Content</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Blog Description" name="blog_content"><?php echo $row['BlogContent'];?></textarea>
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
                    <h4 class="modal-title" id="myModalLabel33">Add new Blog</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="backend/add.php?do=blog" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-1 mb-sm-0">
                            <label for="formFile" class="form-label">Upload Blog Photo</label>
                            <input class="form-control" type="file" id="formFile" name="blog_photo"/>
                        </div>
                        <label>Blog Name </label>
                        <div class="mb-1">
                            <input type="text" name="blog_name" placeholder="name" class="form-control" />
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="default-select2">Blog Category</label>
                            <div class="mb-1">
                                <select name="blog_cat" class="select2 form-select" id="default-select2">
                                <?php foreach ($rows2 as $row) {?>
                                    <option value="<?php echo $row['CatName'];?>"><?php echo $row['CatName'];?></option>
                                <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 mb-sm-0">
                            <label for="formFile" class="form-label">Upload Blog Cover</label>
                            <input class="form-control" type="file" id="formFile" name="blog_cover"/>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="exampleFormControlTextarea2">Blog Description</label>
                            <textarea name="blog_describe" class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Blog Description"></textarea>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="exampleFormControlTextarea2">Blog Content</label>
                            <textarea name="blog_content" class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Blog Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="add_blog" class="btn btn-primary" data-bs-dismiss="modal" value="Create">
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