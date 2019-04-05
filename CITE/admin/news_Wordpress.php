
 <?php
session_start();
require '../includes/db_connection.php';

error_reporting(E_ERROR | E_PARSE);
	
	$display = isset($_GET["id"]) && is_numeric($_GET['id']) ? intval($_GET['id'])-1 : 0;
	$priority = '';
	$division = '';
	$count = 1;
	if (isset($_GET['count'])) $count = intval($_GET['count']);
	if (isset($_GET['priority_only'])) $priority = ' AND priority=1';
	if (isset($_GET['division'])) $division = ' AND division_id=' . intval($_GET['division']);
	$sql = 'SELECT * FROM  news where status = "ACCEPTED"'. $priority . $division. ' order by timeOfNews desc limit ' . $display . ',' . $count;

	$result = $conn->query($sql);
?>

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
<body  scroll="no" style="overflow: hidden">
       
      
               
                   <div class="col-md-12">
                  
							
                            

								   <?php  
								$no_news = mysqli_num_rows($result);
								if($no_news == 0){  ?>
								
								
								<div class="col-md-12">
                                           <div class="form-group" align = "center">
											    <h4><b>There are no current live news on this page.</b> </h4>
                       
                                           </div>
                                       </div>
								
								<?php 
								}else{
								while($row = $result->fetch_assoc()) { ?>
								   
								   
                                     <div class="col-md-12" id="article_title">
                                             <div class="form-group" >
                                                 <h5><b><?php echo $row['title'];?></b> </h5>
                                                 
                                             </div>
                                         </div>
										 <div id="article_contents">
										  <div class="clearfix"></div>
										 
                                         <div class="col-md-12">
                                                 <div class="form-group">
												 <?php 
												 $date = date('F j, Y', strtotime($row['dateAndTime']));
												 ?>
                                                     <label><i>Posted on <?php echo $date;?></i></label>
                                                     
                                                 </div>
                                             </div>
                                        
										 <div class="clearfix"></div>
										
                                       <div class="col-md-12" >
                                           <div class="form-group">
                                               <label>
											   
											   <?php if( $row['imageName'] != '')
										{ ?>

										<img src="<?php echo $row['imageName']?>" align = "left" style = "width:auto; height:100px;padding-right: 5px; padding-bottom: 5px">
										<div style="text-align: justify; font-weight: 400;"><?php
											if (isset($_GET['embedded']))
												echo substr($row['description'], 0, 340) . (strlen($row['description']) > 340 ? '...' : '') . '<a target="_parent" href="wp_big2.php?id=' . urlencode($_GET['id']) . (!empty($division) ? '&division=' . intval($_GET['division']) : '') .'">Read More</a>';
											else
												echo $row['description'];
										
										?></div></p>

											<?php } ?>			
											<?php if( $row['imageName'] == '')
											 {												
											 ?>
											 <img src="../images/default_image.png" width="100px" height="100px" align = "left" style = "padding-right: 5px; padding-bottom: 5px"> <?php
											if (isset($_GET['embedded']))
												echo substr($row['description'], 0, 340) . (strlen($row['description']) > 340 ? '...' : '') . '<a target="_parent" href="wp_big2.php?id=' . urlencode($_GET['id'])  . (!empty($division) ? '&division=' . intval($_GET['division']) : '') .  '">Read More</a>';
											else
												echo $row['description'];
											 ?></p>

											 <?php } ?>
											   
											   </label>
                       
                                           </div>
                                       </div>		  
							<div class="clearfix"></div>			
								</div>
				                                            </div>
			
                               
                            

                
				   <?php 
								} }
				   ?>
                     
                 

             
       
   
</body>

<!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<?php if (isset($_GET['collapse'])) {
		?>
		<script>
			$(document).ready(function () {
				$("#article_contents").hide();
				$("#article_title").css({'cursor':'pointer', 'color': '#04954a'});
				$("#article_title").click(function () {
					$("#article_contents").slideToggle(100);
				});
			});
		</script>
		<?php
	}
	?>
<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>

