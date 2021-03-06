<?php
try{
require '../constants.php';
session_start();
require 'includes/db_connection.php';

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}
else {
	$id = '1';
}
 $sql = 'SELECT * FROM faculty_member where id = "'.$id.'" ';
 $result = $conn->query($sql);
  $row_faculty = $result->fetch_assoc();
  if($row_faculty['name'] != Null) {

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Faculty Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
 <style>
#fcontainer {
        /*border: 2px dashed #444;*/
        height: 30px;

        /*text-align: justify;*/
        -ms-text-justify: distribute-all-lines;
        text-justify: distribute-all-lines;

        /* just for demo */
        max-width: 600px;
    }

    .fbox1, .fbox2, .fbox3, .fbox4 {
        width: 195px;
        /*height: 125px;*/
        vertical-align: top;
        display: inline-block;
        *display: inline;
        zoom: 1
    }
    .fstretch {
        width: 100%;
        display: inline-block;
        font-size: 0;
        line-height: 0
    }

    .fbox1, .fbox3 {
        /*background: #ccc*/
    }
    .fbox2, .fbox4 {
        /*background: #0ff*/
    }
</style>
</head>

<body>
  <div id="mySidenav" class="sidenav" style="width: 0px;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="ss">
	<li>    <a href="admin" style="float:left;"><img src="images/1.jpg" /> Profile Login</span></a></li>
  <li>    <a href="http://mymu.marshall.edu" style="float:left;"><img src="images/1.jpg" /> MyMU</a> </li>
   <li><a href="http://www.marshall.edu/muonline/" style="float:left;"><img src="images/1.jpg" class="float-left" /> MUOnLine </a></li>
   <li>    <a href="http://www.marshall.edu/phonebook.php" style="float:left;"><img src="images/1.jpg" class="float-left" />Directory</a> </li>
    <li>   <a href="#" data-reveal-id="myModal" style="float:left;"><img src="images/1.jpg" class="float-left" />Search </a></li>

		<li><a href="about">About Marshall</a></li>
		<li><a href="futurestudents">Future Students</a></li>
		<li><a href="students">Current Students</a></li>
		<li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
		<li><a href="facultystaff">Faculty/Staff</a></li>

		<li><a href="http://www.marshall.edu/siteindex.asp">A-Z Index</a></li>
		<li><a href="about">About Marshall</a></li>
		<li><a href="academics">Academics</a></li>
		<li><a href="administration">Administration</a></li>
		<li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
		<li><a href="http://www.herdzone.com/">Athletics</a></li>
		<li><a href="students">Current Students</a></li>
		<li><a href="https://donatenow.networkforgood.org/mufoundation">Donate</a></li>
		<li><a href="http://www.marshall.edu/human-resources/job-opportunities/">Employment Opportunities</a></li>
		<li><a href="http://www.marshall.edu/emergency/">Emergency Info</a></li>
		<li><a href="facultystaff">Faculty/Staff</a></li>
		<li><a href="http://www.marshall.edu/sfa/">Financial Aid</a></li>
		<li><a href="futurestudents">Future Students</a></li>
		<li><a href="locations">Locations</a></li>
		<li><a href="http://www.marshall.edu/foundation/">MU Foundation</a></li>
		<li><a href="http://www.marshall.edu/muonline/">MUOnline</a></li>
		<li><a href="https://musso.marshall.edu/">MyMU</a></li>
		<li><a href="research">Research</a></li>
	   <li>		<!-- University Informatoin & Social Media Icons -->
	 		<a href="tel:13046965034">1 (304) 696-5034</a>
       </li>
       <li> <a href="https://www.facebook.com/marshallu" class="side-i-class fi-social-facebook">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">Facebook</span>
        </a>
		</li>

        <li><a href="http://www.marshall.edu/connected/twitter-directory/" class="side-i-class fi-social-twitter">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">Twitter Directory</span>
        </a>
		</li>
		<li>
        <a href="https://www.youtube.com/user/HerdVideo" class="side-i-class fi-social-youtube">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">Youtube</span>
        </a>
		</li>
		<li>
        <a href="http://www.marshall.edu/connected/instagram-directory/" class="side-i-class fi-social-instagram">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">Instagram Directory</span>
        </a>
		</li>
        <li><a href="http://muphotos.marshall.edu" class="side-i-class fi-camera">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">MU Photos</span>
        </a></li>
		</ul>
</div>
<header>
<div class="top_header">
<ul class="list">
<li><a href="#"><img src="images/1.jpg" class="float-left" /> <span class="icon-top">MyMU</span></a></li>
<li><a href="#"><img src="images/2.jpg" class="float-left" /> <span class="icon-top">MUOnLine</span></a></li>
<li><a href="#"><img src="images/3.jpg" class="float-left" /> <span class="icon-top">Directory</span></a></li>
<li><a href="#"><img src="images/4.jpg" class="float-left" /> <span class="icon-top">Search</span></a></li>
<li><a href="admin"><img src="images/1.jpg" class="float-left" /><span> <span class="icon-top">Profile Login</span></a></li>

</ul>
</div>
<div class="main-menu">
<div class="full-width">
<div class="logo"><a href="/finalproject/"><img src="images/logo.jpg" /></a></div>
<div class="shomobile">
<i class="fa  fa-align-justify" onclick="openNav()"></i>
</div>
<div class="main-menu-container">
<nav>

<ul class="list">
<li><a href="#">ABOUT MARSHALL</a></li>
<li><a href="#">FUTURE STUDENT</a></li>
<li><a href="#">CURRENT STUDENT</a></li>
<li><a href="#">ALUMINI</a></li>
<li ><a href="#">FACULTY/STAFF</a></li>
</ul>

</nav>
</div>
</div>
</div>
<div class="bottom-header">College of Information Technology and Engineering</div>
</header>

