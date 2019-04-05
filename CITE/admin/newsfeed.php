
 <?php
 $start = microtime();
session_start();

require '../includes/db_connection.php';

error_reporting(E_ERROR | E_PARSE);

if (isset($_GET['count']) && is_numeric($_GET['count']))
	$display = abs(intval($_GET['count']));
else
	$display = 10;

if (isset($_GET['division']) && is_numeric($_GET['division'])) {
	$division = abs(intval($_GET['division']));
} else $division = -1;

$sql = 'SELECT * FROM news WHERE status = "ACCEPTED" ' . ($division > 0 ? 'AND division_id="' . $division . '"' : '') . ' ORDER BY timeOfNews desc LIMIT ' . $display;

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en-US" enctype="utf-8">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>News Feed</title>

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
	<style type="text/css">
		.menu-header > input + p {
			display: none;
		}
		
		.menu-header > input:checked + p {
			display: initial;
		}
		
		ul {
			list-style-type: none;
		}
		
		.menu {
			width: 100%;
			list-style-type: none;
			padding: 0px;
		}
		
		.readmore-link a:link, .readmore-link a:visited,
		.readmore-link a:hover, .readmore-link a:active,
		.readmore-link a, .readmore-link {
			color: #04954a;
			text-decoration: none;
		}
		
		.readmore-link {
			margin-top: 15px;
		}
		
		.article-title {
			font-weight: bold;
			color: #04954a;
			font-size: 12pt;
		}
		
		.menu-header > a {
			margin: 0px;
			margin-bottom: 15px;
			padding: 5px;
			border-bottom: 1px dotted #333;
			display: flex;
			width: 100%;
			min-height; 110px;
			cursor: pointer;
		}

		input[type=checkbox].menu-toggle {
			display: none;
		}
		
		img {
			width:auto;
			height:auto;
			max-width: 100px;
			max-height: 100px;
			display: block;
		}
		
		.publication-date {
			text-align: right;
		}
		.publication-info {
			text-align: left;
			color: #000;
			text-decoration: none;
		}

		.imagebox {
			width: 100px;
			height: 100px;
			margin: 10px;
			display: flex;
			justify-content: center;
		}
		.table-box {
			flex-grow: 1;
		}
		
		.publication {
			margin-top: 10px;
			display: flex;
			justify-content: space-between;
			font-weight: 400;
			font-size: 10pt;
		}
		.article-title {
			margin-top: 15px;
		}
		
		.article-text {
			text-align: left;
		}
	</style>
</head>
<body>
    <div class="col-md-12 collapsible-menu">
	<div class="menu-content">
		<ul class="menu">
	<?php  
		$no_news = mysqli_num_rows($result) == 0;
		if($no_news) {
		?>
			<li>
				<div class="form-group" align = "center">
				    <h4><b>There are no current live news on this page.</b> </h4>
                </div>
            </li>
		<?php 
		} else {
			$count = 0;
			while($row = $result->fetch_assoc()) {
				$count++;
			?>
				<li class="menu-header">
				<a href="wp_big2.php?id=<?php echo $count; ?>" target="_parent">
						<div class="imagebox">
							<img src="<?php echo $row['imageName'] == '' ? '../images/default_image.png' : $row['imageName']; ?>" alt="Article Picture" />
						</div>
						<div class="table-box">
							<div class="article-title">
									<?php echo $row['title']; ?>
							</div>
							<div class="publication">
								<div class="publication-info">
									<?php echo "Posted " 
										. ($row['professorName'] ? "by {$row['professorName']} " : '') 
										. "on " . date('F j, Y', strtotime($row['dateAndTime'])); 
									?>
								</div>
							</div>
								<div class="readmore-link">
									Read More
								</div>
						</div>
				</a>
				</li>
			<?php 
			}
		}
		?>
		</ul>
		<?php
		if (isset($_GET['diagnostic'])) {
			echo "Script executed in " . (microtime() - $start) . " microseconds.";
		}
		?>
	</div>
</body>

<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>

