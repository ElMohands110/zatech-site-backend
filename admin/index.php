<?php
    include 'connect.php';
    if (isset($_SESSION['email']))
        header('Location: project-cat.php');

    $error = '';

    if (isset($_POST['sign-in'])) {
        $email = $_POST['login-email'];
        $pass = $_POST['login-password'];
        $hashPass = sha1($pass);

        $sql = $con->prepare('SELECT * FROM `admin` WHERE `Email` = ? AND `Password` = ?');
        $sql->execute(array($email, $hashPass));
        $row = $sql->fetch();
        $count = $sql->rowCount();
        if ($count > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['ID'] = $row['AdminID'];
            $_SESSION['Name'] = $row['Firstname'] . ' ' . $row['Lastname'];
            echo $_SESSION['email'] . $_SESSION['ID'] . $_SESSION['Name'];
            header('Location: project-cat.php');
            exit();
        }
        else {
            $error = '<div style="
                            color: #283046;
                            background: #b76565;
                            position: absolute;
                            top: 15rem;
                            margin-left: 3rem;
                            padding: 10px;
                            border-radius: 10px;">
                Your Email Or Your Password Is Wrong</div>';
        }
    }
?>

<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

      <meta name="description" content=" ">

      <meta name="keywords" content=" ">

      <meta name="author" content="joinus">

      <title>Zatech - Sign In</title>

      <link rel="apple-touch-icon" href="app-assets/images/logo/logo.png">

      <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/logo/logo.png">

      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.min.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">

      <link rel="stylesheet" type="text/css" href="app-assets/css/style.css">
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-cover">
            <div class="auth-inner row m-0">
              <!-- Brand logo--><a class="brand-logo" href="index.php">
              <img width="75px" src="app-assets/images/logo/logo.png"></a>
              <!-- /Brand logo-->
              <!-- Left Text-->
              <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/pages/login-v2-dark.svg" alt="Login V2"/></div>
              </div>
              <!-- /Left Text-->
              <!-- Login-->
              <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <?php echo $error;?>
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                  <form class="auth-login-form mt-2" action="index.php" method="POST">
                    <div class="mb-1">
                      <label class="form-label" for="login-email">Email</label>
                      <input class="form-control" id="login-email" type="text" name="login-email" placeholder="ahmed@example.com" aria-describedby="login-email" autofocus="" tabindex="1"/>
                    </div>
                    <div class="mb-1">
                      <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="login-password" type="password" name="login-password" placeholder="············" aria-describedby="login-password" tabindex="2"/><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                      </div>
                    </div>
                    <button class="btn btn-primary w-100" name="sign-in" tabindex="4">Sign in</button>
                  </form>
                </div>
              </div>
              <!-- /Login-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
  <!-- END: Body-->
</html>
<?php ob_end_flush();?>