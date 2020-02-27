<!doctype html>
<?php
header('Set-Cookie: cross-site-cookie=survey; SameSite=None; Secure');
session_start();
if (empty($_SESSION['nama'])) {
	echo "<script type='text/javascript'>
			alert('Mohon maaf, Silakan Login terlebih dahulu !!');
			window.location.href='index.php';
		  </script>";
} elseif (isset($_SESSION['nama'])) {
	include ("config/koneksi.php");
?>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Dashboard WA</title>
		<meta name="description" content="" />
		<meta name="Author" content="Dimas A" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/js/app.js"></script>

	</head>
	<!--
		.boxed = boxed version
	-->
	<body>


		<!-- WRAPPER -->
		<div id="wrapper">

			<!-- 
				ASIDE 
				Keep it outside of #wrapper (responsive purpose)
			-->
			<aside id="aside">
				<!--
					Always open:
					<li class="active alays-open">

					LABELS:
						<span class="label label-danger pull-right">1</span>
						<span class="label label-default pull-right">1</span>
						<span class="label label-warning pull-right">1</span>
						<span class="label label-success pull-right">1</span>
						<span class="label label-info pull-right">1</span>
				-->
				<nav id="sideNav"><!-- MAIN MENU -->
					<ul class="nav nav-list">
						<li><!-- dashboard -->
							<a class="dashboard" href="sr_media.php?module=home"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-inbox"></i><span>Feedback</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="sr_media.php?module=feedback">All Feedback</a></li>
								<li><a href="sr_media.php?module=feedback&&act=allfeedback">Feedback 0 - 1</a></li>
							</ul>
						</li>
						<li>
							<a href="sr_media.php?module=inputob">
								<i class="main-icon fa fa-inbox"></i><span>Input OB</span>
							</a>
						</li>
						<!-- <li class="inioutbox">
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-folder-open"></i>  <span>OutBox</span>
							</a>
							<ul>  -->
								<!-- <li class="inisubvis">
									<a href="mediasmart.php?module=outbox&&in=vistrack"><span>Vistrax</span>
									</a>
								</li>
								<li class="inisubol">
									<a href="mediasmart.php?module=outbox&&in=olgabox"><span>Olga Box</span>
									</a>
								</li>
								<li class="iniguardbrg">
									<a href="mediasmart.php?module=outbox&&in=guardbrg"><span>Guard Barang</span>
									</a>
								</li>
								<li class="iniexp">
								<a href="mediasmart.php?module=outbox&&in=express"><span>Xpress</span>
								</a>
								</li>
								<li class="iniall"><a href="mediasmart.php?module=outbox">All</a></li>

							</ul>
						</li> -->
						<!-- <li>
							<a href="#">
								<i class="main-icon fa fa-pencil-square-o"></i> <span>Send WA</span>
							</a>
						</li> -->
					
						
					</ul>

					<!-- SECOND MAIN LIST -->
					<!-- <h3>MORE</h3>
					<ul class="nav nav-list">
						<li>
							<a href="calendar.html">
								<i class="main-icon fa fa-calendar"></i>
								<span class="label label-warning pull-right">2</span> <span>Calendar</span>
							</a>
						</li>
						<li>
							<a href="../../HTML/start.html">
								<i class="main-icon fa fa-link"></i>
								<span class="label label-danger pull-right">PRO</span> <span>Frontend</span>
							</a>
						</li>
					</ul> -->

				</nav>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->


			<!-- HEADER -->
			<header id="header">

				<!-- Mobile Button -->
				<button id="mobileMenuBtn"></button>

				<!-- Logo -->
				<span class="logo pull-left">
					<!-- <img src="assets/images/walog.jpg" alt="admin panel" height="35" /> -->
					<h4 style="margin-top: 13px;">Survey Admin</h4>
				</span>

				<form method="get" action="page-search.html" class="search pull-left hidden-xs">
					<input type="text" class="form-control" name="k" placeholder="Search for something..." />
				</form>

				<nav>

					<!-- OPTIONS LIST -->
					<ul class="nav pull-right">

						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img class="user-avatar" alt="" src="assets/images/noavatar.jpg" height="34" /> 
								<span class="user-name">
									<span class="hidden-xs">
										<?php echo $_SESSION['nama'] ?><i class="fa fa-angle-down"></i>
									</span>
								</span>
							</a>
							<ul class="dropdown-menu hold-on-click">

								<li><!-- logout -->
									<a href="config/auth.php?out"><i class="fa fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
						<!-- /USER OPTIONS -->

					</ul>
					<!-- /OPTIONS LIST -->

				</nav>

			</header>
			<!-- /HEADER -->


			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<!-- <header id="page-header">
					<h1>Blank Page</h1>
					<ol class="breadcrumb">
						<li><a href="#">Pages</a></li>
						<li class="active">Blank Page</li>
					</ol>
				</header> -->
				<!-- /page title -->

                <div id="content" class="padding-20">

                    <?php include("sr_dash.php"); ?>

                </div>


                </section>
			<!-- /MIDDLE -->

		</div>

		<!-- <style>
			img
			{
			width:40px;
			height:40px;
			border-radius:50%;
			border:2px solid #f0f0ff;
			padding:5px;    
			}
			img:hover
			{
				-moz-box-shadow: 0 5px 5px rgba(223, 120, 8, 1);
			-webkit-box-shadow: 0 5px 5px rgba(223, 120, 8, 1);
			box-shadow: 0 5px 5px rgba(223, 120, 8, 1);
				-webkit-transition: all 1.5s;
				-moz-transition: all 1.5s;
				transition: all 1.5s;
			cursor:pointer;
			}

		</style> -->


	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">
		            $(document).ready(function () {

						// console.log(window.location.href);

		                if (window.location.href == "https://guard.enseval.com/inbox/mediasmart.php?module=outbox&&in=vistrack") {
		                    $(".inioutbox").addClass("active");
							$(".inisubvis").addClass("active");
		                } else if (window.location.href == "https://guard.enseval.com/inbox/mediasmart.php?module=outbox&&in=olgabox") {
							$(".inioutbox").addClass("active");
							$(".inisubol").addClass("active");
						} else if (window.location.href == "https://guard.enseval.com/inbox/mediasmart.php?module=outbox") {
							$(".inioutbox").addClass("active");
							$(".iniall").addClass("active");
						} else if (window.location.href == "https://guard.enseval.com/inbox/mediasmart.php?module=outbox&&in=guardbrg") {
							$(".inioutbox").addClass("active");
							$(".iniguardbrg").addClass("active");
						} else if (window.location.href == "https://guard.enseval.com/inbox/mediasmart.php?module=outbox&&in=express") {
							$(".inioutbox").addClass("active");
							$(".iniexp").addClass("active");
						}
					});
                </script>
		

	</body>
</html>

<?php
	}  
?>