<div class="link_header">
<ul class="main-navigation">
	<li><a href="#">ABOUT CITE <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">MISSION</a></li>
			<li><a href="#">MESSAGE FROM THE DEAN</a></li>
			<li><a href="#">CONTACT INFORMATION</a></li>
			<li><a href="#">DIRECTIONS</a></li>
			<li><a href="#">NEWS</a></li>
			<li><a href="#">CURRENT FACULTY AND STAFF</a></li>
			<li><a href="#">JOB OPPORTUNITIES AT CITE</a></li>
			<li><a href="#">MESSAGE FROM THE DEAN</a></li>
			<li><a href="#">PROGRAM ACCREDITATION</a></li>
		</ul>
	</li>
	<li><a href="#">ACADEMIC <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">DEGREE PROGRAMS</a></li>
			<li><a href="#">DIVISIONS      <img src="images/side.png" class="float-right" /></a>
							<ul>
							<li><a href="#">WEISBERG DIVISION OF COMPUTER SCIENCE</a>
							<li><a href="#">WEISBERG DIVISION OF ENGINEERING</a>
							<li><a href="#">DIVISION OF APPLIED SCIENCE AND TECHNOLOGY</a></li>
						</ul>
			<li><a href="#">COURSE INFORMATION</a>
			<li><a href="#">CURRENT SYLLABI</a></li>
		</ul>
</li>
	<li><a href="#">STUDENTS <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">PROSPECTIVE STUDENTS</a></li>
			<li><a href="#">RESOURCES</a></li>
			<li><a href="#">SCHOLARSHIPS AND AWARDS</a></li>
		<li><a href="#">STUDENT RESEARCH</a></li>
		<li><a href="#">PROSPECTIVE STUDENTS</a></li>
		<li><a href="#">ACTIVITIES</a></li>
		<li><a href="#">PROJECTS</a></li>
	<li><a href="#">STUDENT ORGANIZATIONS</a></li>
		<li><a href="#">MEET OUR STUDENTS</a></li>
	</ul>
</li>
	<li><a href="#">FACULTY <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">RESOURCES</a></li>
			<li><a href="#">CITE COMMITTEES MEMBERS</a></li>
		</ul>
	</li>
	<li><a href="#">ALUMNI <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">ALUMNI</a></li>
			<li><a href="#">ALUMNI ORGANIZATIONS</a></li>
				<li><a href="#">GIVE TO CITE</a></li>
		</ul>
	</li>
</ul>
</div>

<div class="pagecontent">
<div class="left">
<h1>
<?php echo $row_faculty['name']; ?> <?php echo $row_faculty['l_name']?>  </p>

</h1>
 <div class="collapse navbar-collapse navbar-right">

        <ul class="tap">
          <li ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'prof')" id="defaultOpen"><i class="fa  fa-user"></i>About Me</a></li>
          <li ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'reaearch')"><i class="fa fa-book"></i>Research</a></li>
          <li  ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'services')"><i class="fa fa-pencil-square-o"></i>Services</a></li>
          <li  ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'teaching')"><i class="fa fa-clock-o"></i>Teaching</a></li>
        </ul>
      </div>
</div>


<div class="right">
<div id="prof" class="tabcontent">
	<?php
	echo "<h3>About Me</h3>";
	?>
      <div class="professor_img">
	  <div class="img_cont">
     <img src="<?php echo str_replace('../','',$row_faculty['image']);?>">	 <div class="professor_img_caption">
	 <p><?php echo $row_faculty['name']?> <?php echo $row_faculty['l_name']?>  </p>
	 <p><?php echo $row_faculty['designation']?></p>
	 </div>
</div>
	 <?php

	 if(isset($_GET['id'])) {
	 	$id = $_GET['id'];
	 }
	 else {
	 	$id = '1';
	 }
	  $sql = 'SELECT * FROM faculty_member where id = "1" ';
	  $res = $conn->query($sql);
	   $row_fa = $res->fetch_assoc();
	 	 ?>
 <?php if($row_fa['division'] != "") { ?> <p><a> Division: <?php echo($row_fa['division']); ?> <?php } ?>

		 <?php if($row_faculty['office_address'] != "") { ?> <p><a> Office: <?php echo($row_faculty['office_address']); ?> <?php } ?>
<?php if($row_faculty['phone'] != "") { ?> <p><a href="tel:952-220-7201"><i class="fa  fa-phone"></i><tr><td><?php echo($row_faculty['phone']); ?></td></tr></a></p> <?php } ?>
<p><a href="email:abc@gmail.com"><i class="fa fa-envelope"></i> <?php echo $row_faculty['email']?></a></p>
      </div>

<div class="professor_content">
<!-- <h2>Bio</h2> -->
<div class="tab">
	<p align="left"> <?php	echo "<h3>About Me</h3>";?></p>
</div>

<p align="justify"> <?php echo $row_faculty['overview']?></p>
<?php if($row_faculty['degree1'] != "") { ?>
	<?php
	echo "<h2>Education</h2>";
	?>
	<div class = "topic">

<ol>
	<?php if($row_faculty['degree1'] != "") { ?>
		<li> <p><a><?php echo($row_faculty['degree1']); ?>.</a> <?php if($row_faculty['degree1_school'] != "") { ?> <?php echo($row_faculty['degree1_school']); ?><?php } ?>, <?php if($row_faculty['degree1_year'] != "0") {?> <?php echo($row_faculty['degree1_year']); ?></p> </li><?php } ?> <?php } ?>


<?php if($row_faculty['degree2'] != "") { ?>
	<li> <p><a><?php echo($row_faculty['degree2']); ?>.</a> <?php if($row_faculty['degree2_school'] != "") {?> <?php echo($row_faculty['degree2_school']); ?><?php } ?>, <?php if($row_faculty['degree2_year'] != "0") { ?> <?php echo($row_faculty['degree2_year']); ?></p> </li>
	<?php } ?> <?php  } ?>


<?php if($row_faculty['degree3'] != "") { ?>
	<li> <p><a><?php echo($row_faculty['degree3']); ?>.</a> <?php if($row_faculty['degree3_school'] != "") {?> <?php echo($row_faculty['degree3_school']); ?><?php } ?>, <?php if($row_faculty['degree3_year'] != "0") { ?> <?php echo($row_faculty['degree3_year']); ?></p> </li>
	<?php } ?> <?php } ?>
</ol>
	  <?php } ?>

