  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {

	 if(isset($_GET['delete'])) {
	$sql = 'DELETE FROM  services where  id = "'.$_GET['delete'] .'" ';
    $results = $conn->query($sql);
	$msg = 'Data Deleted';
	}

 $sql = 'SELECT * FROM  industrial where faculty_id = "'.$_SESSION["id"] .'" ';
 $result_ind = $conn->query($sql);

 $sql_cert = 'SELECT * FROM  certification where faculty_id = "'.$_SESSION["id"] .'" ';
 $result_cert = $conn->query($sql_cert);

 $sql_awd = 'SELECT * FROM  awards where faculty_id = "'.$_SESSION["id"] .'" ';
 $result_awd = $conn->query($sql_awd);

 $sql_mem = 'SELECT * FROM  membership where faculty_id = "'.$_SESSION["id"] .'" ';
 $result_mem = $conn->query($sql_mem);

 $sql_act = 'SELECT * FROM  activities where faculty_id = "'.$_SESSION["id"] .'" ';
 $result_act = $conn->query($sql_act);

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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
							<?php 
							$no_ind = mysqli_num_rows($result_ind);
							?>
                                <h5 class="title"><b>Industrial Experience (Please Add top 5 Industrial Experiences)&nbsp 
								
																			
								<?php 
								if($no_ind >= 5){ ?>
									<a >You can add Industrial Experiences upto a limit of 5 rows. </a></b></b><p style="color:red" >
								<?php }else{ ?>
								<a href="add_industry.php">Create New</a></b></b><p style="color:red" >
								<?php if(isset($_GET['msg'])) {
									echo $_GET['msg'];
								 }
								if(isset($msg)) {
									echo $msg;
								}?>
								</p></h5>
								
								<?php
								}
								
								?>
								
                            </div>
							 <div class="content table-responsive table-full-width">
								<?php
								
								
								if($no_ind == 0){
									?>
										<div class="alert alert-warning" role="alert">Industrial Experience not added.</div>
									<?php
								}
								else
								{
									?>

										<table class="table table-hover">
										<thead>
											<th>Organization </th>
											<th>City</th>
											<th>State</th>
											<th>Country</th>
											<th>Job Title</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Description</th>
											<th>Edit</th>
											<th>Delete</th>
										 </thead>
										<tbody>

										<?php $i=0; while($row = $result_ind->fetch_assoc()) {$i++ ?>
                                        <tr>
                                        	<td><?php echo $row['organization'];?></td>
                                        	<td><?php echo $row['city'];?></td>
											<td><?php echo $row['state'];?></td>
                                        	<td><?php echo $row['country'];?></td>
											<td><?php echo $row['job_title'];?></td>
                                        	<td><?php echo $row['sdate'];?></td>
											<td><?php echo $row['edate'];?></td>
                                        	<td><?php echo $row['description'];?></td>
                                        	<td><a href="edit_industry.php?id=<?php echo $row['id'];?>" >Edit</a></td>
                                        	<td><a href="delete_industry.php?delete=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
                                        </tr>

								<?php }

								}
								?>
								  </tbody>
                                </table>

                            </div>
							<br/>


						</div>
						<br/>
                    </div>

					<div class="col-md-10">
                        <div class="card">
                            <div class="header">
							<?php $no_cert = mysqli_num_rows($result_cert);?>
							
							
                                <h5 class="title"><b>Certification (Please Add top 5 Certifications)&nbsp 
								
																			
								<?php 
								if($no_cert >= 5){ ?>
									<a >You can add Certifications upto a limit of 5 rows. </a></b></b><p style="color:red" >
								<?php }else{ ?> 
								<a href="add_cert.php">Create New</a></b></b><p style="color:red" >
								<?php if(isset($_GET['msg'])) {
									echo $_GET['msg'];
								 }
								if(isset($msg)) {
									echo $msg;
								}?>
								</p></h5>
								
								<?php
								}
								
								?>
							 <div class="content table-responsive table-full-width">
								<?php
								
								if($no_cert == 0){
									?>
										<div class="alert alert-warning" role="alert">Certifications not added.</div>
									<?php
								}
								else
								{
									?>

										<table class="table table-hover">
										<thead>
											<th>Name</th>
											<th>Organization</th>
											<th>Date</th>
											<th>Edit</th>
											<th>Delete</th>
										 </thead>
										<tbody>

										<?php $c=0; while($row = $result_cert->fetch_assoc()) {$c++ ?>
                                        <tr>
                                        	<td><?php echo $row['name'];?></td>
                                        	<td><?php echo $row['organization'];?></td>
											<td><?php echo $row['date'];?></td>
                                        	<td><a href="edit_cert.php?id=<?php echo $row['id'];?>" >Edit</a></td>
                                        	<td><a href="delete_cert.php?delete=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
                                        </tr>

								<?php }

								}
								?>
								  </tbody>
                                </table>

                            </div>
							<br/>
							<!--
							<?php
								if(isset($c) && $c == 5){
									?>
									<a href="#" class="btn btn-info btn-fill pull-right" onclick="return confirm('Currently you Reached Limit of 5 , Delete old to add');">Add Certification</a>
								<?php
								}
								else{
									?>

									<a href="add_cert.php" >&nbsp &nbsp &nbsp &nbsp Add Certification</a>
									<?php
								}
							?> -->


						</div>
						<br/>
                    </div>
				<div class="col-md-10">
                        <div class="card">
                            <div class="header">
							<?php 
							$no_awd = mysqli_num_rows($result_awd);
							?>
                                <h5 class="title"><b>Honors/Awards (Please Add top 5 Honors/ Awards) &nbsp;
								<?php 
								if($no_awd >= 5){ ?>
									<a >You can add Honors/ Awards upto a limit of 5 rows. </a></b></b><p style="color:red" >
								<?php }else{ ?>
								<a href="add_awd.php">Create New</a></b></b><p style="color:red" >
								<?php if(isset($_GET['msg'])) {
									echo $_GET['msg'];
								 }
								if(isset($msg)) {
									echo $msg;
								}?>
								</p></h5>
								
								<?php
								}
								
								?>
							 <div class="content table-responsive table-full-width">
								<?php
								$no_awd = mysqli_num_rows($result_awd);
								if($no_awd == 0){
									?>
										<div class="alert alert-warning" role="alert">Honors/Awards not added.</div>
									<?php
								}
								else
								{
									?>

										<table class="table table-hover">
										<thead>
											<th>Name</th>
											<th>Organization</th>
											<th>Year</th>
											<th>Description</th>
											<th>Edit</th>
											<th>Delete</th>
										 </thead>
										<tbody>

										<?php $h=0; while($row = $result_awd->fetch_assoc()) {$h++ ?>
                                        <tr>
                                        	<td><?php echo $row['name'];?></td>
                                        	<td><?php echo $row['organization'];?></td>
											<td><?php echo $row['year'];?></td>
											<td><?php echo $row['description'];?></td>
                                        	<td><a href="edit_awd.php?id=<?php echo $row['id'];?>" >Edit</a></td>
                                        	<td><a href="delete_awd.php?delete=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
                                        </tr>

								<?php }

								}
								?>
								  </tbody>
                                </table>

                            </div>
							<br/>
							<!--<?php
								if(isset($h) && $h == 5){
									?>
									<a href="#" class="btn btn-info btn-fill pull-right" onclick="return confirm('Currently you Reached Limit of 5 , Delete old to add');">Add Honors/Awards</a>
								<?php
								}
								else{
									?>

									<a href="add_awd.php" >&nbsp &nbsp &nbsp &nbsp Add Honors/Awards</a>
									<?php
								}
							?>-->


						</div>
						<br/>
                    </div>
				<div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <h5 class="title"><b>Professional Membership (Please Add top 5 Professional Membership)</b><p style="color:red" ><?php if(isset($_GET['msg'])) {
									echo $_GET['msg'];
								}?>
								<?php if(isset($msg)) {
									echo $msg;
								}?>
								</p></h5>
                            </div>
							 <div class="content table-responsive table-full-width">
								<?php
								$no_mem = mysqli_num_rows($result_mem);
								//echo $no_mem;
								if($no_mem == 0){
									?>
										<div class="alert alert-warning" role="alert">Professional Membership not added.</div>
									<?php
								}
								else
								{
									?>

										<table class="table table-hover">
										<thead>
											<th>Name</th>
											<th>Edit</th>
											<th>Delete</th>
										 </thead>
										<tbody>

										<?php $m=0; while($row = $result_mem->fetch_assoc()) {$m++ ?>
                                        <tr>
                                        	<td><?php echo $row['name'];?></td>
                                        	<td><a href="edit_mem.php?id=<?php echo $row['id'];?>" >Edit</a></td>
                                        	<td><a href="delete_mem.php?delete=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
                                        </tr>

								<?php }

								}
								?>
								  </tbody>
                                </table>

                            </div>
							<br/>
							<?php
								if(isset($m) && $m == 5){
									?>
									<a href="#" class="btn btn-info btn-fill pull-right" onclick="return confirm('Currently you Reached Limit of 5 , Delete old to add');">Add Professional Membership</a>
								<?php
								}
								else{
									?>

									<a href="add_mem.php" >&nbsp &nbsp &nbsp &nbsp Add Professional Membership</a>
									<?php
								}
							?>


						</div>
						<br/>
                    </div>
				<div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <h5 class="title"><b>Professional Development/ Community Services/ Other Activities <br>(Please Add top 5 Industrial Activities)</b><p style="color:red" ><?php if(isset($_GET['msg'])) {
									echo $_GET['msg'];
								}?>
								<?php if(isset($msg)) {
									echo $msg;
								}?>
								</p></h5>
                            </div>
							 <div class="content table-responsive table-full-width">
								<?php
								$no_act = mysqli_num_rows($result_act);
								//echo $no_mem;
								if($no_act == 0){
									?>
										<div class="alert alert-warning" role="alert">Activities not added.</div>
									<?php
								}
								else
								{
									?>

										<table class="table table-hover">
										<thead>
											<th>Name</th>
											<th>Edit</th>
											<th>Delete</th>
										 </thead>
										<tbody>

										<?php $a=0; while($row = $result_act->fetch_assoc()) {$a++ ?>
                                        <tr>
                                        	<td><?php echo $row['name'];?></td>
                                        	<td><a href="edit_act.php?id=<?php echo $row['id'];?>" >Edit</a></td>
                                        	<td><a href="delete_act.php?delete=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
                                        </tr>

								<?php }

								}
								?>
								  </tbody>
                                </table>

                            </div>
							<br/>
							<?php
								if(isset($a) && $a == 5){
									?>
									<a href="#" class="btn btn-info btn-fill pull-right" onclick="return confirm('Currently you Reached Limit of 5 , Delete old to add');">Add Activities</a>
								<?php
								}
								else{
									?>

									<a href="add_act.php" >&nbsp &nbsp &nbsp &nbsp Add Activities</a>
									<?php
								}
							?>


						</div>
						<br/>
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

    </script>

</html>
<?php
} else {
	header('Location:index.php');
exit();
}

?>
