<?php
include 'connect.php';
if (!isset($_SESSION['email']))
    header('Location: index.php');

$pageTitle = 'Users';
include 'templates/header.php';

$course_id = '';

if (isset($_GET['id']))
    $course_id = $_GET['id'];

$sql = $con->prepare("SELECT * FROM `users` WHERE CourseID = ?");
$sql->execute(array($course_id));
$rows = $sql->fetchAll();

?>

    <!-- BEGIN: Content-->
    <div style="direction: rtl;text-align: right !important;" class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="font-family: 'Cairo', sans-serif;" class="card-title">طلاب الكورس</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="font-family: 'Cairo', sans-serif;">الاسم</th>
                                <th style="font-family: 'Cairo', sans-serif;">الكليه</th>
                                <th style="font-family: 'Cairo', sans-serif;">الايميل</th>
                                <th style="font-family: 'Cairo', sans-serif;">رقم الهاتف</th>
                                <th style="font-family: 'Cairo', sans-serif;">السن</th>
                                <th style="font-family: 'Cairo', sans-serif;">حذف</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($rows as $row) {?>
                                <tr>
                                    <td style="font-family: 'Cairo', sans-serif;"><?php echo $row['Firstname'] . $row['Lastname'];?></td>
                                    <td style="font-family: 'Cairo', sans-serif;">
                                        <?php echo $row['Faculty'];?>
                                    </td>
                                    <td style="font-family: 'Cairo', sans-serif;"><?php echo $row['Email'];?></td>
                                    <td><span class="badge rounded-pill badge-light-primary me-1"><?php echo $row['Phone'];?></span></td>
                                    <td style="font-family: 'Cairo', sans-serif;"><?php echo $row['Age'];?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown" onclick="window.location.href='backend/del.php?do=courseUsers&id=<?php echo $row['UserID'];?>&courseId=<?php echo $course_id;?>'">
                                                حذف
                                            </button>
                                        </div>
                                    </td>
                                </tr>
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


    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="app-assets/vendors/js/file-uploaders/dropzone.min.js"></script>
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

    <script src="app-assets/js/scripts/forms/form-file-uploader.min.js"></script>

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
</html>