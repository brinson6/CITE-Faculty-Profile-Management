<?php

if (!isset($_SESSION))
	session_start();
error_reporting(E_ALL);

if (!isset($_PAGE_TITLE)) $_PAGE_TITLE = 'Admin';

require_once( '../includes/db_connection.php');
require_once( '../includes/user.php');
require_once('includes/ImageUpload.php');

?>
<!doctype html>
<html lang="en">

 <head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php echo $_PAGE_TITLE; ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="transparent" data-image="assets/img/admin_back.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
              MARSHALL UNIVERSITY
            </div>
            <ul class="nav">
			
			
              <?php //if(!empty($_SESSION["name"]) && $_SESSION["name"]=='yoow@marshall.edu'){ 
                $u = new User($conn, $_SESSION['id']); 
					if($u->get_permissions() >= 3){ ?>
					  <li>
                          <a href="faculty_members.php">
                              <i class="pe-7s-note2"></i>
                              <p>Faculty Members</p>
                          </a>
                      </li>

					<?php } ?>
          <?php if ($u->get_permissions() >= 2) {
            ?>
            <li>
              <a href="staff_members.php">
                <i class="pe-7s-note2"></i>
                <p>Staff Members</p>
              </a>
            </li>
            <?php
          }
          ?>
          <?php if ($u->get_permissions() >= 2) {
            ?>
            <li>
              <a href="departments.php"><i class="pe-7s-folder"></i><p>Manage Departments</p></a></li>
              <?php
          }

			  //}else { 

				if($_SESSION["admin_status"] == '0' && $_SESSION["prev_status"] == '1'){ ?>
						<li>
                         <a href="Admin_abtme.php">
                                      <i class="pe-7s-note2"></i>
                                      <p>Switch to Admin</p>
                                  </a>
                              </li>
					<?php
					}

			  ?>


                <li>
                   <a href="changepass.php">
                                <i class="pe-7s-note2"></i>
                                <p>Change Password </p>
                            </a>
                        </li>
                <li>
                   <a href="edit_profile.php">
                                <i class="pe-7s-note2"></i>
                                <p>About Me</p>
                            </a>
                        </li>
<?php
              //} ?>


                <li>
                    <a href="selected_publications.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Research</p>
                    </a>
                </li>
              <li>
                    <a href="services.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li>
                    <a href="teaching.php">
                        <i class="pe-7s-bell"></i>
                        <p>Teaching</p>
                    </a>
                </li>
				 <li>
                    <a href="news_your_news.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>News</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
