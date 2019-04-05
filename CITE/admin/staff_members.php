  <?php
session_start();
require '../includes/db_connection.php';
require_once('../includes/staff.php');
require('header.php');
if((new User($conn, $_SESSION['id']))->get_permissions() < 2){
  http_response_code(401);
  exit();
}

if(isset($_GET['deactivate'])) {
	$sql = 'UPDATE `staff`  SET `status` = "0" where  id = "'.$_GET['deactivate'] .'" ';
    $results = $conn->query($sql);
	$msg = 'User Deactivated';
}

if(isset($_GET['activate'])) {
 	$sql = 'UPDATE `staff`  SET `status` = "1" where  id = "'.$_GET['activate'] .'" ';
     $results = $conn->query($sql);
 	$msg = 'User Activated';
}
$staff_list = Staff::list_staff($conn);
$sql = 'SELECT * FROM  staff ORDER BY name ';
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

                    <a class="navbar-brand">PROFILE MANAGEMENT: STAFF MEMBERS</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                      <li>
                         <a href="add_staff.php">
                            Add Staff members
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
                                <h4 class="title">EDIT STAFF MEMBERS
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
                                    	<th>Office</th>
                                        <th>Belongs To</th>
                                        <th>Status </th>
                                    	<th>Edit</th>
                                    	<th>Action</th>
										<th>Delete</th>
                                     </thead>
                                    <tbody>
                                      <?php foreach($staff_list as $staff_member) {
                                        echo '<tr>';
                                        echo '<td>' . $staff_member->get_name() . ' ' . $staff_member->get_last_name() . '</td>' . PHP_EOL;
                                        echo '<td>' . $staff_member->get_email() . '</td>' . PHP_EOL;
                                        echo '<td>' . $staff_member->get_phone() . '</td>' . PHP_EOL;
                                        echo '<td>' . $staff_member->get_office_address() . '</td>' . PHP_EOL;
                                        echo '<td>' . $staff_member->get_department() . '</td>' . PHP_EOL;
                                        echo '<td>' . ($staff_member->is_active() ? 'Active' : 'Deactivated') . '</td>' . PHP_EOL;
                                        echo '<td><a href="edit_staff.php?id='. $staff_member->get_id() . '">Edit</a></td>' . PHP_EOL;
                                        $act_status = $staff_member->is_active() ? 'Deactivate' : 'Activate';
                                        printf("<td><a href=\"staff_members.php?%2\$s=%1\$d\"  onclick=\"return confirm('Are you sure you want to %2\$s %3\$s %4\$s?');\">%5\$s</a></td>", $staff_member->get_id(), strtolower($act_status), $staff_member->get_name(), $staff_member->get_last_name(), $act_status);


                                        echo  '<td><a href="delete_staff_member.php?delete=' . $staff_member->get_id() . '" onclick="return confirm(\'Are you sure you want to delete the profile for ' . $staff_member->get_name() . ' ' . $staff_member->get_last_name() . '?\');">Delete</a></td>' . PHP_EOL;
                                        echo '</tr>';
                                      } ?>

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


    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>


<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
