 <?php
 
session_start();
error_reporting(E_ALL);
$_SESSION["admin_status"] = "0";
$_SESSION["prev_status"] = "0";
$_PAGE_TITLE = "New Staff Member";

require_once( '../includes/db_connection.php');
require_once( '../includes/staff.php');
require_once( '../includes/user.php');

if(isset($_SESSION['id']) && $_SESSION['id'] != '' && is_numeric($_SESSION['id']))
{
	$user = new User($conn, $_SESSION['id']);
	$staff_member = new Staff($conn);
	if ($user->can_edit($staff_member->get_division_id()))
	{
		$image_status = TRUE;
	
		if(isset($_POST['name'])) {
			$requirements = json_decode(file_get_contents('assets/json/staff_requirements.json'), true);
			$reject = false;
			$query_arr = array();
			$staff_member->set_email($_POST['email']);
			$staff_member->set_name($_POST['name']);
			$staff_member->set_last_name($_POST['l_name']);
			$staff_member->set_department($_POST['department']);
			//$staff_member->set_phone($_POST['phone']);
			//$staff_member->set_password($_POST['password']);
			//$staff_member->set_office_address($_POST['office_address']);
			$staff_member->set_role($_POST['role']);
			$staff_member->set_division($user->get_division_id());
		 
			   
			/**
			*	This part includes some validations for data on the back end as well
			*	as proper sanitation when inserting into the database. Unfinished
			*	as of Sept 8, 2018 by Dakota Brinson
			*/

			$excluded = array();

			if (!$reject && $staff_member->add_record()) {
				echo '<script> alert("Record Updated");document.location.href="/cite/staff.php?id=' . $staff_member->get_id() . '";</script>';
			} else {
				echo '<script>alert("Record Not Updated: Error (' . (isset($conn->error) ? $conn->error : 'Invalid Form') . ')");</script>';
			}
		}
	} else {
		echo '<script>alert("Insufficient privileges");</script>';
	}

	require('header.php');

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
					<a class="navbar-brand">PROFILE MANAGEMENT: ABOUT ME</a>
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
						<div class="card">
							<div class="header">
								<h4 class="title">NEW STAFF MEMBER - BASIC INFORMATION</h4>
								<?php if(isset($msg)) echo '<p style="color: red;">' . $msg . '</p>'; ?>
							</div>
							<div class="content">
								<form method="post" enctype="multipart/form-data" id="form1" onsubmit="var t = validateForm(event); if (t) document.getElementById('form1').submit(); return t;">
									<div class="row">
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>First NAME - MIDDLE NAME</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="First & Middle Name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
											<div class="form-group">
												<label>LAST NAME</label>
												<input type="text" name="l_name" id = "l_name" class="form-control" placeholder="Last  Name" value="">
											</div>
                                        </div>
										<div class="form-group col-md-6">
									  		<label for="department">Belongs To</label>
									  		<select class="form-control" id="department"  name="department" required>
												<option value="" >-- Select Department --</option>
												<?php
													$result2 = $conn->query("SELECT * FROM departments");

													while($department = $result2->fetch_object())   
													{
														echo '<option value="' . $department->id . '">' . $department->name . '</option>';
													}
												?>
											</select>
										</div>
										<div class="form-group col-md-6">
									  		<label for="role">Role <a href="add_role.php">Add New</a></label>
									  		<select class="form-control" id="role"  name="role" required>
												<option value="" >-- Select Role --</option>
												<?php
													$sql2 = "SELECT * FROM staff_roles";
													$result2 = $conn->query($sql2);

													while($row2 = $result2->fetch_object())   
													{
														echo '<option value="' . $row2->id . '">' . $row2->name . '</option>';
													}
												?>
											</select>
										</div>
										<!--<div class="form-group col-md-4">
									  		<label for="password">Password</label>
									  		<input class="form-control" id="password" type="password" name="password" required />
										</div>
										<div class="form-group col-md-4">
									  		<label for="password_verify">Repeat Password</label>
									  		<input class="form-control" id="password_verify" type="password" name="password_verify" required />
										</div>-->
										<div class="col-md-4">
											<div class="form-group">
												<label for="email">EMAIL </label>
												<input type="email" id="email" name="email" class="form-control" placeholder="email@marshall.edu" value="">
											</div>
										</div>
										<div class="clearfix"></div>
                                   	<button id="form1-button" type="submit" class="btn btn-info btn-fill pull-right" >Submit</button>
                                   	<div class="clearfix"></div>
                               	</form>
		                   	</div>
                    	</div>
                	</div>
            	</div>
        	</div>
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
	            <script	src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

	            <script src="includes/jquery-picture-cut/src/jquery.picture.cut.js"></script>    


    <script>

	function isValidEmailAddress(emailAddress) {
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		return pattern.test(emailAddress);
	}

	function evaluateRequirements() {
		var requiredObj = <?php echo file_get_contents('assets/json/staff_requirements.json'); ?>;
		//requiredObj.password = true;
		//requiredObj.password_verify = true;
		Object.keys(requiredObj).forEach(function(key) {
			if (requiredObj[key]) {
				$('#' + key).before(' <span style="color: #f00;">*</span> ');
				console.log(key);
			}
		});
	}
	
	function validateForm(event){
		event.preventDefault();
	
		var alerts = [];
	   
		var name = document.getElementById("name").value;
		var l_name = document.getElementById("l_name").value;
		var email = document.getElementById("email").value;
		var cur_year = (new Date()).getFullYear();
		var Extension;
		var issue_found = [];
		var requiredObj = <?php echo file_get_contents('assets/json/staff_requirements.json'); ?>;
		var requiredFields = [];

		Object.keys(requiredObj).forEach(function(key) {
			if (requiredObj[key]) {
				requiredFields.push(key);
			}
		});

		console.log(requiredFields);
	   
	  	// * checking for a valid first name
		if(requiredFields.indexOf('name') !== -1 && name == '' || name.length > 50) {
			issue_found.push("name");
			alerts.push("Please enter a valid first name up to 50 words.");
		}
		
		// * checking for a valid last name
		if(requiredFields.indexOf('l_name') !== -1 && l_name == '' || l_name.length > 50) {
			issue_found.push("l_name");
			alerts.push("Please enter a valid last name up to 50 characters.");
		}

		/*if (document.getElementById("password").value != document.getElementById("password_verify").value) {
			issue_found.push("password");
			issue_found.push("password_verify");
			alerts.push("Passwords entered must match.");
		}*/
		
  
		// * checking for valid e-mail address
		if(!isValidEmailAddress(email) || requiredFields.indexOf('email') !== -1 && email == '') {
			issue_found.push("email");
			alerts.push("Please enter a valid e-mail. Example: name@marshall.edu.");
		}

		// if there are no issues to report, report them and return false
		if (alerts.length > 0) {
			alert("Sorry, but your entry has the following issue" + (alerts.length == 1 ? '' : 's') + ":\n\n- " + alerts.join("\n- ")
				+ "\n\n Please fix the issue" + (alerts.length == 1 ? '' : 's') + " above and submit it again");
			issue_found.forEach(function (t) {
				document.getElementById(t).style.backgroundColor = '#ffeeee';
			});
			document.getElementById(issue_found[0]).focus();
			return false;
		}

	  return true;

	  }
	  evaluateRequirements();	


    </script>

    <script>
    	$("#container_image").PictureCut({
              InputOfImageDirectory       : "image",
              PluginFolderOnServer        : "cite/admin/includes/jquery-picture-cut/",
              FolderOnServer              : "/cite/admin/assets/uploads/",
              EnableCrop                  : true,
              CropWindowStyle             : "Bootstrap"
          });
    </script>

<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
<?php
} else {
	header('Location:index.php');
exit();
}

?>
