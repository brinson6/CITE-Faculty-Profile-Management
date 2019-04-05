  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION['name']!='yoow@marshall.edu'){
  header('Location:edit_profile.php ');
  exit();
}
if($_SESSION["id"] != '') {

 if(isset($_GET['deactivate'])) {
	$sql = 'UPDATE `faculty_member`  SET `status` = "0" where  id = "'.$_GET['deactivate'] .'" ';
    $results = $conn->query($sql);
	$msg = 'User Deactivated';
	}
  if(isset($_GET['activate'])) {
 	$sql = 'UPDATE `faculty_member`  SET `status` = "1" where  id = "'.$_GET['activate'] .'" ';
     $results = $conn->query($sql);
 	$msg = 'User Activated';
 	}

 $sql = 'SELECT * FROM  faculty_member WHERE email <> "yoow@marshall.edu" order by name ';
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

                    <a class="navbar-brand">PROFILE MANAGEMENT: FACULTY MEMBERS</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                      <li>
                         <a href="add_admin_faculty.php">
                            Add-Faculty members
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
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">EDIT FACULTY MEMBERS
								<p style="color:red" ><?php if(isset($_GET['msg'])) {
									echo $_GET['msg'];
								}?>
								<?php if(isset($msg)) {
									echo $msg;
								}?>
								</p></h4>
                            </div>
							 <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
									<th>Name</th>
									<th>Email</th>
									     <th>Phone</th>
                                    	<th>Address </th>
                                        <th>Designation </th>
                                        <th>Status </th>
                                    	<th>Edit</th>
                                    	<th>Action</th>
										<th>Delete</th>
                                     </thead>
                                    <tbody>
								<?php  while($row = $result->fetch_assoc()) { ?>
                                        <tr>
										<td><?php echo $row['name'];?></td>
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row['phone'];?></td>
                                        	<td><?php echo $row['office_address'];?></td>
                                        	<td><?php echo $row['designation'];?></td>
                                          <td><?php if( $row['status'] =='0') {
                                            echo 'Deactivated';
                                          } else {
                                            echo 'Active';
                                          }?></td>
                                        	<td>

                                            <a href="edit_faculty_member.php?id=<?php echo $row['id'];?>"  >Edit</a></td>
                                        	<td>

                                            <?php if( $row['status'] =='0') {  ?>
  <a href="faculty_members.php?activate=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to activate <?php echo $row['name'].' '.$row['l_name']; ?>?');">Activate</a>
      <?php } else { ?>
   <a href="faculty_members.php?deactivate=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to deactivate <?php echo $row['name'].' '.$row['l_name']; ?>?');">Deactivate</a>
                                          <?php      } ?>

                                          </td>
										  <td>
										  <a href="delete_faculty_member.php?delete=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete the profile, <?php echo $row['name'].' '.$row['l_name']; ?>?');" >Delete</a></td>
									
                                        </tr>

								<?php }?>

								  </tbody>
                                </table>

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

    </script>



<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
<?php
} else {
	header('Location:index.php');
exit();
}

?>
