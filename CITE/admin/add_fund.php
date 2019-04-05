
  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '') {
	$check_limit_query = 'SELECT COUNT(id) AS total  FROM funds WHERE facult_id = '.$_SESSION["id"];
	$check = $conn->query($check_limit_query);
	if( $check == true ) {
	   $row = $check->fetch_assoc();
	}
	else {
		$row['total'] ='0';
	}
   if($row['total'] >= '10') { ?>
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
                                <h4 class="title">ADD FUND</h4>
								<p style="color:red" >Currently you Reached Limit of 10 , Delete old to add</p>
                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Project Name </label>
                                                <input type="text" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sponsor </label>
                                                <input type="text" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Amount </label>
                                                <input type="text" disabled class="form-control">
                                            </div>
                                        </div>
										<div style="clear:both;"></div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fund Type </label>
                                                <input type="text"  disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Start Date </label>
                                                <input type="date"  disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">End Date </label>
                                                <input type="date"  disabled class="form-control">
                                            </div>
                                        </div>

                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5"  class="form-control" disabled placeholder="Enter Description" ></textarea>
                                            </div>
                                        </div>

                                     <div class="clearfix"></div>
                                </form>

                    </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>



   <?php
 }
   else {

   if(isset($_POST['fund_sponsor'])) {
  $sql = 'insert into `funds`
	  SET
	  `project_name` = "'.htmlentities($_POST['project_name']).'",
	  `fund_sponsor` = "'.$_POST['fund_sponsor'].'",
	  `start_date` = "'.$_POST['start_date'].'",
	  `end_date` = "'.$_POST['end_date'].'",
	  `fund_type` = "'.$_POST['fund_type'].'",
	  `fund_amount` = "'.preg_replace('/[^(\x20-\x7F)]*/','',$_POST['fund_amount']).'",
	  `fund_des` = "'.htmlentities($_POST['fund_des']).'",
	   facult_id ="'.$_SESSION["id"].'"';

	if ($conn->query($sql) === TRUE) {
    $msg = "New record created successfully";
    header('Location:selected_publications.php?msg='.$msg);
	} else {
    $msg =  "Error : " . $conn->error;
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
                                <h4 class="title">ADD FUND</h4>
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
                                                <input type="text" id="project_name" name="project_name" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sponsor </label>
                                                <input type="text" id="fund_sponsor" name="fund_sponsor" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Amount </label>
                                                <input type="text" id="fund_amount" name="fund_amount" class="form-control">
                                            </div>
                                        </div>
										
										
										
										 <div class="form-group col-md-4">
											  <label for="exampleInputEmail1">Fund Type</label>
											  <select id="fund_type" name="fund_type" class="form-control">
												<option value = ""selected>---Select---</option>
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
                                                <input type="text" id="start_date" name="start_date" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">End Date </label>
                                                <input type="text" id="end_date" name="end_date" class="form-control">
                                            </div>
                                        </div>

                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" name="fund_des" id="fund_des" class="form-control" placeholder="Enter description upto a limit of 500 words." ></textarea>
                                            </div>
                                        </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Fund</button>
                                    <div class="clearfix"></div>
                                </form>

                    </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
   <?php } ?>

 </div></div>



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
	  if($("#fund_sponsor").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#fund_sponsor").val() == ''){
			  alert("Please enter valid sponsor, up to 50 words");
			  return false;
		  }else if($("#fund_amount").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
			  alert("Please enter valid fund amount up to 50 words");
			  return false;
		  }else if($("#fund_type").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#fund_type").val() == ''){
			  alert("Please enter valid fund type up to 50 words");
			  return false;
		  }else if($("#fund_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50)  {
			  alert("Please enter valid fund_des up to 50 words");
			  return false;
		  }
		  else if( $("#fund_year").val() != '' || $("#fund_year").val() == ''){
			     var dateInput = $("#fund_year").val(); }

 var goodDate = /^(19[5-9]\d|20[0-4]\d|2050)/;
    if (dateInput.match(goodDate)){
        //return true;
    } else {
			  alert("Please enter Date as (Start Year) to (End Year) Formate, e.g 1950-2010 ");
			  			  return false;

    }
  }
    </script>

 </html>
<?php
} else {
	header('Location:index.php');
exit();
}
?>
