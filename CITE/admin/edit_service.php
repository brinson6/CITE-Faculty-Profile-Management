<?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {
	  if(isset($_POST['industrial_organization'])) {
		  extract($_POST);
		  $sql = 'UPDATE `services`
		  SET
		  `industrial_organization` = "'.$industrial_organization.'",
		   industrial_position = "'.$industrial_position.'",
           city = "'.$city.'",
           state = "'.$state.'",
           country = "'.$country.'",
		   industrial_date = "'.$industrial_date.'",
           industrial_edate = "'.$industrial_edate.'",
		   industrial_des = "'.$industrial_des.'",

		   certificate_organization = "'.$certificate_organization.'",
		   certificate_role = "'.$certificate_role.'",
		   certificates_date = "'.$certificates_date.'",
		   

		   honors_award_organization = "'.$honors_award_organization.'",
		   honors_award_role = "'.$honors_award_role.'",
		   honors_award_date = "'.$honors_award_date.'",
		   honors_award_des = "'.$honors_award_des.'",

		   potentials = "'.$potentials.'",
		   others = "'.$others.'"
		  WHERE id ="'.$_GET["id"].'"';

		if ($conn->query($sql) === TRUE) {
		$msg = "Record Updated";
	} else {
		$msg =  "Error updating record: " . $conn->error;
	}
  }
$sql = 'SELECT * FROM  services where id = "'.$_GET["id"] .'" ';
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

                           <a href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="add_service.php">
                              Add service
                            </a>
                        </li>
                        <li class="dropdown">


                        </li>
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
                                <p style="color:red" ><?php if(isset($msg)) {
                                    echo $msg;
                                }?>
                                <h4 class="title">Industrial Experience</h4>
								
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm();">
                                    <div class="row">
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">organization </label>
                                                <input type="text" name="industrial_organization" id="industrial_organization" class="form-control" value="<?php echo $row['industrial_organization']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">city </label>
                                                <input type="text" name="city" id="city" class="form-control" value="<?php echo $row['city']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">state </label>
                                                <input type="text" name="state" id="state" class="form-control" value="<?php echo $row['state']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">country </label>
                                                <input type="text" name="country" id="country" class="form-control" value="<?php echo $row['country']?>">
                                            </div>
                                        </div>
										<div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">job title </label>
                                                <input type="text" name="industrial_position" id="industrial_position" class="form-control" value="<?php echo $row['industrial_position']?>">
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">start date </label>
                                                <input type="date" name="industrial_date" id="myDate" class="form-control" value="<?php echo $row['industrial_date']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">end date </label>
                                                <input type="date" name="industrial_edate" id="myDate" class="form-control" value="<?php echo $row['industrial_edate']?>">
                                            </div>
                                        </div>
										<div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">description </label>
												<textarea style="width:250px;" rows="5" name="industrial_des" id="industrial_des" class="form-control" placeholder="Enter Description" ><?php echo $row['industrial_des']?></textarea>
                                               </div>
                                        </div>

										<div style="clear:both;"></div>
                                         <div class="header">
                                <h4 class="title">Certification</h4>
                                
                            </div>
                                         <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">name </label>
                                                <input type="text" name="certificate_role" id="industrial_position" class="form-control" value="<?php echo $row['certificate_role']?>">
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">organization </label>
                                                <input type="text" name="certificate_organization" id="certificate_organization" class="form-control" value="<?php echo $row['certificate_organization']?>">
                                            </div>
                                        </div>
										
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">date </label>
                                                <input type="text" name="certificates_date" id="certificates_date" class="form-control" value="<?php echo $row['certificates_date']?>">
                                            </div>
                                        </div>
										

										<div style="clear:both;"></div>
                                         <div class="header">
                                <h4 class="title">Honours/Awards</h4>
                                
                            </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">name </label>
                                                <input type="text" name="honors_award_role" id="honors_award_role" class="form-control" value="<?php echo $row['honors_award_role']?>">
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">organization </label>
                                                <input type="text" name="honors_award_organization" id="honors_award_organization" class="form-control" value="<?php echo $row['honors_award_organization']?>">
                                            </div>
                                        </div>
										
										<div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">year </label>
                                                <input type="text" name="honors_award_date" id="honors_award_date" class="form-control" value="<?php echo $row['honors_award_date']?>">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">description </label>
												<textarea style="width:600px;" rows="5" name="honors_award_des" id="honors_award_des" class="form-control" placeholder="Enter Description" ><?php echo $row['honors_award_des']?></textarea>
                                               </div>
                                        </div>

										<div style="clear:both;"></div>
                                         <div class="header">
                                <h4 class="title">Professional Membership</h4>
                                
                            </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                
                                                <input type="text" name="potentials" id="potentials" class="form-control" value="<?php echo $row['potentials']?>">
                                            </div>
                                        </div>
                                        <div style="clear:both;"></div>
                                         <div class="header">
                                <h4 class="title">Activities</h4>
                                
                            </div>

										<div class="col-md-4">
                                            <div class="form-group">
                                                
                                                <input type="text" name="others" id="others" class="form-control" value="<?php echo $row['others']?>">
                                            </div>
                                        </div>

										<div style="clear:both;"></div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right" >Update service</button>
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
		  
			     



	 if($("#industrial_organization").val().replace(/\s{2,}/g, ' ').split(" ").length >50 || $("#industrial_organization").val() == ''){

				  alert("Please enter string value for industrial organization up to 50 words");
			  return false;
		  }
          if($("#city").val().replace(/\s{2,}/g, ' ').split(" ").length >50 || $("#city").val() == ''){

                  alert("Please enter string value for city up to 50 words");
              return false;
          }
          if($("#state").val().replace(/\s{2,}/g, ' ').split(" ").length >50 || $("#state").val() == ''){

                  alert("Please enter string value for state up to 50 words");
              return false;
          }
          if($("#country").val().replace(/\s{2,}/g, ' ').split(" ").length >50 || $("#country").val() == ''){

                  alert("Please enter string value for country up to 50 words");
              return false;
          }
			else if($("#industrial_position").val().replace(/\s{2,}/g, ' ').split(" ").length >50 || $("#industrial_position").val() == ''){
				  alert("Please enter valid industrial position up to 50 words");
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
		  }else if($("#honors_award_organization").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#honors_award_organization").val() == ''){
				  alert("Please enter valid honors/award organization up to 50 words");
			  return false;
		  }else if($("#honors_award_role").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#honors_award_role").val() == ''){
				  alert("Please enter valid honors/award  role up to 50 words");
			  return false;
		  }else if($("#honors_award_date").val().replace(/\s{2,}/g, ' ').split(" ").length>4 || $("#honors_award_date").val() == ''){
                  alert("Please enter valid honors/award  year up to 4 digits");
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
 </html>
<?php
} else {
	header('Location:index.php');
exit();
}
?>
