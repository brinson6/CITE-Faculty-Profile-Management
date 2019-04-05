<?php
session_start();
require '../includes/db_connection.php';

error_reporting(E_ERROR | E_PARSE);

    $priority = '';
    $division = '';

$display = isset($_GET["id"]) && is_numeric($_GET['id']) ? intval($_GET['id'])-1 : 0;
    if (isset($_GET['priority_only'])) $priority = ' AND priority=1';
    if (isset($_GET['division'])) $division = ' AND division_id=' . intval($_GET['division']);

    $sql = 'SELECT * FROM  news where status = "ACCEPTED"'. $priority . $division. ' order by timeOfNews desc limit ' . $display . ',1';


$result = $conn->query($sql);
?>
<!doctype html>
<html class="no-js" lang="en-US">
	<head>
		<meta http-equiv="x-ua-compatible" content="IE=edge">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>

			COLLEGE OF INFORMATION TECHNOLOGY AND ENGINEERING - Marshall University
		</title>

		<link rel="icon" href="https://www.marshall.edu/favicon.ico">
		<!-- <link rel="stylesheet" href="http://ch9.8aa.myftpupload.com/wp-content/themes/mux2/css/app.css"> -->
		<link rel="stylesheet" href="http://ch9.8aa.myftpupload.com/wp-content/themes/mux2/css/new-app.min.css">
		<!-- <link rel="stylesheet" href="http://www.marshall.edu/home/css/app.min.css"> -->
		<link rel="stylesheet" href="http://ch9.8aa.myftpupload.com/wp-content/themes/mux2/css/overrides.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800">
		<link rel="stylesheet" href="//cloud.typography.com/6507934/7480552/css/fonts.css">

		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window,document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '196533267737190');
			fbq('track', 'PageView');
		</script>

		<noscript>
			<img height="1" width="1" src="https://www.facebook.com/tr?id=196533267737190&ev=PageView&noscript=1"/>
		</noscript>

		<meta name='robots' content='noindex,follow' />
<link rel='dns-prefetch' href='//s.w.org' />
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/ch9.8aa.myftpupload.com\/wp-includes\/js\/wp-emoji-release.min.js"}};
			!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='foundation-icon-css'  href='http://ch9.8aa.myftpupload.com/wp-content/plugins/easy-foundation-shortcodes/styles/foundation-icons.css' type='text/css' media='all' />
<link rel='stylesheet' id='sccss_style-css'  href='http://ch9.8aa.myftpupload.com?sccss=1' type='text/css' media='all' />
<script type='text/javascript' src='http://ch9.8aa.myftpupload.com/wp-content/themes/mux2/js/jquery/dist/jquery.min.js'></script>
<script type='text/javascript' src='http://ch9.8aa.myftpupload.com/wp-content/themes/mux2/js/modernizr/modernizr.min.js'></script>
<link rel='https://api.w.org/' href='http://ch9.8aa.myftpupload.com/wp-json/' />
<link rel="alternate" type="application/json+oembed" href="http://ch9.8aa.myftpupload.com/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fch9.8aa.myftpupload.com%2F" />
<link rel="alternate" type="text/xml+oembed" href="http://ch9.8aa.myftpupload.com/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fch9.8aa.myftpupload.com%2F&#038;format=xml" />
		<style type="text/css" id="wp-custom-css">
			
     .index {
         margin-bottom: 20px;
         font-size: 14px;
     }
     .index a {
         display: block; 
         padding: 9px 10px;
     }
     .index tr:nth-of-type(2n) td {
         background: #f9f9f9;
     }
     h3.directory {
         clear: left;
         font-size: 24px;
         margin: 20px 0 8px;
     }
     h3.directory a {
         color: #333;
         text-decoration: none;
     }
     h3.directory a:hover, h3.directory a:active {
         color: #00ae42;
     }
     dl.directory {
         font-size: 14px;
         line-height: 1.5;
     }
     dl.directory dt {
         clear: left;
         padding: 9px 10px 0;
         font-size: 15px;
     }
     dl.directory dd {
         margin: 0 0 1em 0.5em;
         padding: 0 10px 9px;
     }
     dl.directory dd img {
         width: 100px;
         height: 100px;
         float: left;
         margin: 5px 10px 20px 0px;
     }
     dl.directory dd br.img {
         display: none;
     }
     .dirListing>div, .dirIndex>div {
         margin: 1px;
     }
     .dirListing.alt>div, .dirIndex.alt>div {
         background-color: #f9f9f9;
     }
     .col2 {
         width: 50%;
         float: left;
     }
     .col3 {
         width: 33%;
         float: left;
     }
     .dirListing.col2>div, .dirListing.col3>div {
         height: 170px;
     }
     .clr {
         clear: both;
         height: 1px;
         overflow: hidden;
     }


