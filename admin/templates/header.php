<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

        <meta name="description" content=" ">

        <meta name="keywords" content=" ">

        <meta name="author" content="joinus">

        <title>Zatech - <?php echo $pageTitle;?></title>

        <link rel="apple-touch-icon" href="app-assets/images/logo/logo.png">

        <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/logo/logo.png">

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">

        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/charts/chart-apex.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.min.css">

        <link rel="stylesheet" type="text/css" href="app-assets/css/style.css">
    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
<?php
if (isset($login)) {?>
    <!DOCTYPE html>
    <html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
      <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

          <meta http-equiv="X-UA-Compatible" content="IE=edge">

          <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

          <meta name="description" content=" ">

          <meta name="keywords" content=" ">

          <meta name="author" content="joinus">

          <title>Zatech - Admin panal</title>

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

<?php }
if (!isset($noNav))
    include 'nav.php';