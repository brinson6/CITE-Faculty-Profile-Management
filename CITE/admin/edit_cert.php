<?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {
	  if(isset($_POST['organization'])) {
		  extract($_POST);
		  $sql = 'UPDATE `certification`
		  SET
		  `organization` = "'.$organization.'",
		   `name` = "'.$name.'",
		   `date` = "'.$date.'"
		  WHERE id ="'.$_GET["id"].'"';

		if ($conn->query($sql) === TRUE) {
		//$msg = "Record Updated";

		echo '<script language="JavaScript"> window.location.href ="services.php" </script>';
	} else {
		$msg =  "Error updating record: " . $conn->error;
	}
  }
$sql = 'SELECT * FROM  certification where id = "'.$_GET["id"] .'" ';
$result = $conn->query($sql);
$row = $result->fetch_assoc();

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
                                <h4 class="title">EDIT CERTIFICATION</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?>
                            </div>
                            <div class="content">
                                <form method="post" >
                                    <div class="row">
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name </label>
                                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']?>" required>
                                            </div>
                                        </div>

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Organization </label>
                                                <input type="text" name="organization" id="organization" class="form-control" value="<?php echo $row['organization']?>" required>
                                            </div>
                                        </div>

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Date </label>
                                                <input type="text" name="date" id="date" class="form-control" value="<?php echo $row['date']?>" required>
                                            </div>
                                        </div>

										<div style="clear:both;"></div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right"  >Update Certification</button>
                                    <div class="clearfix"></div>
                                </form>

                    </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>


 </div></div>



        <footer class="footer">

        </footer>

    </div>
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
	 if($("#industrial_organization").val().replace(/\s{2,}/g, ' ').split(" ").length >50 || $("#industrial_organization").val() == ''){

				  alert("Please enter string value for industrial organization up to 50 words");
			  return false;
		  }
			else if($("#industrial_position").val().replace(/\s{2,}/g, ' ').split(" ").length >50 || $("#industrial_position").val() == ''){
				  alert("Please enter valid industrial position up to 50 words");
			  return false;
		  }else if ( t === null){
				alert("Please enter Date as (Start Year) to (End Year) Formate, e.g 1950-2010 ");
		 					 return false;
		  }else if($("#industrial_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#industrial_des").val() == ''){
				  alert("Please enter valid industrial description  up to 50 words");
			  return false;
		  }

			else if($("#certificate_organization").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#certificate_organization").val() == ''){
				  alert("Please enter valid certificate organization up to 50 words");
			  return false;
		  }else if($("#certificate_role").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#certificate_role").val() == ''){
				  alert("Please enter valid certificate role up to 50 words");
			  return false;
		  }else if($("#certificate_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#certificate_des").val() == ''){
				  alert("Please enter valid certificate description up to 50 words");
			  return false;
		  }else if($("#certificates_date").val() == ''){
				alert("Please enter Date as (Start Year) to (End Year) Formate, e.g 1950-2010 ");
		 					 return false;
		  }else if ( tt === null){
			alert("Please enter Date as (Start Year) to (End Year) Formate, e.g 1950-2010 ");
						 return false;

		  }else if($("#honors_award_organization").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#honors_award_organization").val() == ''){
				  alert("Please enter valid honors/award organization up to 50 words");
			  return false;
		  }else if($("#honors_award_role").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#honors_award_role").val() == ''){
				  alert("Please enter valid honors/award  role up to 50 words");
			  return false;
		  }else if ( ttt === null){

				alert("Please enter Date as (Start Year) to (End Year) Formate, e.g 1950-2010 ");
							 return false;

		  }else if($("#honors_award_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#honors_award_des").val() == ''){
				  alert("Please enter valid honors/award description up to 50 words");
			  return false;
		  }else if($("#others").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#others").val() == ''){
				  alert("Please enter valid others up to 50 words");
			  return false;
		  }else if($("#potentials").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#potentials").val() == ''){
				  alert("Please enter valid potentials up to 50 words");
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