</div>

</div><!---inrto-cont-->

</div><!---#prof ends--->


<div class="tabcontent" id="reaearch">
	<?php
	echo "<h3>Research</h3>";
	?>
<div class="publica">

		<?php
		echo "<h2>Research Summary</h2>";
		?>
<div class="pub_cont">
 <?php
  $sqlR = 'SELECT * FROM research where facult_id = "'.$id.'"';
  //echo $sqlR;exit;
 $resultR = $conn->query($sqlR);
   while($row = $resultR->fetch_assoc()) {?>
		<div class="pub_cont">
		<div class="pub_news">
		<p> <?php echo $row['summary'] ?></p>
		</div>
		</div>
<?php
   }
 ?>

 <?php
 echo "<h2>Selected publications</h2>";
 ?>

 <div class="pub_cont">
	<div class="pub_news">
	 <?php
		$get_publications = 'SELECT * FROM selected_publications where faculty_id = "'.$id.'"';
		$result = $conn->query($get_publications);
		while($row = $result->fetch_assoc()) {
		?>

		<ul>
		<li>
			<p><span class="author"> <?php echo $row['publication_title'] ?></span>, <?php echo $row['publication_author'] ?></p>
			<p><?php echo $row['publication_type'] ?>,</span> <?php echo $row['data'] ?></p>.
			</li>
		</ul>

	<?php
	   }
	 ?>
	 </div>
</div>

<?php
echo "<h2>Funds</h2>";
?>
 <div class="pub_cont">
	<div class="pub_news">
	 <?php
		$get_publications = 'SELECT * FROM funds where facult_id = "'.$id.'"';
		$result = $conn->query($get_publications);
		while($row = $result->fetch_assoc()) {
		?>
		<ul>
		<li>

			<p><span class="author"> <?php echo $row['project_name'] ?></span>,  (<span class=""><?php echo $row['fund_type'] ?></span>), <span class=""><?php echo $row['fund_amount'] ?></span>  , <?php echo $row['fund_sponsor'] ?>, <?php echo $row['start_date'] ?></span> - <span><?php echo $row[ 'end_date'] ?></span> </p>
			<p><?php echo $row['fund_des'] ?></p>
			</li>
		</ul>

	<?php
	   }
	 ?>
	 </div>
</div>
</div>

</div>
</div><!--publicaends--->


<!-- <h2> Services Page</h2> -->
<div class="tabcontent" id="services">

	<?php
	echo "<h3>Services</h3>";
	?>
<div class="publica" style="overflow: scroll ;max-height: 661px; width: 100%;">

 <?php
 echo "<h2>Industrial Experience</h2>";
 ?>
 <?php
 $get_services = 'SELECT * FROM services where faculty_id = "'.$id.'" order by id asc ';
 $result_services = $conn->query($get_services);
 ?>

 <?php
	$servicesData= array();
   while($service = $result_services->fetch_assoc()) {
	  // echo"<pre>";print_r($service);
	   $servicesData[] = $service;
   }
   foreach($servicesData as $row){
	 ?>
	 <div class="pub_cont">
		<div class="pub_news">
			<ul>
				<li>
		<p><span class="author"> <?php echo $row['industrial_organization'] ?></span>, <span><?php echo $row['city'] ?></span>, <span><?php echo $row['state'] ?></span>, <span><?php echo $row['country'] ?></span>, <span><?php echo $row['industrial_date'] ?> </span> to <?php echo $row['industrial_edate'] ?></p>
		<p><span ><?php echo $row['industrial_des'] ?></p>

</li>
</ul>
		</div>
	</div>

  <?php
   }
  ?>
	<?php
	echo "<h2>Certificates</h2>";
	?>

 <?php
 foreach($servicesData as $row){
 ?>
 <div class="pub_cont">
	<div class="pub_news">

	  <ul>
	 	 <li>
	<p><span class="author"> <?php echo $row['certificate_role'] ?></span>, <span><?php echo $row['certificate_organization'] ?></span>, <?php echo $row['certificates_date'] ?></p>


	</li>
</ul>
	</div>
</div>

  <?php
   }
  ?>

	<?php
	echo "<h2>Honors/Awards</h2>";
	?>

 <?php
   foreach($servicesData as $row){
 ?>
 <div class="pub_cont">
	<div class="pub_news">

	  <ul>
	 	 <li>
	<p><span class="author"> <?php echo $row['honors_award_role']?></span>, <span><?php echo $row['honors_award_organization'] ?></span>, <?php echo $row['honors_award_date'] ?></p>
	<p><span ><?php echo $row['honors_award_des'] ?></p>


	</li>
	</ul>
	</div>
</div>

  <?php
   }
  ?>

	<?php
	echo "<h2>Professional Memberships</h2>";
	?>
 <?php
   foreach($servicesData as $row){
 ?>
 <div class="pub_cont">
	<div class="pub_news">

	  <ul>
	 	 <li>
	<p><span ><?php echo $row['potentials'] ?></p>


		</li>
</ul>
	</div>
</div>

  <?php
   }
  ?>
	<?php
	echo "<h2>Activities</h2>";
	?>

 <?php
   foreach($servicesData as $row){
 ?>
 <div class="pub_cont">
	<div class="pub_news">

	  <ul>
	 	 <li>
	<p><span ><?php echo $row['others'] ?></p>


</li>
</ul>
	</div>
</div>

  <?php
   }
  ?>
