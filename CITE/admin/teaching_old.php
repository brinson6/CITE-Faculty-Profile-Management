  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {

 if(isset($_GET['delete'])) {
	$sql = 'DELETE FROM  teaching where  id = "'.$_GET['delete'] .'" ';
    $results = $conn->query($sql);
	//$msg = 'Data Deleted';
		echo '<script language="JavaScript"> window.location.href ="teaching.php" </script>';
	}

 $sql = 'SELECT * FROM  teaching where faculty_id = "'.$_SESSION["id"] .'" ';
 $result = $conn->query($sql);


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

                    <a class="navbar-brand">Teaching</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
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
					
                            
								    <?php

                        if($_SESSION["id"] != '') {

                        if(isset($_GET['delete'])) {
                        $sql = 'DELETE FROM  description where  id = "'.$_GET['delete'] .'" ';
                          $results = $conn->query($sql);
						 $msg = "Data Deleted";
						 header('Location:teaching.php?msg='.$msg);
                        // echo '<script> alert("Record Deleted Successfully..") </script>';
                        //echo '<script language="JavaScript"> window.location.href ="description.php" </script>';
                        }

                        $sql = 'SELECT * FROM  description where faculty_id = "'.$_SESSION["id"] .'" ';
                        $result = $conn->query($sql);


                        ?>

                        <div class="card">						        
                            <div class="header">
                                <h5 class="title"><b>Teaching Interest </b><p style="color:red" ><?php if(isset($_GET['msg'])) {
                  echo $_GET['msg'];
                }?>
                <?php if(isset($msg)) {
                  echo $msg;
                }?>
                </p></h5>

                            </div>


<div class="content table-responsive table-full-width">

                <?php
                $no_courses = mysqli_num_rows($result);
                if($no_courses == 0){
                  ?>
                    <div class="alert alert-warning" role="alert">Teaching Interest not added.</div><a href="add_description.php">Click Here To Add</a>
                  <?php
                }
                else{
                  ?>

                  <table class="table table-hover">
                                    <thead>
                                      <th>Teaching Interest</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                     </thead>
                                    <tbody>

                  <?php

                  while($row = $result->fetch_assoc())
                  { ?>
                      <tr>
                        <td><?php echo $row['description'];?></td>
                        <td><a href="edit_description.php?id=<?php echo $row['id'];?>">Edit</a></td>
                        <td><a href="teaching.php?delete=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to remove the following teaching interest?');">Delete</a></td>
                      </tr>
                  <?php
                  }

                }?>

                  </tbody>
                                </table>

                            </div>
							<br/>
                       
						<br/>
						</div>
						<br/>
						
						
						
                        <div class="card">						        
                            <div class="header">
							<?php 
							if(isset($_GET['delete'])) {
	$sql = 'DELETE FROM  teaching where  id = "'.$_GET['delete'] .'" ';
    $results = $conn->query($sql);
	//$msg = 'Data Deleted';
	echo '<script> alert("Record Deleted Successfully..") </script>';
	echo '<script language="JavaScript"> window.location.href ="teaching.php" </script>';
	}

 $sql = 'SELECT * FROM  teaching where faculty_id = "'.$_SESSION["id"] .'" ';
 $result = $conn->query($sql);


?>
                                <h5 class="title"><b>Courses Taught (Please Add Only Top 10 Courses Taught) &nbsp <a href ="add_teaching.php">Create New</a></b><p> <style="color:red" >
                                   <?php if(isset($_GET['msg'])) {
									echo $_GET['msg'];
								}?>
								<?php if(isset($msg)) {
									echo $msg;
								}?>
								</p></h5>

                            

<div class="content table-responsive table-full-width">

								<?php
								$no_courses = mysqli_num_rows($result);
								if($no_courses == 0){
									?>
						<div class="alert alert-warning" role="alert">Teaching info not added.</div><a href="add_teaching.php">Click Here To Add</a>
									<?php
								}
								else{
									?>


									<table class="table table-hover">
                                    <thead>
									                             <th>Course Number</th>
                                    	<th>Course Name </th>
                                        <th> Year </th>
                                    	<th>Edit</th>
                                    	<th>Delete</th>
                                     </thead>
                                    <tbody>

									<?php

									while($row = $result->fetch_assoc())
									{ ?>
											<tr>
											  <td><?php echo $row['subjectnumber'];?></td>
												<td><?php echo $row['subjectname'];?></td>
												<td><?php echo $row['date'];?></td>
												<td><a href="edit_teachinginfo.php?id=<?php echo $row['id'];?>">Edit</a></td>
												<td><a href="teaching.php?delete=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
											</tr>
									<?php
									}

								}?>

								  </tbody>
                                </table>

                              
							  <br/>
                          </div>
					
						  </div>
						</div>
						<br/>
						 
			
                      
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



<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
<?php
} else {
	header('Location:index.php');
exit();
}

?>

<?php
} else {
header('Location:index.php');
exit();
}

?>
