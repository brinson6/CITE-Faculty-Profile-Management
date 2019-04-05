<?php
session_start();
require 'includes/db_connection.php';
require 'includes/Parsedown.php';
require_once 'includes/user.php';

$Parsedown = new Parsedown();
$Parsedown->setSafeMode(true); // prevent cookie theft and js hijacking

// handling for staff id
if (!isset($_GET['id'])) {
	header("Location: index.php");
	exit();
}

$id = intval($_GET['id']);

try {
	$faculty_member = new User($conn, $id);
	
	$profile_image = empty($faculty_member->get_image())
		? 'images/default_image.jpg'
		: $faculty_member->get_image();

?>
<!DOCTYPE html>
<html lang="en-US" enctype="utf-8">
<head>
	<title><?php echo $faculty_member->get_name() . $faculty_member->get_last_name(); ?> Faculty Profile</title>
	<?php include 'views/_scripts.php'; ?>
</head>

<body>
<?php include 'views/_navheader.php'; ?>
<div class="pagecontent">
	<div class="left">
	<h1><?php echo $faculty_member->get_name() . ' ' . $faculty_member->get_last_name(); ?></h1>
	 <div class="collapse navbar-collapse navbar-right">

			<ul class="tap">
			  <li ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'prof')" id="defaultOpen"><i class="fa  fa-user"></i>About Me</a></li>
			  <li ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'reaearch')"><i class="fa fa-book"></i>Research</a></li>
			  <li  ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'services')"><i class="fa fa-pencil-square-o"></i>Services</a></li>
			  <li  ><a class="taps" href="javascript:void(0)" onclick="openCity(event, 'teaching')"><i class="fa fa-clock-o"></i>Teaching</a></li>
			</ul>
		  </div>
	</div>
	<?php
	if ($faculty_member->has_complete_profile()) {
		$profile_image = str_replace('../', '', $profile_image);
		$extra_info = sprintf("<p>%s</p>\n<p>%s</p>\n<p>%s</p>\n<p><a href=\"mailto:%s\"><i class=\"fa fa-envelope\"></i> %4\$s</a></p>",
			($faculty_member->get_division() != '' ? $faculty_member->get_division(true) : ''),
			($faculty_member->get_office_address() != '' ? $faculty_member->get_office_address(true) : ''),
			($faculty_member->get_phone() != '' ? $faculty_member->get_phone() : ''),
			($faculty_member->get_email())
		);
		$overview = $Parsedown->text($faculty_member->get_overview());;
echo <<<END
			<div class="right">
				<div id="prof" class="tabcontent">
					<h3>About Me</h3>
					<div class="professor_img">
					<div class="img_cont">
					
					<img class="faculty-profile" id="profile-image" src="$profile_image" />
					<div class="professor_img_caption">
				<p>{$faculty_member->get_name()} {$faculty_member->get_last_name()}</p>
				<p>{$faculty_member->get_designation()}</p>
			</div>
		</div>
		$extra_info
	</div>

      <div class="professor_content">
      <!-- <h2>Bio</h2> -->
      <div class="tab">
      	<p align="left"><h5>About Me</h5></p>
      </div>
      <div class="view">
      <div align="justify">$overview</div>
      </div>

      <div class = "topic">
END;
    	if($faculty_member->has_degrees()) {
			echo "<h2>Education</h2>\n<ol>";
			for ($i = 1; $i < 4; $i++) 
				if($faculty_member->get_degree($i) != null)
					vprintf('<li><p>%s. %s, %s</p></li>', $faculty_member->get_degree($i)->enumerated_array());
			echo '</ol>';
    	}
	}
	else
		echo '
			<div class="center" style="text-align: center; padding: 10px;">
				<h4>The selected faculty member has not set up their profile yet. If this is your profile, please <a style="text-decoration: underline;" href="/cite/admin/">log in</a> to set it up.</h4>
			</div>';

echo <<<END
</div>
</div><!---inrto-cont-->

</div><!---#prof ends--->



<div class="tabcontent" id="reaearch">
<h3>Research</h3>
<div class="publica" style="overflow: scroll ;max-height: 693px; width: 100%;">

	
<div class="pub_cont">
END;

	$research = $conn->query('SELECT * FROM research where facult_id = "' . $faculty_member->get_id() . '"');

  	if($resultR->num_rows > 0) {
		echo "<h4>Research Summary</h4>";

  		while($row = $research->fetch_object()) {
echo <<<END
		<div class="pub_cont">
		<div class="pub_news">
		<ul><li><p align = "justify">{$row->summary}</p></li></ul>
		</div>
		</div>
END;
  		}
  	}