</div>
</div>

<div class="tabcontent" id="teaching">
	<?php
	echo "<h3>Teaching</h3>";
	?>

<div class="teaching_info">

	<?php

	 $get_teachng = 'SELECT * FROM teaching where faculty_id = "'.$id.'" ';
	 $result = $conn->query($get_teachng);

	 $no_courses = mysqli_num_rows($result);

	 if($no_courses == 0)
	 {
		 ?>
			<div class="alert alert-warning" role="alert">No Records Found</div>
		 <?php
	 }

	 else{

		//$row_desc = $result->fetch_assoc();
		$row_desc = mysqli_fetch_array($result);
			//print_r($row_desc);
			$gd = $row_desc['description'];
	echo "<h2>Teaching Interest</h2>";
	echo "<br/>";
		echo ucfirst($gd);
	echo "<br/>";echo "<br/>";
	echo "<h4>Courses Taught</h4>";
	echo "<br/>";
		$get_teachng_all = 'SELECT * FROM teaching where faculty_id = "'.$id.'" ';
		$result_all = $conn->query($get_teachng_all);

		//echo "<div style='width:500px;'>Course Number&nbsp;&nbsp;&nbsp;&nbsp;Course Name&nbsp;&nbsp;&nbsp;&nbsp;Year</div>";
		echo "<div id='fcontainer' style='font-weight:bold;'>
        <div class='fbox1'>Course Number</div>
        <div class='fbox2'>Course Name</div>
        <div class='fbox3'>Year</div>
        <span class='fstretch'></span>
  </div>";
		echo "<br/>";
		while($row = $result_all->fetch_assoc()) {


	 ?>

<div>
	<ul>
		<li>
			<div id="fcontainer">
				<div class="fbox1"><?php echo ucfirst($row['subjectnumber']); ?></div>
				<div class="fbox2"><?php echo ucfirst($row['subjectname']); ?></div>
				<div class="fbox3"><?php echo $row['date']; ?></div>
				<span class="fstretch"></span>
			</div>
		</li>
	</ul>
</div>
<!---infobox--->
	 <?php }} ?>
 </div>


</div><!---teaching ends--->

</div><!----right--ends---->
</div>

<footer>
<div class="footer-top">
<div class= "footerc">

 <p>
  Marshall University<br>
1 John Marshall Drive<br>
Huntington, WV 25755<br>
<a href="tel:+1-304-696-5034"><span itemprop="telephone">+1-304-696-5034</span></a>

</p>
<ul class="list-inline">
<li ><a href="#"><i class="fa fa-facebook"></i></a></li>
<li ><a href="#"><i class="fa fa-twitter"></i></a></li>
<li ><a href="#"><i class="fa fa-youtube"></i></a></li>
<li ><a href="#"><i class="fa  fa-instagram"></i></a></li>
<li ><a href="#"><i class="fa  fa-camera"></i></a></li>

</ul>
 </div>
<div class="footerc">

      <ul>
        <li><a href="http://www.marshall.edu/siteindex.asp">A-Z Index</a></li>
        <li><a href="about">About Marshall</a></li>
        <li><a href="academics">Academics</a></li>
        <li><a href="administration">Administration</a></li>
        <li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
        <li><a href="http://www.herdzone.com/">Athletics</a></li>

      </ul>

</div>
<div class="footerc">

      <ul>
        <li><a href="students">Current Students</a></li>
        <li><a href="https://donatenow.networkforgood.org/mufoundation">Donate</a></li>
        <li><a href="http://www.marshall.edu/human-resources/job-opportunities/">Employment Opportunities</a></li>
        <li><a href="http://www.marshall.edu/emergency/">Emergency Info</a></li>
        <li><a href="facultystaff">Faculty/Staff</a></li>
        <li><a href="http://www.marshall.edu/sfa/">Financial Aid</a></li>
      </ul>

</div>
<div class="footerc">

      <ul>
        <li><a href="futurestudents">Future Students</a></li>
        <li><a href="locations">Locations</a></li>
        <li><a href="http://www.marshall.edu/foundation/">MU Foundation</a></li>
        <li><a href="http://www.marshall.edu/muonline/">MUOnline</a></li>
        <li><a href="https://mymu.marshall.edu/">MyMU</a></li>
        <li><a href="research">Research</a></li>
      </ul>

</div>
 <div class="clearfix"></div>
 </div>
<div class="bottomfooter">

      <img class="footerlogo" src ="images/mu_logo_footer.png" alt="Marshall University Footer logo">
      <p>Copyright © 2017 Marshall University | An Equal Opportunity University | <a href="accreditation">Accreditation</a> | <a href="http://www.marshall.edu/disclosures/">Consumer Information and Disclosures</a> | <a href="#" data-reveal-id="report">Report a Problem</a></p>
    </div>
</footer>

 <script>
  // Get the element with id="defaultOpen" and click on it
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("taps");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";

    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();

function toggleVisibility(event,divs) {
     var x = document.getElementById(divs);
	    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tog_box");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("togle_cont");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
	    evt.currentTarget.className += " active";

}
 function toggleVisibilityresearch(event, divs) {
     var x = document.getElementById(divs);
	    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tog_boxs");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
  tablinks = document.getElementsByClassName("research_list");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
	    event.currentTarget.className += " active";

}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

  </script>

