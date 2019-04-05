<?php
session_start();
require_once '../includes/db_connection.php';
require_once '../includes/staff.php';
require_once 'header.php';

if((new User($conn, $_SESSION['id']))->get_permissions() < 2){
  http_response_code(401);
  exit("401 Error: Insufficient Privileges to access this page.");
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

                    <a class="navbar-brand">DEPARTMENT MANAGER</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                      <li>
                         <a href="add_department.php">
                            Add Department
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
<?php
$sql = $conn->prepare('SELECT `id`,`name` FROM `departments`');
$sql->execute();
$sql->bind_result($department_id, $department_name);
?>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div style="display: flex; justify-content:space-between; flex-direction: row;">
                            <div class="header">
                                <h4 class="title">EDIT DEPARTMENTS
								<p style="color:red" ><?php if(isset($_GET['msg'])) {
									echo $_GET['msg'];
								}?>
								<?php if(isset($msg)) {
									echo $msg;
								}?>
								</p></h4>
                            </div>
                             <p class="header"><a float="right" href="staff_roles.php">Staff Roles</a></p></div>
							 <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
										<th>Name</th>
                                    	<th>Edit</th>
										<th>Delete</th>
                                    </thead>
                                    <tbody>
                                      <?php while($sql->fetch()) {
                                        echo '<tr>';
	                                        echo '<td>' . $department_name . '</td>' . PHP_EOL;
	                                        echo '<td><a href="edit_department.php?id='. $department_id . '">Edit</a></td>' . PHP_EOL;
	                                        echo  '<td><a href="edit_department.php?delete=' . $department_id . '" onclick="return confirm(\'Are you sure you want to delete the department for ' . $department_name . '?\');">Delete</a></td>' . PHP_EOL;
                                        echo '</tr>';
                                      } ?>
								  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
				</div>
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
<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
