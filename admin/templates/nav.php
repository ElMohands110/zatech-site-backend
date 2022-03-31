<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <?php if ($pageTitle != 'Contact Message') {
                        if ($pageTitle !== 'Users') {?>
                            <div class="form-modal-ex">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                    Add
                                    <?php
                                        if ($pageTitle == 'Project Categories') echo 'Category';
                                        if ($pageTitle == 'Projects') echo 'Project';
                                        if ($pageTitle == 'Courses') echo 'Course';
                                        if ($pageTitle == 'Blog Categories') echo 'Category';
                                        if ($pageTitle == 'Blog Details') echo 'Blog';?>
                                </button>
                            </div>
                        <?php }
                    }?>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="sun"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Explore..." tabindex="-1" data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder"><?php echo $_SESSION['Name']?></span>
                        <span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">
                <img class="round" src="app-assets/images/avatars/download.png" alt="avatar" height="40" width="40">
                <span class="avatar-status-online"></span>
              </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="logout.php"><i class="me-50" data-feather="power"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="index.php">
            <span class="brand-logo">
                <img src="app-assets/images/logo/logo.png ">
            </span>
                    <h2 class="brand-text">Zatech</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="index.php"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Add Data</span><span class="badge badge-light-warning rounded-pill ms-auto me-1">4</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Projects">Projects</span>
                        </a>
                        <ul class="menu-content">
                            <li class="<?php if ($pageTitle == 'Project Categories') echo 'active';?>"><a class="d-flex align-items-center" href="project-cat.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Projects Categories</span></a>
                            </li>
                            <li class="<?php if ($pageTitle == 'Projects') echo 'active';?>"><a class="d-flex align-items-center" href="add-project.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Project Details</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if ($pageTitle == 'Courses') echo 'active'?>">
                        <a class="d-flex align-items-center" href="add-course.php">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="advisory">Courses</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Certificates">Blogs</span>
                        </a>
                        <ul class="menu-content">
                            <li class="<?php if ($pageTitle == 'Blog Categories') echo 'active'?>"><a class="d-flex align-items-center" href="blog-cat.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Blog Categories</span></a>
                            </li>
                            <li class="<?php if ($pageTitle == 'Blog Details') echo 'active';?>"><a class="d-flex align-items-center" href="add-blog.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Blog Details</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span data-i18n="Pages">Pages</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="<?php if($pageTitle == 'Contact Message') echo 'active';?> nav-item"><a class="d-flex align-items-center" href="contact-msg.php"><i data-feather="user-check"></i><span class="menu-title text-truncate" data-i18n="Review">Contact Message</span></a></li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->