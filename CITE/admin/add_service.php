<?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '') {
$check_limit_query = 'SELECT COUNT(id) AS total  FROM services WHERE faculty_id = '.$_SESSION["id"];
	$check = $conn->query($check_limit_query);

	if( $check == true ) {
	   $row = $check->fetch_assoc();
	}
	else {
		$row['total'] ='0';
	}
   if($row['total'] >= '5') { ?>

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
                                <p style="color:red" > Currently you Reached Limit of 5 , Delete old to add </p>
                                <h4 class="title">Industrial Experience</h4>
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm();">
                                    <div class="row">
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">organization </label>
                                                <input type="text" name="industrial_organization" id="industrial_organization" disabled class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">city </label>
                                                <input type="text" name="city" id="city" disabled class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">state </label>
                                                <input type="text" name="state" id="state" disabled class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">country </label>
                                                <input type="text" name="country" id="country" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">job title </label>
                                                <input type="text" name="position" id="position" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">start date </label>
                                                <input type="date" name="industrial_date" id="myDate" disabled class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">end date </label>
                                                <input type="date" name="industrial_edate" id="myDate" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">description </label>
												<textarea style="width:250px;" rows="5" name="industrial_des" id="industrial_des" disabled class="form-control" placeholder="Enter Description" ></textarea>
                                               </div>
                                        </div>

										<div style="clear:both;"></div>
                                        <div class="header">
                                
                                <h4 class="title">Certification</h4>
                            </div>
                                         <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">name </label>
                                                <input type="text" name="certificate_role" id="industrial_position" disabled class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">organization </label>
                                                <input type="text" name="certificate_organization" id="certificate_organization" disabled class="form-control">
                                            </div>
                                        </div>
										
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">date </label>
                                                <input type="text" name="certificates_date" id="certificates_date" disabled class="form-control">
                                            </div>
                                        </div>
										
										<div style="clear:both;"></div>
                                        <div class="header">
                                
                                <h4 class="title">Honors/Awards</h4>
                            </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">name </label>
                                                <input type="text" name="honors_award_role" id="honors_award_role" disabled class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">organization </label>
                                                <input type="text" name="honors_award_organization" disabled id="honors_award_organization" class="form-control">
                                            </div>
                                        </div>
										
										<div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">year </label>
                                                <input type="text" name="honors_award_date" id="honors_award_date" disabled class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">description </label>
												<textarea style="width:600px;" rows="5" name="honors_award_des" id="honors_award_des" disabled class="form-control" placeholder="Enter Description" ></textarea>
                                               </div>
                                        </div>

										<div style="clear:both;"></div>
  <div class="header">
                                
                                <h4 class="title">Professional Memberships</h4>
                            </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                              
                                                <input type="text" name="potentials" id="potentials" disabled class="form-control">
                                            </div>
                                        </div>
                                        <div style="clear:both;"></div>
<div class="header">
                                
                                <h4 class="title">Activities</h4>
                            </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                
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
	  if(isset($_POST['industrial_organization'])) {
		  extract($_POST);
		  $sql = 'INSERT INTO `services`
		  SET
		  `industrial_organization` = "'.$industrial_organization.'",
		   industrial_position = "'.$industrial_position.'",
		   industrial_date = "'.$industrial_date.'",
           industrial_edate = "'.$industrial_edate.'",
           city = "'.$city.'",
           state = "'.$state.'",
           country = "'.$country.'",

		   industrial_des = "'.$industrial_des.'",

		   certificate_organization = "'.$certificate_organization.'",
		   certificate_role = "'.$certificate_role.'",
		   certificates_date = "'.$certificates_date.'",
		   certificate_des = "'.$certificate_des.'",

		   honors_award_organization = "'.$honors_award_organization.'",
		   honors_award_role = "'.$honors_award_role.'",
		   honors_award_date = "'.$honors_award_date.'",
		   honors_award_des = "'.$honors_award_des.'",

		   potentials = "'.$potentials.'",
		   others = "'.$others.'",
		   faculty_id = "'.$_SESSION['id'].'"';

		if ($conn->query($sql) === TRUE) {
		$msg = "Record Added";
		header('Location:services.php?msg='.$msg);
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
                                <h4 class="title">Industrial Experience</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?>
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm();">
                                    <div class="row">
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">organization </label>
                                                <input type="text" name="industrial_organization" id="industrial_organization" class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">city </label>
                                                <input type="text" name="city" id="city" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">state </label>
                                                <input type="text" name="state" id="state" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">country </label>
                                                <input type="text" name="country" id="country" class="form-control">
                                            </div>
                                        </div>

										<div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">job title </label>
                                                <input type="text" name="industrial_position" id="industrial_position" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">start date </label>
                                                <input type="date" name="industrial_date" id="myDate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">end date </label>
                                                <input type="date" name="industrial_edate" id="myDate" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">description </label>
												<textarea style="width:250px;" rows="5" name="industrial_des" id="industrial_des" class="form-control" placeholder="Enter Description" ></textarea>
                                               </div>
                                        </div>

										<div style="clear:both;"></div>
                                         
                                         <div class="header">
                                <h4 class="title">Certification</h4>
                                <p style="color:red" ><?php if(isset($msg)) {
                                    echo $msg;
                                }?>
                            </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">name </label>
                                                <input type="text" name="certificate_role" id="certificate_role" class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-md-3">
                                            <div class="form-group">
                                             
                                                <label for="exampleInputEmail1">organization </label>
                                                <input type="text" name="certificate_organization" id="certificate_organization" class="form-control">
                                            </div>
                                        </div>
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">date </label>
                                                <input type="text" name="certificates_date" id="myDate" class="form-control">
                                            </div>
                                        </div>
										

										<div style="clear:both;"></div>
                                        <div class="header">
                                <h4 class="title">Honors/Award</h4>
                                <p style="color:red" ><?php if(isset($msg)) {
                                    echo $msg;
                                }?>
                            </div>
                                         <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">name </label>
                                                <input type="text" name="honors_award_role" id="honors_award_role" class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">organization </label>
                                                <input type="text" name="honors_award_organization" id="honors_award_organization" class="form-control">
                                            </div>
                                        </div>
										
										<div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">year </label>
                                                <input type="text" name="honors_award_date" id="honors_award_date" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">description </label>
												<textarea style="width:600px;" rows="5" name="honors_award_des" id="honors_award_des" class="form-control" placeholder="Enter Description" ></textarea>
                                               </div>
                                        </div>

										<div style="clear:both;"></div>
                                        <div class="header">
                                
                                <p style="color:red" ><?php if(isset($msg)) {
                                    echo $msg;
                                }?>
                            </div>
										<div class="header">
                                
                                <h4 class="title">Professional Memberships</h4>
                            </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              
                                                <input type="text" name="potentials" id="potentials" class="form-control">
                                            </div>
                                        </div>
                                        <div style="clear:both;"></div>
<div class="header">
                                
                                <h4 class="title">Activities</h4>
                            </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                <input type="text" name="others" id="others"  class="form-control">
                                            </div>
                                        </div>

										<div style="clear:both;"></div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add service</button>
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
		 


					 

					 	if($("#industrial_organization").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter string value for industrial organization up to 50 words");
					 			 return false;
                                 }else if($("#city").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
                                     alert(" enter valid city up to 50 words");
                                 return false;
                                 }else if($("#state").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
                                     alert(" enter valid state up to 50 words");
                                 return false;
                                 }else if($("#country").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
                                     alert(" enter valid country up to 50 words");
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
					 		 }else if($("#honors_award_date").val().length>4 ){
                                     alert(" enter valid honors/award  year up to 4 digits");
                                                return false;
                             }else if($("#honors_award_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid honors/award description up to 50 words");
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
