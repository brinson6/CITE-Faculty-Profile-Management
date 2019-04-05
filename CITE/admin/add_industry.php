<?php
session_start();
require '../includes/db_connection.php';
require('header.php');
$limit = 10;

if($_SESSION["id"] != '') {
$check_limit_query = 'SELECT COUNT(id) AS total  FROM services WHERE faculty_id = '.$_SESSION["id"];
	$check = $conn->query($check_limit_query);
	if( $check == true ) {
	   $row = $check->fetch_assoc();
	}
	else {
		$row['total'] ='0';
	}
   if($row['total'] >= $limit) { ?>

<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

					 <a class="navbar-brand">PROFILE MANAGEMENT: SERVICES</a>
                           <a href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           
                        </li>
                     
							<?php include 'logged_in_as.php';?>	
                        <li>
                            <a href="logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
        <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ADD INDUSTRIAL EXPERIENCE</h4>
								<p style="color:red" > Currently you Reached Limit of <?php echo $limit; ?> , Delete old to add </p>
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm();">
                                    <div class="row">
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">industrial organization </label>
                                                <input type="text" name="industrial_organization" id="industrial_organization" disabled class="form-control">
                                            </div>
                                        </div>
										
										 <div class="form-group">
					<label for="formGroupExampleInput">Example label</label>
					<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
				  </div>
														
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">industrial position </label>
                                                <input type="text" name="industrial_position" id="industrial_position" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">industrial date </label>
                                                <input type="text" name="industrial_date" id="industrial_date" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">industrial description </label>
												<textarea style="width:600px;" rows="5" name="industrial_des" id="industrial_des" disabled class="form-control" placeholder="Enter Description" ></textarea>
                                               </div>
                                        </div>

										<div style="clear:both;"></div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Certificate organization </label>
                                                <input type="text" name="certificate_organization" id="certificate_organization" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">certificate_role </label>
                                                <input type="text" name="certificate_role" id="industrial_position" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">certificate date </label>
                                                <input type="text" name="certificates_date" id="certificates_date" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">certificate description </label>
												<textarea style="width:600px;" rows="5" name="certificate_des" disabled id="certificate_des" class="form-control" placeholder="Enter Description" ></textarea>
                                               </div>
                                        </div>

										<div style="clear:both;"></div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">honors/award organization </label>
                                                <input type="text" name="honors_award_organization" disabled id="honors_award_organization" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">honors/award Role </label>
                                                <input type="text" name="honors_award_role" id="honors_award_role" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">honors/award date </label>
                                                <input type="text" name="honors_award_date" id="honors_award_date" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">honors/award description </label>
												<textarea style="width:600px;" rows="5" name="honors_award_des" id="honors_award_des" disabled class="form-control" placeholder="Enter Description" ></textarea>
                                               </div>
                                        </div>

										<div style="clear:both;"></div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Professional Memberships </label>
                                                <input type="text" name="potentials" id="potentials" disabled class="form-control">
                                            </div>
                                        </div>

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Activities </label>
                                                <input type="text" name="others" id="others"  disabled class="form-control">
                                            </div>
                                        </div>

										<div style="clear:both;"></div>

                                     <div class="clearfix"></div>
                                </form>

                    </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>

</div>

    </div>
   <?php
   } else {
	  if(isset($_POST['organization'])) {
		  extract($_POST);
		  $sql = 'INSERT INTO `industrial`
		  SET
		  `organization` = "'.$organization.'",
		   `city` = "'.$city.'",
		   `state` = "'.$state.'",
		   `country` = "'.$country.'",

		   `job_title` = "'.$jobtitle.'",
		   `sdate` = "'.$sdate.'",
		   `edate` = "'.$edate.'",
		   `description` = "'.htmlentities($description).'",
		   `faculty_id` = "'.$_SESSION['id'].'"';

		if ($conn->query($sql) === TRUE) {
		//$msg = "Record Added";
		//header('Location:services.php?msg='.$msg);
		//echo '<script> alert("Industrial Experience Added Successfully..") </script>';
		echo '<script language="JavaScript"> window.location.href ="services.php" </script>';
	} else {
		$msg =  "Error Adding record: " . $conn->error;
	}
  }

?>

<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<a class="navbar-brand">PROFILE MANAGEMENT: SERVICES</a>
					</div>
                           
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li> 
                        </li>
                      <?php include 'logged_in_as.php';?>	
                        <li>
                            <a href="logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
        <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ADD INDUSTRIAL EXPERIENCE</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?>
                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">
										
								<div class="col-md-12">
								<div class="form-group">
								<label for="formGroupExampleInput">Organization</label>
								<input type="text" class="form-control" id="organization" name = "organization" required>
							  </div>
							  </div>
							  
							  <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Job Title</label>
                                                <input type="text" name="jobtitle" id="jobtitle" class="form-control" required>
                                            </div>
                                        </div>
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">City </label>
                                                <input type="text" name="city" id="city" class="form-control" required>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">State</label>
                                                <input type="text" name="state" id="state" class="form-control" required>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Country</label>
                                                <input type="text" name="country" id="country" class="form-control" required>
                                            </div>
                                        </div>
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Start Date</label>
                                                <input type="text" name="sdate" id="sdate" class="form-control datepicker" required>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">End Date</label>
                                                <input type="text" name="edate" id="edate" class="form-control datepicker" required>
                                            </div>
                                        </div>
										
										
										<div style="clear:both;"></div>
										
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description </label>
												<textarea style="width:400px;" rows="5" name="description" id="description" class="form-control" placeholder = "Please enter a description upto a limit of 500 words." ></textarea>
                                               </div>
                                        </div>
										
										<div style="clear:both;"></div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Industrial Experience</button>
                                    <div class="clearfix"></div>
                                </form>
                    </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
   <?php }  ?>

 </div>



        <footer class="footer">

        </footer>

  


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

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-46172202-1', 'auto');
      ga('send', 'pageview');
 	 function validateForm(){
		 var dateInput1 = $("#industrial_date").val();
		 var dateInput2 = $("#certificates_date").val();
			     var dateInput3 = $("#honors_award_date").val();


					 var goodDate = /^(19[5-9]\d|20[0-4]\d|2050)/;
					 var t = dateInput1.match(goodDate);
					  var tt = dateInput2.match(goodDate);
					 var ttt = dateInput3.match(goodDate);

					 	if($("#industrial_organization").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter string value for industrial organization up to 50 words");
					 			 return false;
					 		 }else if($("#industrial_position").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid industrial position up to 50 words");
					 			 return false;
					 		 }else if($("#industrial_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid industrial description  up to 50 words");
					 			 return false;
					 		 }else if($("#certificate_organization").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid certificate organization up to 50 words");
					 			 return false;
					 		 }else if($("#certificate_role").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid certificate role up to 50 words");
					 			 return false;
					 		 }else if($("#certificate_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid certificate description up to 50 words");
					 			 return false;
					 		 }else if($("#honors_award_organization").val().length>50 ){
					 				 alert(" enter valid honors/award organization up to 50 words");
					 							return false;
					 		 }else if($("#honors_award_role").val().length>50 ){
					 				 alert(" enter valid honors/award  role up to 50 words");
					 							return false;
					 		 }else if($("#honors_award_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid honors/award description up to 50 words");
					 			 return false;
					 		 }
					 }

    </script>
<!------Date Picker---------->
	
	<link href="calender/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="calender/jquery-1.9.1.js"></script>
	<script src="calender/jquery-ui-1.10.3.custom.js"></script>
	
<script>
	$(function() {
    $( ".datepicker" ).datepicker({
	
	dateFormat: "mm/dd/yy",
    });
  });
</script>
 </html>
<?php
} else {
	header('Location:index.php');
exit();
}
?>
