<?php


	
require 'includes/db_connection.php';

session_start();

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}
else {
	$id = '1';
}
 $sql = 'SELECT * FROM faculty_member where id = "'.$id.'" ';
 $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if($row['name'] != Null) {
//echo inverse(0) . "\n";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Faculty Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
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
<li><a href="admin" style="float:left;"><img src="images/1.jpg" /> Profile Login</span></a></li>

</ul>
</div>
<div class="main-menu">
<div class="full-width">
<div class="logo"><a href="#"><img src="images/logo.jpg" /></a></div>
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
<li ><a href="#"> FACULTY/STAFF</a></li>
</ul>
</nav>
</div>
</div>
</div>
<div class="bottom-header">College of Information Technology and Engineering</div>

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
			<li><a href="#">DIVISIONS       <img src="images/side.png" class="float-right" /></a>
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
</header>


<div>
</div>
<div class="pagecontent">
<div class="left">

</div>
<div class="right">
<h2>Select Faculty Member</h2>
<ul class="an">
 <?php
 $f_mem = 'SELECT * FROM faculty_member where status = "1" order by l_name';
 $results = $conn->query($f_mem);
 while($row = $results->fetch_assoc()) { ?>

<li><a href="faculty.php?id=<?php echo $row['id']  ?>"><?php echo $row['l_name']  ?>, &nbsp;<?php echo $row['name']  ?></a></li>
 <?php } ?>
</ul>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
  
  
  
  <?php }


  ?>
