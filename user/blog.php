<?php
include 'connect.php';

$sql = $con->prepare("SELECT * FROM `blogs`");
$sql->execute();
$blogs = $sql->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>ZaTech - Blog</title>

	<link href="css/bootstrap.css" rel="stylesheet">

	<link href="css/style.css" rel="stylesheet">

	<link href="css/responsive.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Niramit:wght@200;400;500;600;700&amp;family=Saira:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

	<link href="css/color-switcher-design.css" rel="stylesheet">

	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

	<link rel="icon" href="images/logo.png" type="image/x-icon">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header -->
    <header class="main-header header-style-two">
    
        <!-- Header Top Two -->
        <div class="header-top-two">
            <div class="auto-container">
                <div class="clearfix">
                    <!--Top Left-->
                    <div class="top-left pull-left">
						<ul class="info-list">
							<li><span class="icon flaticon-maps-and-flags"></span>Egypt,Alexandria Smouha</li>
							<li><span class="icon flaticon-call-2"></span>CALL ANYTIME : <a href="tel:+201099378744">01099378744</a></li>
							<li><span class="icon flaticon-email-2"></span><a href="mailto:contact@zatech.tech">contact@zatech.tech</a></li>
						</ul>
                    </div>

                    <!--Top Right-->
                    <div class="top-right pull-right">
						<!-- Social Box -->
						<ul class="social-box">
							<li><a href="#" class="fa fa-facebook-f"></a></li>
				            <li><a href="#" class="fa fa-twitter"></a></li>
				            <li><a href="#" class="fa fa-linkedin"></a></li>
				            <li><a href="#" class="fa fa-instagram"></a></li>
						</ul>
                    </div>
                </div>
            </div>
        </div>
    
        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    
                    <div class="pull-left logo-box">
                        <div class="logo"><a href="index.php"><img style="max-width: 80px;" src="images/logo.png" alt="" title=""></a></div>
                    </div>
                    
                    <div class="nav-outer pull-right clearfix">
						
						<!-- Mobile Navigation Toggler For Mobile -->
						<div class="mobile-nav-toggler"><span class="icon flaticon-menu-3"></span></div>
						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							
							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li><a href="index.php">Home</a></li>
									<li><a href="about.html">About us</a></li>
									<li><a href="services.html">Services</a></li>
									<li><a href="projects.php">Projects</a></li>
									<li><a href="courses.php">Courses</a></li>
									<li class="current"><a href="blog.php">Blog</a></li>
									<li><a href="contact.php">Contact us</a></li>
								 </ul>
							</div>
						</nav>
						<!-- Main Menu End-->

						<!-- Options Box -->
						<div class="options-box clearfix">
							
							<!-- Grid Box -->
							<div class="grid-box navSidebar-button">
								<a href="#" class="icon flaticon-menu"></a>
							</div>
							
							<div class="btn-box">
								<a href="contact.php" class="theme-btn btn-style-five"><span class="txt">Contact Now</span></a>
							</div>
							
						</div>
						
					</div>
					
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            <nav class="menu-box">
            	<div class="nav-logo"><a href="index.php"><img src="images/logo.png" alt="" title=""></a></div>
                
                <ul class="navigation clearfix"></ul>
            </nav>
        </div>
		<!-- End Mobile Menu -->
		
    </header>
    <!-- End Main Header -->

    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/6.jpg)">
		<div class="pattern-layer" style="background-image:url(images/background/pattern-21.png)"></div>
		<div class="pattern-layer-two" style="background-image:url(images/icons/pattern-1.png)"></div>
        <div class="auto-container">
			<div class="inner-container clearfix">
				<div class="pull-left">
					<h2>Our Latest News</h2>
					<div class="text">Our Latest News For Our Clients to Breaf Update.</div>
				</div>
                <div class="pull-right">
					<ul class="bread-crumb clearfix">
						<li><a href="index.php">Home</a></li>
						<li>Our Blogs</li>
					</ul>
				</div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<div class="our-blogs">

                    <?php foreach ($blogs as $blog) {?>

						<!-- News Block Five -->
						<div class="news-block-five">
							<div class="inner-box">
								<div class="image">
									<a href="blog-detail.php"><img src="<?php echo $base_url . $blog['BlogPhoto'];?>"/></a>
									<div class="category"><?php echo $blog['BlogCat'];?></div>
									<div class="pattern-layer" style="background-image:url(images/background/pattern-26.png)"></div>
								</div>
								<div class="content-box">
									<ul class="post-meta">
										<li><a href="blog-detail.php"><span class="icon flaticon-timetable"></span><?php echo $blog['Date'];?></a></li>
									</ul>
									<h3><a href="blog-detail.php"><?php echo $blog['BlogName'];?>.</a></h3>
									<div class="text"><?php echo $blog['BlogDescribe'];?></div>
									<div class="btn-box">
										<a href="blog-detail.php?id=<?php echo $blog['BlogID'];?>" class="theme-btn btn-style-five"><span class="txt">Learn More</span></a>
									</div>
								</div>
							</div>
						</div>

                    <?php }?>
						
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
	
	<!-- CTA Section Two -->
	<section class="cta-section-two style-two">
		<div class="auto-container">
			<div class="inner-container">
				<div class="pattern-layer" style="background-image:url(images/background/pattern-9.png)"></div>
				<div class="clearfix">
					<div class="pull-left">
						<h3>Fabricate A Superior Site A LOT Faster WITH  Cyber Code</h3>
					</div>
					<div class="pull-right">
						<a href="contact.php" class="theme-btn btn-style-four"><span class="txt">Contact Now</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End CTA Section -->
	
	<!-- Main Footer -->
    <footer class="main-footer" style="background-image: url(images/background/pattern-10.png)">
		<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
                	
                    <!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">
						
                        	<!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
									<div class="logo-foot">
										<a href="index.php"><img style="max-width: 30%;" src="images/logo.png" alt="" /></a>
									</div>
									<div class="text">Zatech is a team of creative and talented professionals who understand the importance of a high-quality work.</div>
								</div>
							</div>
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
									<h4>LINKS EXPLORE</h4>
									<div class="row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-6">
											<ul class="list-link">
												<li><a href="about.html">About</a></li>
												<li><a href="about.html">Our Portfolio</a></li>
												<li><a href="contact.php">Contact</a></li>
												<li><a href="about.html">Privacy Policy</a></li>
												<li><a href="contact.php">Help</a></li>
											</ul>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-6">
											<ul class="list-link">
												<li><a href="projects.php">Our Projects</a></li>
												<li><a href="blog.php">Latest News</a></li>
												<li><a href="about.html">Support</a></li>
												<li><a href="about.html">Terms Of Use</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget contact-widget">
									<h4>CONTACT</h4>
									<ul class="list-style-two">
										<li><span class="icon flaticon-maps-and-flags"></span>Egypt, Alexandria Smouha</li>
										<li><span class="icon flaticon-call-2"></span>CALL ANYTIME : <a href="tel:+201099378744">01099378744</a></li>
										<li><span class="icon flaticon-email-2"></span><a href="mailto:contact@zatech.tech">contact@zatech.tech</a></li>
									</ul>
								</div>
							</div>
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget newsletter-widget">
									<h4>Newsletter</h4>
									<div class="text">Sign up for our latest news &amp; articles. We <br> won’t give you spam mails.</div>
									
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="row clearfix">
					<div class="text-column col-lg-6 col-md-12 col-sm-12">
						<div class="text">&copy; copyright 2021 by Zatech</div>
					</div>
					<div class="arrow-column col-lg-6 col-md-12 col-sm-12">
						<!--Scroll to top-->
						<div class="scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Main Footer -->
	
	<!-- Sidebar Cart Item -->
	<div class="xs-sidebar-group info-group">
		<div class="xs-overlay xs-bg-black"></div>
		<div class="xs-sidebar-widget">
			<div class="sidebar-widget-container">
				<div class="widget-heading">
					<a href="#" class="close-side-widget">
						X
					</a>
				</div>
				<div class="sidebar-textwidget">

					<!-- Sidebar Info Content -->
					<div class="sidebar-info-contents">
						<div class="content-inner">
							<div class="logo">
								<a href="index.php"><img src="images/logo.png" alt="" /></a>
							</div>
							<div class="content-box">
								<h2>About Us</h2>
								<p class="text">Zatech is a team of creative and talented professionals who understand the importance of a high-quality work.</p>
								<a href="#" class="theme-btn btn-style-two"><span class="txt">Consultation</span></a>
							</div>
							<div class="contact-info">
								<h2>Contact Info</h2>
								<ul class="list-style-one">
									<li><span class="icon fa fa-location-arrow"></span>Egypt, Alexandria Smouha</li>
									<li><span class="icon fa fa-phone"></span> 01099378744</li>
									<li><span class="icon fa fa-envelope"></span>contact@zatech.tech</li>
									<li><span class="icon fa fa-clock-o"></span>Week Days: 09.00 to 18.00</li>
								</ul>
							</div>
							<!-- Social Box -->
							<ul class="social-box">
								<li class="facebook"><a href="#" class="fa fa-facebook-f"></a></li>
								<li class="twitter"><a href="#" class="fa fa-twitter"></a></li>
								<li class="linkedin"><a href="#" class="fa fa-linkedin"></a></li>
								<li class="instagram"><a href="#" class="fa fa-instagram"></a></li>
								<li class="youtube"><a href="#" class="fa fa-youtube"></a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- END sidebar widget item -->

</div>

<!-- Header Search -->
<div class="search-popup">
	<button class="close-search style-two"><span class="flaticon-multiply"></span></button>
	<button class="close-search"><span class="flaticon-multiply"></span></button>
	<form method="post" action="#">
		<div class="form-group">
			<input type="search" name="search-field" value="" placeholder="Search Here" required="">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
<!-- End Header Search -->

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/appear.js"></script>
<script src="js/nav-tool.js"></script>
<script src="js/validate.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/script.js"></script>
<script src="js/color-settings.js"></script>

</body>
</html>