</body>
</html>
<?php
  }
  else {
 ?>
 <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="style.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
</head>

<body>
<h3 style="font-size:30px;text-align: center">Data Not Found</h3>
</body></html>
  <?php
}
?>
<?php
session_start();
require 'includes/db_connection.php';

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}
else {
	$id = '1';
}
 $sql = 'SELECT * FROM faculty_member where id = "'.$id.'" ';
 $result = $conn->query($sql);
  $row_faculty = $result->fetch_assoc();
  if($row_faculty['name'] != Null) {

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Faculty Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
 <style>
#fcontainer {
        /*border: 2px dashed #444;*/
        height: 30px;

        /*text-align: justify;*/
        -ms-text-justify: distribute-all-lines;
        text-justify: distribute-all-lines;

        /* just for demo */
        max-width: 600px;
    }

    .fbox1, .fbox2, .fbox3, .fbox4 {
        width: 195px;
        /*height: 125px;*/
        vertical-align: top;
        display: inline-block;
        *display: inline;
        zoom: 1
    }
    .fstretch {
        width: 100%;
        display: inline-block;
        font-size: 0;
        line-height: 0
    }

    .fbox1, .fbox3 {
        /*background: #ccc*/
    }
    .fbox2, .fbox4 {
        /*background: #0ff*/
    }
</style>
</head>

<body>
  <div id="mySidenav" class="sidenav" style="width: 0px;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="ss">
	<li>    <a href="admin" style="float:left;"><img src="images/1.jpg" /> Profile Login</span></a></li>
  <li>    <a href="http://mymu.marshall.edu" style="float:left;"><img src="images/1.jpg" /> MyMU</a> </li>
   <li><a href="http://www.marshall.edu/muonline/" style="float:left;"><img src="images/1.jpg" class="float-left" /> MUOnLine </a></li>
   <li>    <a href="http://www.marshall.edu/phonebook.php" style="float:left;"><img src="images/1.jpg" class="float-left" />Directory</a> </li>
    <li>   <a href="#" data-reveal-id="myModal" style="float:left;"><img src="images/1.jpg" class="float-left" />Search </a></li>

		<li><a href="about">About Marshall</a></li>
		<li><a href="futurestudents">Future Students</a></li>
		<li><a href="students">Current Students</a></li>
		<li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
		<li><a href="facultystaff">Faculty/Staff</a></li>

		<li><a href="http://www.marshall.edu/siteindex.asp">A-Z Index</a></li>
		<li><a href="about">About Marshall</a></li>
		<li><a href="academics">Academics</a></li>
		<li><a href="administration">Administration</a></li>
		<li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
		<li><a href="http://www.herdzone.com/">Athletics</a></li>
		<li><a href="students">Current Students</a></li>
		<li><a href="https://donatenow.networkforgood.org/mufoundation">Donate</a></li>
		<li><a href="http://www.marshall.edu/human-resources/job-opportunities/">Employment Opportunities</a></li>
		<li><a href="http://www.marshall.edu/emergency/">Emergency Info</a></li>
		<li><a href="facultystaff">Faculty/Staff</a></li>
		<li><a href="http://www.marshall.edu/sfa/">Financial Aid</a></li>
		<li><a href="futurestudents">Future Students</a></li>
		<li><a href="locations">Locations</a></li>
		<li><a href="http://www.marshall.edu/foundation/">MU Foundation</a></li>
		<li><a href="http://www.marshall.edu/muonline/">MUOnline</a></li>
		<li><a href="https://musso.marshall.edu/">MyMU</a></li>
		<li><a href="research">Research</a></li>
	   <li>		<!-- University Informatoin & Social Media Icons -->
	 		<a href="tel:13046965034">1 (304) 696-5034</a>
       </li>
       <li> <a href="https://www.facebook.com/marshallu" class="side-i-class fi-social-facebook">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">Facebook</span>
        </a>
		</li>

        <li><a href="http://www.marshall.edu/connected/twitter-directory/" class="side-i-class fi-social-twitter">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">Twitter Directory</span>
        </a>
		</li>
		<li>
        <a href="https://www.youtube.com/user/HerdVideo" class="side-i-class fi-social-youtube">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">Youtube</span>
        </a>
		</li>
		<li>
        <a href="http://www.marshall.edu/connected/instagram-directory/" class="side-i-class fi-social-instagram">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">Instagram Directory</span>
        </a>
		</li>
        <li><a href="http://muphotos.marshall.edu" class="side-i-class fi-camera">
        <span aria-hidden="true" data-icon="▨"></span>
        <span class="screen-reader-text">MU Photos</span>
        </a></li>
		</ul>
</div>
<header>
<div class="top_header">
<ul class="list">
<li><a href="#"><img src="images/1.jpg" class="float-left" /> <span class="icon-top">MyMU</span></a></li>
<li><a href="#"><img src="images/2.jpg" class="float-left" /> <span class="icon-top">MUOnLine</span></a></li>
<li><a href="#"><img src="images/3.jpg" class="float-left" /> <span class="icon-top">Directory</span></a></li>
<li><a href="#"><img src="images/4.jpg" class="float-left" /> <span class="icon-top">Search</span></a></li>
<li><a href="admin"><img src="images/1.jpg" class="float-left" /><span> <span class="icon-top">Profile Login</span></a></li>

</ul>
</div>
<div class="main-menu">
<div class="full-width">
<div class="logo"><a href="/finalproject/"><img src="images/logo.jpg" /></a></div>
<div class="shomobile">
<i class="fa  fa-align-justify" onclick="openNav()"></i>
</div>
<div class="main-menu-container">
<nav>

<ul class="list">
<li><a href="#">ABOUT MARSHALL</a></li>
<li><a href="#">FUTURE STUDENT</a></li>
<li><a href="#">CURRENT STUDENT</a></li>
<li><a href="#">ALUMINI</a></li>
<li ><a href="#">FACULTY/STAFF</a></li>
</ul>

</nav>
</div>
</div>
</div>
<div class="bottom-header">College of Information Technology and Engineering</div>
</header>

