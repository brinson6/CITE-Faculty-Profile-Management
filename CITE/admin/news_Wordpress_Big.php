
 <?php
session_start();
require '../includes/db_connection.php';

error_reporting(E_ERROR | E_PARSE);

$display = isset($_GET["id"]) && is_numeric($_GET['id']) ? intval($_GET['id'])-1 : 0;
$sql = 'SELECT * FROM  news where status = "ACCEPTED" order by timeOfNews desc limit ' . $display . '1';


$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en-US" enctype="UTF-8">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin</title>

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
    <div class="col-md-12">
        <div align = "center">
            <h4>CITE News</h4>
			<h5>Marshall University</h5>
		</div>
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
							<h5><b><?php echo $row['title'];?></b> </h5>
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
					<div class="col-md-12" align = "center">
						<div class="form-group">
							<label>
								<?php 
									echo '<img src="' . ($row['imageName'] == '' ? '../images/default_image.png' : $row['imageName']) . '" width="200px" height="200px" >';
								?>			
							</label>
						</div>
					</div>		  
					<div class="col-md-12" align = "center">
						<div class="form-group">
							<p align = "justify">
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
</body>

<!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!--  Sharrre plugin	 -->
    <script src="assets/js/jquery.sharrre.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>

