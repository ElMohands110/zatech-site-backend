<?php
include 'connect.php';
if (!isset($_SESSION['email']))
    header('Location: index.php');
$pageTitle = 'Courses';
include 'templates/header.php';

$sql = $con->prepare("SELECT * FROM `courses`");
$sql->execute();
$rows = $sql->fetchAll();

?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row">

        <?php foreach ($rows as $row) {
            $courseid = $row['CourseID'];
            $sql2 = $con->prepare("SELECT COUNT('UserID') FROM `users` WHERE `CourseID` = $courseid");
            $sql2->execute();
            $count = $sql2->fetchColumn(); ?>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-profile">
                    <img src="<?php echo $base_url . $row['CoursePhoto'];?>" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                    <div class="card-body">
                        <h3><?php echo $row['CourseName'];?></h3>
                        <h6 class="text-muted"><?php echo $row['CourseDescribe'];?></h6>
                        <span class="badge badge-light-primary profile-badge"><?php echo $count;?> User</span>
                        <br>
                        <button type="button" class="btn btn-outline-primary" onclick="window.location.href='course-users.php?id=<?php echo $row['CourseID'];?>'">
                            Users
                        </button>
                        <hr class="mb-2" />
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['CourseID'];?>">
                            Edit
                        </button>
                        <button type="button" class="btn btn-outline-danger" onclick="window.location.href='backend/del.php?do=course&id=<?php echo $row['CourseID'];?>'">
                            Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal edit Member-->
            <div class="modal fade text-start" id="edit<?php echo $row['CourseID'];?>" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel4">Edit Course</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="backend/edit.php?do=course" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="course_id" value="<?php echo $row['CourseID'];?>">
                            <div class="modal-body">
                                <div class="mb-1 mb-sm-0">
                                    <label for="formFile" class="form-label">Upload Course Photo</label>
                                    <input class="form-control" type="file" id="formFile" name="course_photo"/>
                                </div>
                                <label>Course Name </label>
                                <div class="mb-1">
                                    <input type="text" placeholder="name" class="form-control" name="course_name" value="<?php echo $row['CourseName'];?>"/>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="exampleFormControlTextarea2">Course Description</label>
                                    <textarea name="course_describe" class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Course Description"><?php echo $row['CourseDescribe'];?></textarea>
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
                    <h4 class="modal-title" id="myModalLabel33">Add new Course</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="backend/add.php?do=course" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-1 mb-sm-0">
                            <label for="formFile" class="form-label">Upload Course Photo</label>
                            <input class="form-control" type="file" id="formFile" name="course_cover"/>
                        </div>
                        <label>Course Name </label>
                        <div class="mb-1">
                            <input type="text" name="courseName" placeholder="name" class="form-control" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="exampleFormControlTextarea2">Course Description</label>
                            <textarea name="courseDescribe" class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Course Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="addCourse" class="btn btn-primary" data-bs-dismiss="modal" value="Create">
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