<div class="link_header">
<ul class="main-navigation">
	<li><a href="#">ABOUT CITE <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">MISSION</a></li>
			<li><a href="#">MESSAGE FROM THE DEAN</a></li>
			<li><a href="#">CONTACT INFORMATION</a></li>
			<li><a href="#">DIRECTIONS</a></li>
			<li><a href="#">NEWS</a></li>
			<li><a href="#">CURRENT FACULTY AND STAFF</a></li>
			<li><a href="#">JOB OPPORTUNITIES AT CITE</a></li>
			<li><a href="#">MESSAGE FROM THE DEAN</a></li>
			<li><a href="#">PROGRAM ACCREDITATION</a></li>
		</ul>
	</li>
	<li><a href="#">ACADEMIC <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">DEGREE PROGRAMS</a></li>
			<li><a href="#">DIVISIONS      <img src="images/side.png" class="float-right" /></a>
							<ul>
							<li><a href="#">WEISBERG DIVISION OF COMPUTER SCIENCE</a>
							<li><a href="#">WEISBERG DIVISION OF ENGINEERING</a>
							<li><a href="#">DIVISION OF APPLIED SCIENCE AND TECHNOLOGY</a></li>
						</ul>
			<li><a href="#">COURSE INFORMATION</a>
			<li><a href="#">CURRENT SYLLABI</a></li>
		</ul>
</li>
	<li><a href="#">STUDENTS <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">PROSPECTIVE STUDENTS</a></li>
			<li><a href="#">RESOURCES</a></li>
			<li><a href="#">SCHOLARSHIPS AND AWARDS</a></li>
		<li><a href="#">STUDENT RESEARCH</a></li>
		<li><a href="#">PROSPECTIVE STUDENTS</a></li>
		<li><a href="#">ACTIVITIES</a></li>
		<li><a href="#">PROJECTS</a></li>
	<li><a href="#">STUDENT ORGANIZATIONS</a></li>
		<li><a href="#">MEET OUR STUDENTS</a></li>
	</ul>
</li>
	<li><a href="#">FACULTY <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">RESOURCES</a></li>
			<li><a href="#">CITE COMMITTEES MEMBERS</a></li>
		</ul>
	</li>
	<li><a href="#">ALUMNI <img src="images/down.png" class="float-right" /></a>
		<ul>
			<li><a href="#">ALUMNI</a></li>
			<li><a href="#">ALUMNI ORGANIZATIONS</a></li>
				<li><a href="#">GIVE TO CITE</a></li>
		</ul>
	</li>
</ul>
</div>

<div class="pagecontent">
<div class="left">
<h1>
<?php echo $row_faculty['name']; ?> <?php echo $row_faculty['l_name']?>  </p>

</h1>
 <div class="collapse navbar-collapse navbar-right">

        <ul class="tap">
          <li ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'prof')" id="defaultOpen"><i class="fa  fa-user"></i>About Me</a></li>
          <li ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'reaearch')"><i class="fa fa-book"></i>Research</a></li>
          <li  ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'services')"><i class="fa fa-pencil-square-o"></i>Services</a></li>
          <li  ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'teaching')"><i class="fa fa-clock-o"></i>Teaching</a></li>
        </ul>
      </div>
</div>


<div class="right">
<div id="prof" class="tabcontent">
	<?php
	echo "<h3>About Me</h3>";
	?>
      <div class="professor_img">
	  <div class="img_cont">
     <img src="<?php echo str_replace('../','',$row_faculty['image']);?>">	 <div class="professor_img_caption">
	 <p><?php echo $row_faculty['name']?> <?php echo $row_faculty['l_name']?>  </p>
	 <p><?php echo $row_faculty['designation']?></p>
	 </div>
</div>
	 <?php

	 if(isset($_GET['id'])) {
	 	$id = $_GET['id'];
	 }
	 else {
	 	$id = '1';
	 }
	  $sql = 'SELECT * FROM faculty_member where id = "1" ';
	  $res = $conn->query($sql);
	   $row_fa = $res->fetch_assoc();
	 	 ?>
 <?php if($row_fa['division'] != "") { ?> <p><a> Division: <?php echo($row_fa['division']); ?> <?php } ?>

		 <?php if($row_faculty['office_address'] != "") { ?> <p><a> Office: <?php echo($row_faculty['office_address']); ?> <?php } ?>
<?php if($row_faculty['phone'] != "") { ?> <p><a href="tel:952-220-7201"><i class="fa  fa-phone"></i><tr><td><?php echo($row_faculty['phone']); ?></td></tr></a></p> <?php } ?>
<p><a href="email:abc@gmail.com"><i class="fa fa-envelope"></i> <?php echo $row_faculty['email']?></a></p>
      </div>

<div class="professor_content">
<!-- <h2>Bio</h2> -->
<div class="tab">
	<p align="left"> <?php	echo "<h3>About Me</h3>";?></p>
</div>

<p align="justify"> <?php echo $row_faculty['overview']?></p>
<?php if($row_faculty['degree1'] != "") { ?>
	<?php
	echo "<h2>Education</h2>";
	?>
	<div class = "topic">

<ol>
	<?php if($row_faculty['degree1'] != "") { ?>
		<li> <p><a><?php echo($row_faculty['degree1']); ?>.</a> <?php if($row_faculty['degree1_school'] != "") { ?> <?php echo($row_faculty['degree1_school']); ?><?php } ?>, <?php if($row_faculty['degree1_year'] != "0") {?> <?php echo($row_faculty['degree1_year']); ?></p> </li><?php } ?> <?php } ?>


<?php if($row_faculty['degree2'] != "") { ?>
	<li> <p><a><?php echo($row_faculty['degree2']); ?>.</a> <?php if($row_faculty['degree2_school'] != "") {?> <?php echo($row_faculty['degree2_school']); ?><?php } ?>, <?php if($row_faculty['degree2_year'] != "0") { ?> <?php echo($row_faculty['degree2_year']); ?></p> </li>
	<?php } ?> <?php  } ?>


<?php if($row_faculty['degree3'] != "") { ?>
	<li> <p><a><?php echo($row_faculty['degree3']); ?>.</a> <?php if($row_faculty['degree3_school'] != "") {?> <?php echo($row_faculty['degree3_school']); ?><?php } ?>, <?php if($row_faculty['degree3_year'] != "0") { ?> <?php echo($row_faculty['degree3_year']); ?></p> </li>
	<?php } ?> <?php } ?>
</ol>
	  <?php } ?>