echo '<div class="pub_cont">
	<div class="pub_news">';

	$get_publications = 'SELECT * FROM selected_publications where faculty_id = "'.$id.'" order by publication_year desc';
	$result = $conn->query($get_publications);
	$no_publications = mysqli_num_rows($result);
	if($no_publications != 0)
	{
		echo '<h4>Selected  Publications</h4> <br />' . PHP_EOL;
		echo '<ul>'. PHP_EOL;
		while($publication = $result->fetch_object())
			echo '<li><p style="align: justify;">' . trim($publication->publication_author) . '. '
				. ($publication->publication_year ? "({$publication->publication_year})" : '')
				. trim($publication->publication_title)
				. '</span>, <i>' . trim($publication->genre_type) . '</i></span>, ' . trim($publication->data) . '.</p></li>';
		echo '</ul>' . PHP_EOL;
	}
echo <<<END
	</div>
</div>


 <div class="pub_cont">
	<div class="pub_news">
END;

		$get_publications = 'SELECT * FROM funds where facult_id = "'.$id.'" order by start_date desc';
		$result = $conn->query($get_publications);
		$no_funds = mysqli_num_rows($result);
		if($no_funds != 0){ ?>
		
		
<h4>Funds</h4> <br>

		<?php
		while($row = $result->fetch_assoc()) {
		?>
		<ul>
		<li>
		
		<?php if($row['fund_type'] == "Marshall Funding"){ ?>
		<p><span class="author"> <?php echo $row['fund_type'] ?> </span></p>
		<?php }else{ ?>
		<p><span class="author"> <?php echo $row['fund_type'] ?> Fund</span></p>
		 <?php } ?>
			<p align = "justify"><span class="author"> <?php echo $row['project_name'] ?></span>,  <?php echo $row['fund_sponsor'] ?>, <?php echo $row['start_date'] ?></span> - <?php echo $row['end_date'] ?></span>, <span class=""><?php echo $row['fund_amount'] ?></span> </p>
			<p align = "justify"><?php echo $row['fund_des'] ?></p>
			
		
			</li>
		</ul>
	<?php
		}}
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
<div class="publica" style="overflow: scroll ;max-height: 693px; width: 100%;">

	<?php

	 $get_industry = 'SELECT * FROM industrial where faculty_id = "'.$id.'"  order by sdate desc';
	 $result_ind = $conn->query($get_industry);

	 $no_ind = mysqli_num_rows($result_ind); ?>
		
			
		<?php
	 if($no_ind != 0){
		 
		echo "<h4>Industrial Experience</h4> <br>";

		while($row = $result_ind->fetch_assoc()) {


	 ?>
	<ul>
		<li>
				<p align = "justify"><div class="">&#9679;&nbsp;&nbsp;<?php echo ucfirst($row['job_title']).",&nbsp;".ucfirst($row['organization']).",&nbsp;".ucfirst($row['city']).",&nbsp;".$row['state'].",&nbsp;".$row['country'].",&nbsp;".$row['sdate']." to ".$row['edate']; ?>.
				&nbsp;<?php echo ucfirst($row['description']); ?>.</div>
				</p>
		</li>
	</ul>

	
<!---infobox--->
	 <?php }} ?>


	  
	<?php

	 $get_cert = 'SELECT * FROM certification where faculty_id = "'.$id.'" order by date desc';
	 $result_cert = $conn->query($get_cert);

	 $no_cert = mysqli_num_rows($result_cert); ?>
	
		
	<?php
	 if($no_cert != 0){  ?>
			<br>
	<h4>Certificates</h4> <br>
			<?php
		while($row = $result_cert->fetch_assoc()) {
	 ?>
	<ul>
		<li>
				<p align = "justify"><div class="">&#9679;&nbsp;&nbsp;<?php echo ucfirst($row['name']).",&nbsp;".ucfirst($row['organization']).",&nbsp;".$row['date']; ?>.
				</div></p>
		</li>
	</ul>

<!---infobox--->
	 <?php }} ?>
	

	
	 
	<?php

	 $get_awards = 'SELECT * FROM awards where faculty_id = "'.$id.'" order by year desc ';
	 $result_awd = $conn->query($get_awards);

	 $no_awd = mysqli_num_rows($result_awd);

	  
	 if($no_awd != 0){  ?>
		<br>
	 <h4>Honors/ Awards</h4> <br>
			<?php
		while($row = $result_awd->fetch_assoc()) {


	 ?>

	<ul>
		<li>
			
				<p align = "justify"><div class="">&#9679;&nbsp;&nbsp;<?php echo ucfirst($row['name']).",&nbsp;".ucfirst($row['organization']).",&nbsp;".$row['year']; ?>.
				&nbsp;<?php echo ucfirst($row['description']); ?></div></p>
		</li>
	</ul>
		<?php } ?>

<!---infobox--->
	 <?php } ?>

	
	<?php

	 $get_mem = 'SELECT * FROM membership where faculty_id = "'.$id.'" ';
	 $result_mem = $conn->query($get_mem);

	 $no_mem = mysqli_num_rows($result_mem);
	 

	 if($no_mem != 0){  ?>
	<br>
	 <h4>Professional Membership</h4> <br>
		<?php
		while($row = $result_mem->fetch_assoc()) {


	 ?>


	<ul>
		<li>
		
					<p align = "justify"><div class="">&#9679;&nbsp;&nbsp;<?php echo ucfirst($row['name']); ?></div></p>
		</li>
	</ul>
		<?php } ?>

<!---infobox--->
	 <?php } ?>


	 
	<?php
	 $get_act = 'SELECT * FROM activities where faculty_id = "'.$id.'" ';
	 $result_act = $conn->query($get_act);

	 $no_act = mysqli_num_rows($result_act);
		
	
	 
	 if($no_act != 0){
	?>
	
	<br>
	 <h4>Professional Development/ Community Services/ Other Activities</h4> <br>
		<?php
		while($row = $result_act->fetch_assoc()) {


	 ?>


	<ul>
		<li>
			
					<p align = "justify"><div class="">&#9679;&nbsp;&nbsp;<?php echo ucfirst($row['name']); ?></div></p>
				
		</li>
	</ul>
		<?php  } ?>

<!---infobox--->
	 <?php } ?>
	

