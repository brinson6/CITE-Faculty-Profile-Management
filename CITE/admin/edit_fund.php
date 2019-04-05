  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '') {
   if(isset($_POST['fund_sponsor'])) {
  $sql = 'UPDATE `funds`
	  SET
	  `project_name` = "'.htmlspecialchars($_POST['project_name']).'",
	  `fund_sponsor` = "'.$_POST['fund_sponsor'].'",
	  `start_date` = "'.$_POST['start_date'].'",
	  `end_date` = "'.$_POST['end_date'].'",
	  `fund_type` = "'.$_POST['fund_type'].'",
	  `fund_amount` = "'.$_POST['fund_amount'].'",
	  `fund_des` = "'.htmlspecialchars($_POST['fund_des']).'"
	   WHERE id ="'.$_GET["id"].'"';

	if ($conn->query($sql) === TRUE) {
    $msg = "record updated successfully";

  header('Location:selected_publications.php?msg='.$msg);
	} else {
    $msg =  "Error : " . $conn->error;
}

  }

$sql = 'SELECT * FROM  funds where id = "'.$_GET["id"] .'" ';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<a class="navbar-brand">PROFILE MANAGEMENT: RESEARCH</a>
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
                                <h4 class="title">EDIT FUND</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?></p>
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm()">
                                    <div class="row">

										<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Project Name </label>
                                                <input type="text" id="project_name" name="project_name" class="form-control" value = "<?php echo $row['project_name'];?>" >
                                            </div>
                                        </div>
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sponsor </label>
                                                <input type="text" id="fund_sponsor" name="fund_sponsor" class="form-control" value = "<?php echo $row['fund_sponsor'];?>">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Amount </label>
                                                <input type="text" id="fund_amount" name="fund_amount" class="form-control" value = "<?php echo $row['fund_amount'];?>">
                                            </div>
                                        </div>
										
										
										
										 <div class="form-group col-md-4">
											  <label for="exampleInputEmail1">Fund Type</label>
											  <select id="fund_type" name="fund_type" class="form-control">
												<option value = "<?php echo $row['fund_type'];?>" selected><?php echo $row['fund_type'];?></option>
												<option value = "">---Select---</option>
												<option value = "Government">Government</option>
												<option value = "Foundation">Foundation</option>
												<option value = "Industry">Industry</option>	
												<option value = "Marshall Funding">Marshall Funding</option>
												<option value = "Others">Others</option>
											  </select>
										</div>
										<div style="clear:both;"></div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Start Date </label>
                                                <input type="text" id="start_date" name="start_date" class="form-control" value = "<?php echo $row['start_date'];?>">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">End Date </label>
                                                <input type="text" id="end_date" name="end_date" class="form-control" value = "<?php echo $row['end_date'];?>">
                                            </div>
                                        </div>

                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" name="fund_des" id="fund_des" class="form-control" placeholder="Enter description upto a limit of 500 words." ><?php echo $row['fund_des'];?></textarea>
                                            </div>
                                        </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Edit Fund</button>
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
      if($("#fund_sponsor").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#fund_sponsor").val() == ''){
          alert("Please enter valid sponsor, up to 50 words");
          return false;
        }else if($("#fund_amount").val().replace(/\s{2,}/g, ' ').split(" ").length>50) {
          alert("Please enter valid fund amount up to 50 words");
          return false;
        }else if($("#fund_type").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#fund_type").val() == ''){
          alert("Please enter valid fund type up to 50 words");
          return false;
        }else if($("#fund_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ) {
          alert("Please enter valid fund_des up to 50 words");
          return false;
        }
		  else if( $("#fund_year").val() != '' || $("#fund_year").val() == ''){
			     var dateInput = $("#fund_year").val();
 var goodDate = /^(19[5-9]\d|20[0-4]\d|2050)/;
 var y ;
    if(dateInput.match(goodDate)){

    } else {
			  alert("Please enter Date as (Start Year) to (End Year) Formate, e.g 1950-2010 ");
			  			  return false;

    }
		  }
	  }


    </script>



<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
<?php
} else {
	header('Location:index.php');
exit();
}

?>