</div>

</div><!---inrto-cont-->

</div><!---#prof ends--->


<div class="tabcontent" id="reaearch">
	<?php
	echo "<h3>Research</h3>";
	?>
<div class="publica">

		<?php
		echo "<h2>Research Summary</h2>";
		?>
<div class="pub_cont">
 <?php
  $sqlR = 'SELECT * FROM research where facult_id = "'.$id.'"';
  //echo $sqlR;exit;
 $resultR = $conn->query($sqlR);
   while($row = $resultR->fetch_assoc()) {?>
		<div class="pub_cont">
		<div class="pub_news">
		<p> <?php echo $row['summary'] ?></p>
		</div>
		</div>
<?php
   }
 ?>

 <?php
 echo "<h2>Selected publications</h2>";
 ?>

 <div class="pub_cont">
	<div class="pub_news">
	 <?php
		$get_publications = 'SELECT * FROM selected_publications where faculty_id = "'.$id.'"';
		$result = $conn->query($get_publications);
		while($row = $result->fetch_assoc()) {
		?>

		<ul>
		<li>
			<p><span class="author"> <?php echo $row['publication_title'] ?></span>, <?php echo $row['publication_author'] ?></p>
			<p><?php echo $row['publication_type'] ?>,</span> <?php echo $row['data'] ?></p>.
			</li>
		</ul>

	<?php
	   }
	 ?>
	 </div>
</div>

<?php
echo "<h2>Funds</h2>";
?>
 <div class="pub_cont">
	<div class="pub_news">
	 <?php
		$get_publications = 'SELECT * FROM funds where facult_id = "'.$id.'"';
		$result = $conn->query($get_publications);
		while($row = $result->fetch_assoc()) {
		?>
		<ul>
		<li>

			<p><span class="author"> <?php echo $row['project_name'] ?></span>,  (<span class=""><?php echo $row['fund_type'] ?></span>), <span class=""><?php echo $row['fund_amount'] ?></span>  , <?php echo $row['fund_sponsor'] ?>, <?php echo $row['start_date'] ?></span> - <span><?php echo $row[ 'end_date'] ?></span> </p>
			<p><?php echo $row['fund_des'] ?></p>
			</li>
		</ul>

	<?php
	   }
	 ?>
	 </div>
</div>
</div>

</div>
</div><!--publicaends--->


<!-- <h2> Services Page</h2> -->
<div class="tabcontent" id="services">

	<?php
	echo "<h3>Services</h3>";
	?>
<div class="publica" style="overflow: scroll ;max-height: 661px; width: 100%;">

 <?php
 echo "<h2>Industrial Experience</h2>";
 ?>
 <?php
 $get_services = 'SELECT * FROM services where faculty_id = "'.$id.'" order by id asc ';
 $result_services = $conn->query($get_services);
 ?>

 <?php
	$servicesData= array();
   while($service = $result_services->fetch_assoc()) {
	  // echo"<pre>";print_r($service);
	   $servicesData[] = $service;
   }
   foreach($servicesData as $row){
	 ?>
	 <div class="pub_cont">
		<div class="pub_news">
			<ul>
				<li>
		<p><span class="author"> <?php echo $row['industrial_organization'] ?></span>, <span><?php echo $row['city'] ?></span>, <span><?php echo $row['state'] ?></span>, <span><?php echo $row['country'] ?></span>, <span><?php echo $row['industrial_date'] ?> </span> to <?php echo $row['industrial_edate'] ?></p>
		<p><span ><?php echo $row['industrial_des'] ?></p>

</li>
</ul>
		</div>
	</div>

  <?php
   }
  ?>
	<?php
	echo "<h2>Certificates</h2>";
	?>

 <?php
 foreach($servicesData as $row){
 ?>
 <div class="pub_cont">
	<div class="pub_news">

	  <ul>
	 	 <li>
	<p><span class="author"> <?php echo $row['certificate_role'] ?></span>, <span><?php echo $row['certificate_organization'] ?></span>, <?php echo $row['certificates_date'] ?></p>


	</li>
</ul>
	</div>
</div>

  <?php
   }
  ?>

	<?php
	echo "<h2>Honors/Awards</h2>";
	?>

 <?php
   foreach($servicesData as $row){
 ?>
 <div class="pub_cont">
	<div class="pub_news">

	  <ul>
	 	 <li>
	<p><span class="author"> <?php echo $row['honors_award_role']?></span>, <span><?php echo $row['honors_award_organization'] ?></span>, <?php echo $row['honors_award_date'] ?></p>
	<p><span ><?php echo $row['honors_award_des'] ?></p>


	</li>
	</ul>
	</div>
</div>

  <?php
   }
  ?>

	<?php
	echo "<h2>Professional Memberships</h2>";
	?>
 <?php
   foreach($servicesData as $row){
 ?>
 <div class="pub_cont">
	<div class="pub_news">

	  <ul>
	 	 <li>
	<p><span ><?php echo $row['potentials'] ?></p>


		</li>
</ul>
	</div>
</div>

  <?php
   }
  ?>
	<?php
	echo "<h2>Activities</h2>";
	?>

 <?php
   foreach($servicesData as $row){
 ?>
 <div class="pub_cont">
	<div class="pub_news">

	  <ul>
	 	 <li>
	<p><span ><?php echo $row['others'] ?></p>


</li>
</ul>
	</div>
</div>

  <?php
   }
  ?>