</div>
</div>

<div class="tabcontent" id="teaching">
	<h3>Teaching</h3>
<div class="teaching-info">


	<?php

	 $get_teachng = 'SELECT * FROM description where faculty_id = "'.$id.'" ';
	 $result = $conn->query($get_teachng);

	 $no_courses = mysqli_num_rows($result);

	 if($no_courses == 0)
	 {
		 ?>
			<div class="alert alert-warning" role="alert"> </div>
		 <?php
	 }

	 else{ ?>
				
				<h4>Teaching Interest</h4> <br>
	 <?php
		//$row_desc = $result->fetch_assoc();
		$row_desc = mysqli_fetch_array($result);
			//print_r($row_desc);
			$gd = $row_desc['description'];
	//	echo ucfirst($gd);	
	 }?>
	 
	 <ul>
		<li>
			
					<p align = "justify"><?php echo ucfirst($gd); ?></div></p>
				
		</li>
	</ul>
	 
		<?php $get_teachng_all = 'SELECT * FROM teaching where faculty_id = "'.$id.'" order by date desc ';
		$result_all = $conn->query($get_teachng_all);
		$no_courses = mysqli_num_rows($result_all);
		if($no_courses > 0){
	 ?>
	 
	 
	 
	 
	 
	 <br>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>
	 <br>
	 <div class="container">
  <h4>Courses Taught</h4> <br>      
			 <div style="overflow-x:auto;">
  <table class="table"  >
    <thead>
      <tr>
        <th>Course Number</th>
        <th>Course Name</th>
        <th>Year</th>
      </tr>
    </thead>
    <tbody>
		 
	  <?php		while($row = $result_all->fetch_assoc()) { ?>
      <tr>
        <td><?php echo ($row['link'] ? '<a href="' . $row['link'] . '">' : ''); ?><?php echo ucfirst($row['subjectnumber']); ?><?php echo ($row['link'] ? '</a>' : ''); ?></td>
        <td>
			<?php echo ($row['link'] ? '<a href="' . $row['link'] . '">' : ''); ?>
			<?php echo ucfirst($row['subjectname']); ?>
			<?php echo ($row['link'] ? '</a>' : ''); ?>
		</td>
        <td><?php echo $row['date']; ?></td>
      </tr>
		<?php } }?>
    </tbody>
  </table>
  </div>
</div>

<?php
		include 'views/_footer.php';
  	} catch(Exception $e) {
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
<p><?php echo $e->getMessage(); ?></p>
</body></html>
<?php
}
?>
