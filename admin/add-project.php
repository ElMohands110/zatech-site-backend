<?php
include 'connect.php';
if (!isset($_SESSION['email']))
    header('Location: index.php');
$pageTitle = 'Projects';
include 'templates/header.php';

// Get Categories From Data Base To Fetch it in select input with add new projects
$sql1 = $con->prepare("SELECT * FROM `categories`");
$sql1->execute();
$rows1 = $sql1->fetchAll();

// Get Projects From database to fetch it in website
$sql2 = $con->prepare("SELECT * FROM `projects`");
$sql2->execute();
$rows2 = $sql2->fetchAll();

?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row">

            <?php foreach ($rows2 as $row2) {?>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card card-profile">
                        <img src="<?php echo $base_url . $row2['ProjectCover'];?>" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                        <div class="card-body">
                            <div class="profile-image-wrapper">
                                <div class="profile-image">
                                    <div class="avatar">
                                        <img src="<?php echo $base_url . $row2['ProjectPhoto'];?>" alt="Profile Picture" />
                                    </div>
                                </div>
                            </div>
                            <h3><?php echo $row2['ProjectName'];?></h3>
                            <h6 class="text-muted"><?php echo $row2['ProjectDescrip'];?></h6>
                            <span class="badge badge-light-primary profile-badge"><?php echo $row2['Category'];?></span>
                            <hr class="mb-2" />
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row2['ProjectID'];?>">
                                Edit
                            </button>
                            <a href="backend/del.php?do=projectAdd&id=<?php echo $row2['ProjectID'];?>"><button type="button" class="btn btn-outline-danger">
                                Delete
                            </button></a>
                        </div>
                    </div>
                </div>

                <!-- Modal edit Member-->
                <div class="modal fade text-start" id="edit<?php echo $row2['ProjectID'];?>" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel4">Edit Project</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="backend/edit.php?do=project" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="projectid" value="<?php echo $row2['ProjectID'];?>">
                                <div class="modal-body">
                                    <div class="mb-1 mb-sm-0">
                                        <label for="formFile" class="form-label">Upload Project Photo</label>
                                        <input class="form-control" type="file" id="formFile" name="project_photo"/>
                                    </div>
                                    <label>Project Name </label>
                                    <div class="mb-1">
                                        <input type="text" placeholder="name" class="form-control" name="project_name" value="<?php echo $row2['ProjectName'];?>"/>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="default-select2">Project Category</label>
                                        <div class="mb-1">
                                            <select class="select2 form-select" id="default-select2" name="cat"">
                                                <?php foreach ($rows1 as $row1) { ?>
                                                    <option value="<?php echo $row1['CatName'];?>" <?php if ($row1['CatName'] == $row2['Category']) echo 'selected'?>><?php echo $row1['CatName'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-1 mb-sm-0">
                                        <label for="formFile" class="form-label">Upload Project Cover</label>
                                        <input class="form-control" type="file" id="formFile" name="project_cover"/>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="exampleFormControlTextarea2">Project Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Project Description" name="describe"><?php echo $row2['ProjectDescrip'];?></textarea>
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
                    <h4 class="modal-title" id="myModalLabel33">Add new Project</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="backend/add.php?do=project" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-1 mb-sm-0">
                            <label for="formFile" class="form-label">Upload Project Photo</label>
                            <input class="form-control" type="file" id="formFile" name="projectPhoto" required/>
                        </div>
                        <label>Project Name </label>
                        <div class="mb-1">
                            <input type="text" placeholder="name" class="form-control" name="projectName" required/>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="default-select2">Project Category</label>
                            <div class="mb-1">
                                <select class="select2 form-select" id="default-select2" name="cat" required>
                                    <?php foreach ($rows1 as $row1) { ?>
                                        <option value="<?php echo $row1['CatName'];?>"><?php echo $row1['CatName'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 mb-sm-0">
                            <label for="formFile" class="form-label">Upload Project Cover</label>
                            <input class="form-control" type="file" id="formFile" name="projectCover" required/>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="exampleFormControlTextarea2">Project Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Project Description" name="describe" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="addProject" class="btn btn-primary" data-bs-dismiss="modal" value="create">
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