</div>
</div>

<div class="tabcontent" id="teaching">
	<?php
	echo "<h3>Teaching</h3>";
	?>

<div class="teaching_info">

	<?php

	 $get_teachng = 'SELECT * FROM teaching where faculty_id = "'.$id.'" ';
	 $result = $conn->query($get_teachng);

	 $no_courses = mysqli_num_rows($result);

	 if($no_courses == 0)
	 {
		 ?>
			<div class="alert alert-warning" role="alert">No Records Found</div>
		 <?php
	 }

	 else{

		//$row_desc = $result->fetch_assoc();
		$row_desc = mysqli_fetch_array($result);
			//print_r($row_desc);
			$gd = $row_desc['description'];
	echo "<h2>Teaching Interest</h2>";
	echo "<br/>";
		echo ucfirst($gd);
	echo "<br/>";echo "<br/>";
	echo "<h4>Courses Taught</h4>";
	echo "<br/>";
		$get_teachng_all = 'SELECT * FROM teaching where faculty_id = "'.$id.'" ';
		$result_all = $conn->query($get_teachng_all);

		//echo "<div style='width:500px;'>Course Number&nbsp;&nbsp;&nbsp;&nbsp;Course Name&nbsp;&nbsp;&nbsp;&nbsp;Year</div>";
		echo "<div id='fcontainer' style='font-weight:bold;'>
        <div class='fbox1'>Course Number</div>
        <div class='fbox2'>Course Name</div>
        <div class='fbox3'>Year</div>
        <span class='fstretch'></span>
  </div>";
		echo "<br/>";
		while($row = $result_all->fetch_assoc()) {


	 ?>

<div>
	<ul>
		<li>
			<div id="fcontainer">
				<div class="fbox1"><?php echo ucfirst($row['subjectnumber']); ?></div>
				<div class="fbox2"><?php echo ucfirst($row['subjectname']); ?></div>
				<div class="fbox3"><?php echo $row['date']; ?></div>
				<span class="fstretch"></span>
			</div>
		</li>
	</ul>
</div>
<!---infobox--->
	 <?php }} ?>
 </div>


</div><!---teaching ends--->

</div><!----right--ends---->
</div>

<footer>
<div class="footer-top">
<div class= "footerc">

 <p>
  Marshall University<br>
1 John Marshall Drive<br>
Huntington, WV 25755<br>
<a href="tel:+1-304-696-5034"><span itemprop="telephone">+1-304-696-5034</span></a>

</p>
<ul class="list-inline">
<li ><a href="#"><i class="fa fa-facebook"></i></a></li>
<li ><a href="#"><i class="fa fa-twitter"></i></a></li>
<li ><a href="#"><i class="fa fa-youtube"></i></a></li>
<li ><a href="#"><i class="fa  fa-instagram"></i></a></li>
<li ><a href="#"><i class="fa  fa-camera"></i></a></li>

</ul>
 </div>
<div class="footerc">

      <ul>
        <li><a href="http://www.marshall.edu/siteindex.asp">A-Z Index</a></li>
        <li><a href="about">About Marshall</a></li>
        <li><a href="academics">Academics</a></li>
        <li><a href="administration">Administration</a></li>
        <li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
        <li><a href="http://www.herdzone.com/">Athletics</a></li>

      </ul>

</div>
<div class="footerc">

      <ul>
        <li><a href="students">Current Students</a></li>
        <li><a href="https://donatenow.networkforgood.org/mufoundation">Donate</a></li>
        <li><a href="http://www.marshall.edu/human-resources/job-opportunities/">Employment Opportunities</a></li>
        <li><a href="http://www.marshall.edu/emergency/">Emergency Info</a></li>
        <li><a href="facultystaff">Faculty/Staff</a></li>
        <li><a href="http://www.marshall.edu/sfa/">Financial Aid</a></li>
      </ul>

</div>
<div class="footerc">

      <ul>
        <li><a href="futurestudents">Future Students</a></li>
        <li><a href="locations">Locations</a></li>
        <li><a href="http://www.marshall.edu/foundation/">MU Foundation</a></li>
        <li><a href="http://www.marshall.edu/muonline/">MUOnline</a></li>
        <li><a href="https://mymu.marshall.edu/">MyMU</a></li>
        <li><a href="research">Research</a></li>
      </ul>

</div>
 <div class="clearfix"></div>
 </div>
<div class="bottomfooter">

      <img class="footerlogo" src ="images/mu_logo_footer.png" alt="Marshall University Footer logo">
      <p>Copyright © 2017 Marshall University | An Equal Opportunity University | <a href="accreditation">Accreditation</a> | <a href="http://www.marshall.edu/disclosures/">Consumer Information and Disclosures</a> | <a href="#" data-reveal-id="report">Report a Problem</a></p>
    </div>
</footer>

 <script>
  // Get the element with id="defaultOpen" and click on it
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("taps");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";

    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();

function toggleVisibility(event,divs) {
     var x = document.getElementById(divs);
	    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tog_box");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("togle_cont");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
	    evt.currentTarget.className += " active";

}
 function toggleVisibilityresearch(event, divs) {
     var x = document.getElementById(divs);
	    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tog_boxs");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
  tablinks = document.getElementsByClassName("research_list");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
	    event.currentTarget.className += " active";

}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

  </script>

</body>
</html>
<?php
  }
  else {
 ?>
 <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="style.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
</head>

<body>
<h3 style="font-size:30px;text-align: center">Data Not Found</h3>
</body></html>
  <?php
}


}catch(Exception $e){
	error_log(' Erro Message : '.$e->getMessage());
	error_log(' Stack Trace: '. $e->getTraceAsString());
	header('Location: ERROR_PAGE');
}
?>