.divider{
     width:50px;
     height:auto;
     display:inline-block;
}
 .button1 {
     background-color: #04954a;
    /* Green */
     border: none;
     color: white;
     padding: 15px 32px;
     text-align: center;
     text-decoration: none;
     display: inline-block;
     font-size: 16px;
     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
/* The Overlay (background) */
 .overlay {
    /* Height & width depends on how you want to reveal the overlay (see JS below) */
     height: 100%;
     width: 100%;
     position: relative;
    /* Stay in place */
     z-index: 1;
    /* Sit on top */
     bottom: 100px;
     left: 100px;
     background-color: opacity 1;
    /* Clear */
     overflow-x: hidden;
    /* Disable horizontal scroll */
}
/* Position the content inside the overlay */
 .overlay-content {
     position: fixed;
     top: 10%;
    /* 25% from the top */
     width: 100%;
    /* 100% width */
     height: 50%;
     text-align: center;
    /* Centered text/links */
     margin-top: 30px;
    /* 30px top margin to avoid conflict with the close button on smaller screens */
}
/* The navigation links inside the overlay */
 .overlay a {
     padding: 8px;
     text-decoration: none;
     font-size: 36px;
     color: #818181;
     display: block;
    /* Display block instead of inline */
     transition: 0.3s;
    /* Transition effects on hover (color) */
}
/* When you mouse over the navigation links, change their color */
 .overlay a:hover, .overlay a:focus {
     color: #f1f1f1;
}
/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
 @media screen and (max-height: 450px) {
     .overlay a {
        font-size: 20px
    }
     .overlay .closebtn {
         font-size: 40px;
         top: 15px;
         right: 35px;
    }
}
 
 
 #leftSidebar {
	float: left;
	width: 17%;
	/*border-right: 1px solid; 
	border-color: black;*/
	padding-left:1%;
	padding-right: 1%;
 }
 
 #rightSidebar {
	float: right;
	width: 17%;
	/*border-left: 1px solid; 
	border-color: black;*/

	padding-right: 1%; 
 }
 
 #columnmain
 {
	width: 60%;
	margin-left: 18%;
	margin-right: 16%;
 }
 
 .blank-under{
    background:#04954a;
}		</style>
	
		<style>

		.site-title {
			color:#f7f7f7;
			font-family: "Sentinel A", "Sentinel B" !important;
			font-weight: 100;
			text-transform: uppercase;
			font-size: 2.5rem;
			letter-spacing: 1px;
		}

		a.site-title:hover, a.site-title:focus  {
			color:#f7f7f7;
		}

		input.vfb-checkbox, input[type="checkbox"].vfb-checkbox, input.vfb-radio, input[type="radio"].vfb-radio { display: inline }

		.vfbp-form .btn-primary { background: #04954a!important }

		.vfbp-form .btn-primary:hover { background: #005f2e!important }

		input[type="text"], input[type="text"]:focus, .top-bar input { background: white; color: #000}
		.article_image {
			float: left;
			margin: 10px;
		}
		
		.article-text {
			padding: 20px 100px;
		}

		</style>

	</head>
	<body class="home page-template page-template-page-full-width-hero-no-title page-template-page-full-width-hero-no-title-php page page-id-11311">

	<!-- Google Tag Manager -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KPF4KW"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KPF4KW');</script>
	<!-- End Google Tag Manager -->

	
	<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">

		<div id="alert">
  		<mu-alerts></mu-alerts>
		</div>
	
	<!-- Top Bar / Quick Access Links & Search Bar for Mobile -->
<div class="greenbarmobile hide-for-large-up" style="background:#04954a;padding:10px;"></div>
  <nav class="tab-bar hide-for-large-up">
    <section class="right-small">
      <a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
    </section>
    <section class="middle tab-bar-section">
      <li class="name" style="height: 100%; max-height: 100%; width: auto; padding-left: 0; margin-left: -18px;!important">
        <a href="https://www.marshall.edu/">
          <img src="https://www.marshall.edu/home/img/main/mu_logo_blk.png" style="height: 100%; width: auto;">
        </a>
      </li>
    </section>
  </nav>
	<!-- Off Canvas Menu for Mobile & Tablet -->
<aside class="right-off-canvas-menu" aria-hidden="true" style="padding:10px;">
  <div class="row">
    <a href="https://mymu.marshall.edu"  style="float:left;"><i class="fi-torso"><p class="access-logo-font">MyMU</p></i></a>
    <br><br>
    <a href="https://www.marshall.edu/muonline/"  style="float:left;"><i class="fi-laptop"><p class="access-logo-font">MUOnLine</p></i></a>
    <br><br>
    <a href="https://www.marshall.edu/phonebook.php"  style="float:left;"><i class="fi-address-book"><p class="access-logo-font">Directory</p></i></a>
    <br> <br>
    <a href="#" data-reveal-id="myModal" style="float:left;"><i class="fi-magnifying-glass"><p class="access-logo-font">Search</p></i></a>
  </div>
  <hr style="margin-left: -10px;">
  <!-- Main Top Nav Links -->
  <ul style="line-height: 2rem;">
    <li><a href="https://www.marshall.edu/home/about">About Marshall</a></li>
    <li><a href="https://www.marshall.edu/home/futurestudents">Future Students</a></li>
    <li><a href="https://www.marshall.edu/home/students">Current Students</a></li>
    <li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
    <li><a href="https://www.marshall.edu/home/facultystaff">Faculty/Staff</a></li>
  </ul>
  <hr style="margin-left: -10px;">
  <!-- Footer Nav Links placed in Sidebar -->
  <ul style="line-height: 2rem;">
    <li><a href="https://www.marshall.edu/siteindex.asp">A-Z Index</a></li>
    <li><a href="https://www.marshall.edu/home/about">About Marshall</a></li>
    <li><a href="https://www.marshall.edu/home/academics">Academics</a></li>
    <li><a href="https://www.marshall.edu/home/administration">Administration</a></li>
    <li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
    <li><a href="http://www.herdzone.com/">Athletics</a></li>
    <li><a href="https://www.marshall.edu/home/students/">Current Students</a></li>
    <li><a href="https://donatenow.networkforgood.org/mufoundation">Donate</a></li>
    <li><a href="https://www.marshall.edu/human-resources/job-opportunities/">Employment Opportunities</a></li>
    <li><a href="https://www.marshall.edu/emergency/">Emergency Info</a></li>
    <li><a href="https://www.marshall.edu/home/facultystaff">Faculty/Staff</a></li>
    <li><a href="https://www.marshall.edu/sfa/">Financial Aid</a></li>
    <li><a href="https://www.marshall.edu/home/futurestudents">Future Students</a></li>
    <li><a href="https://www.marshall.edu/home/locations">Locations</a></li>
    <li><a href="https://www.marshall.edu/foundation/">MU Foundation</a></li>
    <li><a href="https://www.marshall.edu/muonline/">MUOnline</a></li>
    <li><a href="https://mymu.marshall.edu/">MyMU</a></li>
    <li><a href="https://www.marshall.edu/home/research">Research</a></li>
  </ul>
  <hr style="margin-left: -10px;">
  <!-- University Informatoin & Social Media Icons -->
  Marshall University
  <br>
  1 John Marshall Drive
  <br>
  Huntington, WV 25755
  <br>
  <a href="tel:1304693170">1 (304) 696-3170</a>
  <br>
  <a href="https://www.facebook.com/marshallu"><i class="fi-social-facebook" style="font-size: 2em;"></i></a>
  <a href="https://www.marshall.edu/connected/twitter-directory/"><i class="fi-social-twitter" style="font-size: 2em;"></i></a>
  <a href="https://www.youtube.com/user/HerdVideo"><i class="fi-social-youtube" style="font-size: 2em;"></i></a>
  <a href="https://www.marshall.edu/connected/instagram-directory/"><i class="fi-social-instagram" style="font-size: 2em;"></i></a>
  <a href="https://muphotos.marshall.edu"><i class="fi-camera" style="font-size: 2em;"></i></a>
</aside>
	<!-- Top Bar / Quick Access Links & Search Bar -->
<div class="contain-to-grid green-bar show-for-large-up">
  <div class="row">
    <a href="#" data-reveal-id="myModal"><i class="fi-magnifying-glass align-right"><p class="access-logo-font">Search</p></i></a>
    <a href="https://www.marshall.edu/phonebook.php"><i class="fi-address-book align-right"><p class="access-logo-font">Directory</p></i></a>
    <a href="https://www.marshall.edu/muonline/"><i class="fi-laptop align-right"><p class="access-logo-font">MUOnLine</p></i></a>
    <a href="https://mymu.marshall.edu/"><i class="fi-torso align-right"><p class="access-logo-font">MyMU</p></i></a>
  </div>
</div>

<!-- Google Search Script -->
<script>
  (function() {
    var cx = '010773603321931097386:eebbbyp-atu';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
  
setTimeout("document.getElementById('gsc-i-id1').focus();", 2000);
</script>

<!-- Search Reveal Modal  -->
<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
   <gcse:search></gcse:search>
     <a class="close-reveal-modal hide-for-large-up" style="top: 0;right: 0.5rem;" aria-label="Close">&#215;</a>
</div>  


	<!-- Second Bar / Main Navigation Section -->
<div class="top-bar-container contain-to-grid link-bar show-for-large-up" role="navigation">
  <nav class="top-bar link-bar" data-topbar role="navigation" style="padding-right: 0;">
    <section class="top-bar-section nav-bar">

      <!-- Marshall University Logo -->
      <ul class="title-area">
        <li class="name">
         <a href="https://www.marshall.edu/">
           <img src="//www.marshall.edu/home/img/main/mu_logo_blk.png" style="position: relative;height: 49px;width: auto;margin-top: -3px;">
         </a>
        </li>
      </ul>

      <!-- Global Main Navigation Links -->
      <ul class="right">
        <li><a href="https://www.marshall.edu/home/about">About Marshall</a></li>
        <li><a href="https://www.marshall.edu/home/futurestudents">Future Students</a></li>
        <li><a href="https://www.marshall.edu/home/students">Current Students</a></li>
        <li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
        <li><a href="https://www.marshall.edu/home/facultystaff">Faculty/Staff</a></li>
      </ul>

    </section>
  </nav>
</div>

<section class="container" role="document">
	
<!-- Header Bar With Hero Image -->
<!-- Featured Image Script and Stlying Tags -->
<div id="post" class"page-header-img" style="background-image: url('')">
</div>



<!-- Featured Image -->
<div class="header-image">
</div>


<!-- Department Name -->
<div class="blank-space">
  <div class="row">
    <div class="large-12 columns">
        <h1><a href="http://ch9.8aa.myftpupload.com/" class="site-title">COLLEGE OF INFORMATION TECHNOLOGY AND ENGINEERING</a></h1>
    </div>
  </div>
</div>
<!-- Navigation Menu -->
<!-- Navigation Menu -->
<div class="row" >
	<nav class="top-bar page-bar" data-topbar role="navigation">
		<ul class="title-area">
			<li class="name hide-for-medium-up">
				<h1>Menu</h1>
			</li>
			<li class="toggle-topbar menu-icon">
				<a href="#"><span></span></a>
			</li>
		</ul>
		<section class="top-bar-section">
			<ul id="menu-deanspagenavigation" class="top-bar-menu"><li class="divider"></li><li id="menu-item-10624" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10624"><a href="http://ch9.8aa.myftpupload.com/about-cite1/">About CITE</a></li>
<li class="divider"></li><li id="menu-item-11063" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-11063"><a href="http://ch9.8aa.myftpupload.com/prospective-students/admissions/">Prospective Students</a></li>
<li class="divider"></li><li id="menu-item-10932" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10932"><a href="http://ch9.8aa.myftpupload.com/current-students/">Current Students</a></li>
<li class="divider"></li><li id="menu-item-11082" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-11082"><a href="http://ch9.8aa.myftpupload.com/faculty-and-staff/">Faculty and Staff</a></li>
<li class="divider"></li><li id="menu-item-11061" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-11061"><a href="http://ch9.8aa.myftpupload.com/alumni/">Alumni</a></li>
<li class="divider"></li><li id="menu-item-11080" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children has-dropdown menu-item-11080"><a href="#">Academics</a>
<ul class="sub-menu dropdown">
	<li id="menu-item-10930" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10930"><a href="#">Weisberg Division of Applied Science and Technology</a></li>
	<li id="menu-item-10928" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10928"><a href="/cs-home-test/">Weisberg Division of Computer Science</a></li>
	<li id="menu-item-10931" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10931"><a href="/division-of-engineering/">Weisberg Division of Engineering</a></li>
</ul>
</li>
</ul>		</section>
	</nav>
</div>


<!-- Content Area -->
<div class="large-12">
		<?php  
			$no_news = mysqli_num_rows($result);
			if($no_news == 0) {  ?>
				<div class="col-md-12">
				   <div class="form-group" align = "center">
						<h4><b>There are no current live news on this page.</b> </h4>
				   </div>
			   </div>
			<?php } else {
				while($row = $result->fetch_assoc()) { ?>
					<div class="col-md-12" align = "center">
						 <div class="form-group" >
							<h2><b><?php echo $row['title'];?></b> </h2>
						 </div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12" align = "center">
						<div class="form-group">
						<?php 
							$date = date('F j, Y', strtotime($row['dateAndTime']));
						?>
							<label><b>Posted on <?php echo $date;?></b></label>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-8">		
						<div class="form-group article-text">
							<p align = "justify">
							<?php 
									echo '<img class="article_image" src="' . ($row['imageName'] == '' ? '../images/default_image.png' : $row['imageName']) . '" width="200px" height="200px" >';
								?>	
								<?php 	echo $row['description'];	?>
							</p>
						</div>
					</div>     
					<div class="clearfix"></div>											
				</div>
				<?php 
				}
			}
		?>
</div>
<div class="large-12" style="padding-left: 100px; font-size: 12pt; font-weight: bold;">
	<a href="http://ch9.8aa.myftpupload.com/about-cite1/news/">Back to News</a>
</div>

<!-- Footer -->
<!-- Footer and end of document content and functions  -->

			<!-- Footer WordPress Widgets -->
			<div class="full-footer-area">
				<div class="row">
																			</div>
			</div>

			<!-- Footer WordPress Widgets -->
			<div class="footer-area">
				<div class="row">
																			</div>
			</div>

			<!-- Global Footer Area -->
			<div class="footer-link-area show-for-large-up">
				<div class="row">
					<div class="large-3 columns">

						<!-- College Or University -->
						<span itemscope itemtype="http://schema.org/CollegeOrUniversity">

							<span itemprop="name">Marshall University</span>
							<br>

							<!-- Alternate Name URL Logo -->
							<meta itemprop="alternateName" content="MU" >
							<meta itemprop="url" content="http://www.marshall.edu/">
							<meta itemprop="logo" content="http://www.marshall.edu/home/img/main/mu_logo_blk.png">
							<!-- / Alternate Name URL Logo -->

							<!-- Same As -->
							<meta itemprop="sameAs" content="https://en.wikipedia.org/wiki/Marshall_University">
							<meta itemprop="sameAs" content="https://plus.google.com/+marshalluniversity">
							<meta itemprop="sameAs" content="https://www.youtube.com/user/HerdVideo">
							<meta itemprop="sameAs" content="https://storify.com/marshallu">
							<meta itemprop="sameAs" content="https://www.facebook.com/marshallu">
							<meta itemprop="sameAs" content="https://twitter.com/marshallu">
							<meta itemprop="sameAs" content="https://www.instagram.com/marshallu/">
							<meta itemprop="sameAs" content="https://www.pinterest.com/marshallu/">
							<meta itemprop="sameAs" content="https://www.linkedin.com/company/marshall-university" >
							<meta itemprop="sameAs" content="https://www.yelp.com/biz/marshall-university-huntington-2" >
							<meta itemprop="sameAs" content="https://foursquare.com/v/marshall-university/4b4808eef964a520b74626e3">
							<meta itemprop="sameAs" content="https://www.periscope.tv/marshallu/1RDGlYMLZbVJL">
							<meta itemprop="sameAs" content="https://collegescorecard.ed.gov/school/?237525-Marshall-University">
							<!-- / Same As -->

							<!-- Place -->
							<span itemprop="location" itemscope itemtype="http://schema.org/Place">

								<!-- Map -->
								<span itemprop="hasMap" itemscope itemtype="http://schema.org/Map">
									<meta itemprop="url" content="https://www.google.com/maps/place/Marshall+University/@38.421856,-82.429605,17z/data=!4m5!3m4!1s0x0:0xeed0f12f87d42ef6!8m2!3d38.423074!4d-82.4292444?hl=en">
								</span>
								<!-- / Map -->

								<!-- Geo Coordinates -->
								<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
									<meta itemprop="latitude" content="38.421856" >
									<meta itemprop="longitude" content="-82.429605" >
								</span>
								<!-- / Geo Coordinates -->

								<!-- Postal Address -->
								<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

									<span itemprop="streetaddress">1 John Marshall Drive</span><br>
									<span itemprop="addressLocality">Huntington</span>,
									<span itemprop="addressRegion"><abbr  style="border-bottom: none; color: #e4e4e4;font-size: 1rem;" title="West Virginia">WV</abbr></span>
									<span itemprop="postalCode">25755</span><br>
									<meta itemprop="addressCountry" content="US">
								</span>
								<!-- / Postal Address -->

							</span>
							<!-- /Place -->

							<a href="tel:+1-304-696-3170"><span itemprop="telephone">+1-304-696-3170</span></a>

						</span>
						<!-- / College Or University -->

						<br>
						<a href="https://www.facebook.com/marshallu"><i class="fi-social-facebook" style="font-size: 2em;padding-top:5px;"></i></a>
						<a href="https://twitter.com/marshallu"><i class="fi-social-twitter" style="font-size: 2em;padding-top:5px;"></i></a>
						<a href="https://www.youtube.com/user/HerdVideo"><i class="fi-social-youtube" style="font-size: 2em;padding-top:5px;"></i></a>
						<a href="https://www.instagram.com/marshallu/"><i class="fi-social-instagram" style="font-size: 2em;padding-top:5px;"></i></a>
						<a href="https://muphotos.marshall.edu"><i class="fi-camera" style="font-size: 2em;padding-top:5px;"></i></a>
					</div>
					<div class="large-3 columns">
						<ul>
							<li><a href="https://www.marshall.edu/siteindex.asp">A-Z Index</a></li>
							<li><a href="https://www.marshall.edu/home/about">About Marshall</a></li>
							<li><a href="https://www.marshall.edu/home/academics">Academics</a></li>
							<li><a href="https://www.marshall.edu/home/administration">Administration</a></li>
							<li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
							<li><a href="http://www.herdzone.com/">Athletics</a></li>
						</ul>
					</div>
					<div class="large-3 columns">
						<ul>
							<li><a href="https://www.marshall.edu/home/students">Current Students</a></li>
							<li><a href="https://donatenow.networkforgood.org/mufoundation">Donate</a></li>
							<li><a href="https://www.marshall.edu/human-resources/job-opportunities/">Employment Opportunities</a></li>
							<li><a href="https://www.marshall.edu/emergency/">Emergency Info</a></li>
							<li><a href="https://www.marshall.edu/home/facultystaff">Faculty/Staff</a></li>
							<li><a href="https://www.marshall.edu/sfa/">Financial Aid</a></li>
						</ul>
					</div>
					<div class="large-3 columns">
						<ul>
							<li><a href="https://www.marshall.edu/home/futurestudents">Future Students</a></li>
							<li><a href="https://www.marshall.edu/home/locations">Locations</a></li>
							<li><a href="https://www.marshall.edu/foundation/">MU Foundation</a></li>
							<li><a href="https://www.marshall.edu/muonline/">MUOnline</a></li>
							<li><a href="https://mymu.marshall.edu/">MyMU</a></li>
							<li><a href="https://www.marshall.edu/home/research">Research</a></li>
						</ul>
					</div>
				</div>
			</div>

			<!-- Page Anchor Footer -->
			<div class="full-width" role="contentinfo" id="footer">
				<div class="row">
					<div class="large-12 columns">
						<img src="https://www.marshall.edu/home/img/main/mu_logo_footer.png">
				 		<p>
							Copyright &copy; 2018 Marshall University
							| An Equal Opportunity University
							| <a href="https://www.marshall.edu/home/accreditation">Accreditation</a>
							| <a href="https://www.marshall.edu/disclosures/">Consumer Information and Disclosures</a>
						</p>
					</div>
				</div>
			</div>

			<!-- Allows off-canvas menu to close -->
			<a class="exit-off-canvas"></a>
					</div>
	</div>

		<script type='text/javascript' src='http://ch9.8aa.myftpupload.com/wp-content/themes/mux2/js/app.js'></script>
<script type='text/javascript' src='http://ch9.8aa.myftpupload.com/wp-includes/js/wp-embed.min.js'></script>
		<script src="https://www.marshall.edu/home/js/build-alert.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/es6-promise/4.1.1/es6-promise.js'></script>
</body>
</html>
