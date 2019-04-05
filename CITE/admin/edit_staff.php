<?php
session_start();
error_reporting(E_ALL);

// included packages
// Database
require_once( '../includes/db_connection.php');
// Class for Staff members
require_once( '../includes/staff.php');
// Class for faculty members
require_once( '../includes/user.php');
// Class for handling image uploads
require_once( 'includes/ImageUpload.php');
// Class for performing validations
require_once( '../includes/validations.php');

// Class for roles and departments
require_once('../includes/department.php');
require_once('../includes/roles.php');

$reject = false;
$pat = '';

if (isset($_SESSION['id']) && !empty($_SESSION['id']) && is_numeric($_SESSION['id'])) {
	if (isset($_GET['id']) && $_SESSION['table'] == 'faculty') {
		$user = new User($conn, $_SESSION['id']);
		$staff_member = new Staff($conn, $_GET['id']);
		$edit_permission = $user->can_edit($staff_member->get_division_id());
	} else if ($_SESSION['table'] == 'staff') {
		$staff_member = $user = new Staff($conn, $_SESSION['id']);
		$edit_permission = true;
	}

	if ($edit_permission && !empty($_POST)) {
		$requirements = json_decode(file_get_contents('assets/json/staff_requirements.json'), true);
		$reject = false;
		$query_arr = array();

		$msg = '';

		if (Validations::email($_POST, 'email')) $staff_member->set_email($_POST['email']);
		else $msg = "Email address is not valid.";

		if (Validations::string($_POST, 'name') && empty($msg)) $staff_member->set_name($_POST['name']);
		else $msg = 'First name is not valid.';

		if (Validations::string($_POST, 'l_name') && empty($msg)) 
			$staff_member->set_last_name($_POST['l_name']);
		else if ($requirements['l_name'])
			$msg = 'Last name is not valid.';

		if (Validations::department($_POST['department']) && empty($msg))
			$staff_member->set_department($_POST['department']);
		else if ($requirements['department'])
			$msg = 'Department ID is invalid. Please choose a valid department.';
		
		if (Validations::phone_number($_POST, 'phone') && empty($msg))
			$staff_member->set_phone($_POST['phone']);
		else if ($requirements['phone'])
			$msg = "Phone number is not valid. Please enter a proper phone number.";
		
		if (Validations::string($_POST, 'office_address') && empty($msg))
			$staff_member->set_office_address($_POST['office_address']);
		else if ($requirements['office_address'] && !empty($_POST['office_address']))
			$msg = "Office address is invalid. Please enter an office address.";
		
		if (Validations::role($_POST['role']) && empty($msg))
			$staff_member->set_role($_POST['role']);
		else if ($requirements['role'] && !array_key_exists($_POST, 'role'))
			$msg = "Please select a valid role.";

		$reject = $reject || !empty($msg);

		if (isset($_POST['image']) && file_exists($_POST['image'])) {
			$staff_member->set_image($_POST['image']);
		} 

		/**
			*	This part includes some validations for data on the back end as well
			*	as proper sanitation when inserting into the database. Unfinished
			*	as of Sept 8, 2018 by Dakota Brinson
			*/

		$excluded = array();

		$_PAGE_TITLE = "Editing profile for " . htmlspecialchars($staff_member->get_name());

		if (!$reject && $staff_member->save_record()) {
			$pat = '<div class="alert alert-success"><strong>Record updated.</strong></div>';
		} else {
			$pat = '<div class="alert alert-warning"><strong>Record not updated:</strong> Error (' . (isset($conn->error) ? $conn->error : $msg) . ')</div>';
		}

	} else if (!$edit_permission) {
		header('Location: index.php');
		exit();
		echo '<script>alert("Insufficient Privileges");</script>';
	}

	require('header.php');
} else {
	header('Location:index.php');
	exit();
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
						<div class="content">
							<a href="/cite/staff.php?id=<?php echo $staff_member->get_id(); ?>">View your profile</a>
						</div>
						</div>
						<?php echo $pat; ?>
						<div class="card">
							<div class="header">
								<h4 class="title">BASIC INFORMATION</h4>
								<?php if(isset($msg)) echo '<p style="color: red;">' . $msg . '</p>'; ?>
							</div>
							<div class="content">
								<form method="post" enctype="multipart/form-data" id="form1" onsubmit="var t = validateForm(event); if (t) document.getElementById('form1').submit(); return t;">
									<div class="row">
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>First NAME - MIDDLE NAME</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="First & Middle Name" value="<?php echo $reject ? $_POST['name'] : $staff_member->get_name(); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
											<div class="form-group">
												<label>LAST NAME</label>
												<input type="text" name="l_name" id = "l_name" class="form-control" placeholder="Last  Name" value="<?php echo $reject ? $_POST['l_name'] : $staff_member->get_last_name(); ?>">
											</div>
                                        </div>
										<div class="form-group col-md-6">
									  		<label for="department">Belongs To</label>
									  		<select class="form-control" id="department"  name="department" required>
												<option value="<?php echo $reject ? $_POST['department'] : $staff_member->get_department_id(); ?>" ><?php echo $reject ? Department::get_department($_POST['department']) : $staff_member->get_department(); ?></option>
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
									  		<label for="role">Role</label>
									  		<select class="form-control" id="role"  name="role" required>
												<option value="<?php echo $reject ? $_POST['role'] : $staff_member->get_role_id(); ?>" ><?php echo $staff_member->get_role(); ?></option>
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
										<div class="col-md-4">
											<div class="form-group">
												<label>PHONE</label>
												<input type="tel"  name="phone" id="phone" class="form-control" placeholder="10 Digits Phone Number" value="<?php echo $reject ? $_POST['phone'] : $staff_member->get_phone(); ?>">
											</div>
										</div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                               <label>Office Number</label>
                                               <input type="text" name="office_address" id = "office_address" class="form-control" placeholder="EG. WAEC XXXX" value="<?php echo $reject ? $_POST['office_address'] : $staff_member->get_office_address(); ?>">
                                           </div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">EMAIL </label>
												<input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $reject ? $_POST['email'] : $staff_member->get_email(); ?>">
											</div>
										</div>
											  
										<div class="clearfix"></div>
										<div class="header">
											<h4 class="title">YOUR PICTURE</h4>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Your Current Picture</label>
												<img src="<?php echo $staff_member->get_image() != '' ? $staff_member->get_image() : '../images/default_image.png'; ?>" width="70px" height="70px">
												<br />
											</div>
										</div>
																				<div class="col-md-4">
											<div class="form-group">
												<label>Change Image</label>
												<div id="container_image">
        	

										        </div>        

											</div>
                                        </div>
									</div>
									<!--<div class="clearfix"></div>-->
									<div class="header">
										<h4 class="title">EDUCATION</h4>		
									</div>
									<div class="clearfix"></div>
									<p style="font-weight: bold; margin: 0px 20px;">Please enter up to 3 degrees in chronological order.</p> 
									<?php for ($i = 1; $i < 4; $i++) {
										$deg = $staff_member->get_degree($i);
										?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group" style="padding-left: 10px;">
                                                    <label>Degree name </label>
                                                    <input type="text" name="degree<?php echo $i; ?>Name" id = "degree<?php echo $i; ?>" class="form-control" placeholder="Name" value="<?php echo $reject ? $_POST['degree' . $i ] : $deg['name']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>School Name</label>
                                                    <input type="text" name="degree<?php echo $i; ?>School" id = "degree<?php echo $i; ?>_school" class="form-control" placeholder="School" value="<?php echo $reject ? $_POST['degree' . $i . 'School'] : $deg['school']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Graduation Year</label>
                                                    <input type="text" name="degree<?php echo $i; ?>Year" id="degree<?php echo $i; ?>_year" class="form-control" placeholder="Year" value="<?php echo $reject ? $_POST['degree' . $i . 'Year'] : ($deg['year'] ? $deg['year'] : ''); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
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
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
    <script	src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="includes/jquery-picture-cut/src/jquery.picture.cut.js"></script>    
    <script>

	function isValidEmailAddress(emailAddress) {
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		return pattern.test(emailAddress);
	}

	function evaluateRequirements() {
		var requiredObj = <?php echo file_get_contents('assets/json/staff_requirements.json'); ?>;
		Object.keys(requiredObj).forEach(function(key) {
			if (requiredObj[key]) {
				$('#' + key).before(' <span style="color: #f00;">*</span> ');
				console.log(key);
			}
		});
	}
	
	function validateForm(event){
		event.preventDefault();
	
		try {
		var alerts = [];
	   
		var name = document.getElementById("name").value;
		var l_name = document.getElementById("l_name").value;
		var phone = document.getElementById("phone").value;
		var office_address = document.getElementById("office_address").value;
		var email = document.getElementById("email").value;
		var cur_year = (new Date()).getFullYear();
		var FileUploadPath = document.getElementById("image").value;
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
	   
		if(FileUploadPath)
		{  
			var validImageExtensions = ['gif', 'png', 'bmp', 'jpeg', 'jpg'];
			Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

			if (validImageExtensions.indexOf(Extension) == -1) {
				alerts.push("Please select an image file having an extension like .bmp/.jpg/.jpeg/.png.");
			}
	   }
	 
	  
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
		
		// checking for a valid phone number
		var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
		if(requiredFields.indexOf('phone') !== -1 && (phoneNumberPattern.test(phone) == false || phone == '')) {
			issue_found.push("phone");
			alerts.push('Please enter a valid 10 digit phone number.');
		}
		
		// checking for valid office address
		if(requiredFields.indexOf('office_address') !== -1 && (office_address.length > 140 || office_address == '')) {
			issue_found.push("office_address");
        	alerts.push("Please enter a valid office address up to 140 characters.");
		}
		  
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
		} catch (e) {
		   throw new Error(e.message);
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
