 <?php
 
session_start();
error_reporting(E_ALL);
$_SESSION["admin_status"] = "0";
$_SESSION["prev_status"] = "0";

//echo $profile_name;
require_once( '../includes/db_connection.php');
require_once( '../includes/user.php');
// parsedown package for user input formatting
// include '../includes/Parssedown.php';
require_once('includes/ImageUpload.php');
require('header.php');

if(isset($_SESSION['id']) && $_SESSION['id'] != '' && is_numeric($_SESSION['id']))
{
	$user = new User($conn, $_SESSION['id']);
	$image_status = TRUE;
	
	if(isset($_POST['name'])) {
		/*if(isset($_FILES["image"]["name"] ))
		{
			$file_name=$_FILES["image"]["name"];
			$temp_name=$_FILES["image"]["tmp_name"];
			$imgtype=$_FILES["image"]["type"];
			
			$ext= ImageUpload::GetImageExtension($imgtype);
			$imagename=date("d-m-Y")."-".time().$ext;
			$target = "../images/".$imagename;
			$target_path = (string) $target;
		}*/
		
		$requirements = json_decode(file_get_contents('assets/json/requirements.json'), true);
		$reject = false;
		$query_arr = array();
		$user->set_email($_POST['email']);
		$user->set_name($_POST['name']);
		$user->set_last_name($_POST['l_name']);
		$user->set_division($_POST['division']);
		$user->set_phone($_POST['phone']);
		$user->set_office_address($_POST['office_address']);
		$user->set_designation($_POST['designation']);
		$user->set_overview($_POST['overview']);
		$user->set_degree($_POST['degree1Name'], $_POST['degree1School'], $_POST['degree1Year'], 1);
		$user->set_degree($_POST['degree2Name'], $_POST['degree2School'], $_POST['degree2Year'], 2);
		$user->set_degree($_POST['degree3Name'], $_POST['degree3School'], $_POST['degree3Year'], 3);		
	 
		if(isset($_POST['image']))//$image_status === TRUE && move_uploaded_file($temp_name, $target_path)) {
			$user->set_image($_POST['image']);
		//}
			   
		/**
		*	This part includes some validations for data on the back end as well
		*	as proper sanitation when inserting into the database. Unfinished
		*	as of Sept 8, 2018 by Dakota Brinson
		*/

		$excluded = array();

		if (!$reject && $user->commit_record()) {
			echo '<script> alert("Record Updated"); </script>';
		} else {
			echo '<script>alert("Record Not Updated: Error (' . isset($conn->error) ? $conn->error : 'Invalid Form' . ')");</script>';
		}
	}
$_SESSION["name"] = $user->get_email();
$_SESSION["id"] = $user->get_id();
?>

<html>
	<head>
		<title><?php echo "Editing profile for " . htmlspecialchars($user->get_name()); ?></title>
	</head>
<body>
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
							<a href="/cite/faculty.php?id=<?php echo $user->get_id(); ?>">View your profile</a>
						</div></div>
						<div class="card">
							<div class="header">
								<h4 class="title">BASIC INFORMATION</h4>
								<?php if(isset($msg)) echo '<p style="color: red;">' . $msg . '</p>'; ?>
							</div>
							<div class="content">
								<form method="post" enctype="multipart/form-data" id="form1" onsubmit="var t = validateForm(event); if (t) document.getElementById('form1').submit(); return t;">
									<div class="row">
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>First NAME - MIDDLE NAME</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="First & Middle Name" value="<?php echo $user->get_name(); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
											<div class="form-group">
												<label>LAST NAME</label>
												<input type="text" name="l_name" id = "l_name" class="form-control" placeholder="Last  Name" value="<?php echo $user->get_last_name(); ?>">
											</div>
                                        </div>
										<div class="col-md-4">
											<div class="form-group">
												<label>OFFICE PHONE</label>
												<input type="tel"  name="phone" id="phone" class="form-control" placeholder="10 Digits Phone Number" value="<?php echo $user->get_phone(); ?>">
											</div>
										</div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                               <label>Office Number</label>
                                               <input type="text" name="office_address" id = "office_address" class="form-control" placeholder="EG. WAEC XXXX" value="<?php echo $user->get_office_address(); ?>">
                                           </div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">OFFICE EMAIL </label>
												<input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->get_email(); ?>">
											</div>
										</div>
											  
										<div class="clearfix"></div>
										<div class="header">
											<h4 class="title">YOUR PICTURE</h4>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Your Current Picture</label>
												<img src="<?php echo $user->get_image() != '' ? $user->get_image() : '../images/default_image.png'; ?>" width="70px" height="70px">
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
                                        <div class="row">
											<p style="font-weight: bold; margin: 0px 20px;">Please enter up to 3 degrees in chronological order.</p> 
                                            <div class="col-md-3">
                                                <div class="form-group" style="padding-left: 10px;">
                                                    <label>Degree name </label>
                                                    <input type="text" name="degree1Name" id = "degree1" class="form-control" placeholder="Name" value="<?php echo $user->get_degree(1)->name; ?>">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>School Name</label>
                                                    <input type="text" name="degree1School" id = "degree1_school" class="form-control" placeholder="School" value="<?php echo $user->get_degree(1)->school; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Graduation Year</label>
                                                    <input type="text" name="degree1Year" id="degree1_year" class="form-control" placeholder="Year" value="<?php echo $user->get_degree(1)->year == 0 ? '' : $user->get_degree(1)->year; ?>" />
                                                </div>
                                            </div>

                                            </div>
                                            <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <!--<label>Degree2 name </label>-->
                                                    <input type="text" name="degree2Name" id = "degree2" class="form-control" placeholder="Name" value="<?php echo $user->get_degree(2)->name; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <!-- <label>Degree2 School Name</label>-->
                                                    <input type="text" name="degree2School" id = "degree2_school" class="form-control" placeholder="School" value="<?php echo $user->get_degree(2)->school; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <!--<label>Degree2 Year</label>-->
                                                    <input type="text" name="degree2Year" id="degree2_year" class="form-control" placeholder="Year" value="<?php echo $user->get_degree(2)->year == 0 ? '' : $user->get_degree(2)->year; ?>" />
                                                </div>
                                            </div>

                                            </div>

                                              <div class="row">

                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <!--<label>Degree3 name </label>-->
                                                    <input type="text" name="degree3Name" id = "degree3" class="form-control" placeholder="Name" value="<?php echo $user->get_degree(3)->name; ?>">
                                                </div> </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <!-- <label>Degree3 School Name</label>-->
                                                        <input type="text" name="degree3School" id = "degree3_school" class="form-control" placeholder="School" value="<?php echo $user->get_degree(3)->school; ?>">
                                                    </div>
                                                </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                  <!--  <label>Degree3 Year</label>-->
                                                    <input type="text" name="degree3Year" id="degree3_year" class="form-control" placeholder="Year" value="<?php echo $user->get_degree(3)->year == 0 ? '' : $user->get_degree(3)->year; ?>" />
                                                </div>
                                            </div>
											</div>
											<div class="row" style="margin: 0px 20px;">
												<a href="services.php" target="_blank">Add Industrial Experience, Certifications, Honors, Professional Memberships, and More</a>
											</div>
											<div class="header">
                                <h4 class="title">PROGRAM INFORMATION</h4>
								
                            </div>
											
												<div class="form-group col-md-4">
									  <label for="division">Division:</label>
									  <select class="form-control" id="division"  name="division" onChange="display(this.value)" required>
										 <option value="<?php echo $user->get_division(); ?>" ><?php echo $user->get_division(); ?></option>
										<?php
												$sql2 = "SELECT * FROM division;";
												$result2 = $conn->query($sql2); ?>
												<option value="" >-- Select Division --</option>
												<?php while($row2 = $result2->fetch_assoc())   
												{
												?>
												
												<option value="<?php echo $row2['divisionName']; ?>"><?php echo $row2['divisionName']; ?></option>
												<?php
												}
												?>
												</select>
									</div>
									
									<div class="col-md-4">
                                                     <div class="form-group">
                                                         <label>DESIGNATION / TITLE</label>
                                                         <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation / Title" value="<?php echo $user->get_designation(); ?>">
                                                     </div>
                                                 </div>
											
											
											
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>overview</label>
                                                    <textarea rows="5" name="overview" id = "overview" class="form-control" placeholder="Enter Description" ><?php echo $user->get_overview(); ?></textarea>
													<br /><p>Overview can be formatted using <a href="https://www.markdownguide.org/cheat-sheet/">MarkDown</a></p>
                                                </div>
                                            </div>


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
            <script src="https://code.jquery.com/jquery-1.11.1.min.js" integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE=" crossorigin="anonymous"></script>
        
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script><!--for bootstrap theme-->    
            <script	src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

              
            <script src="includes/jquery-picture-cut/src/jquery.picture.cut.js"></script>    

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
    // BEGIN GOOGLE ANALYTICS EMBEDDED SCRIPT
    	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   		})(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

      	ga('create', 'UA-46172202-1', 'auto');
      	ga('send', 'pageview');
    // END GOOGLE ANALYTICS EMBEDDED SCRIPT

	function isValidEmailAddress(emailAddress) {
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		return pattern.test(emailAddress);
	}

	function evaluateRequirements() {
		var requiredObj = <?php echo file_get_contents('assets/json/requirements.json'); ?>;
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
		var designation = document.getElementById("designation").value;
		var phone = document.getElementById("phone").value;
		var office_address = document.getElementById("office_address").value;
		var email = document.getElementById("email").value;
		var overview = document.getElementById("overview").value;
		var degree1 = document.getElementById("degree1").value;
		var degree1_year = parseInt(document.getElementById("degree1_year").value.replace(/[^\d]/g, ''), 10);
		var degree1_school = document.getElementById("degree1_school").value;
		var  degree2 = document.getElementById("degree2").value;
		var degree2_year = parseInt(document.getElementById("degree2_year").value.replace(/[^\d]/g, ''), 10);
		var degree2_school = document.getElementById("degree2_school").value;
		var degree3 = document.getElementById("degree3").value;
		var degree3_year = parseInt(document.getElementById("degree3_year").value.replace(/[^\d]/g, ''), 10);
		var degree3_school = document.getElementById("degree3_school").value;
		var cur_year = (new Date()).getFullYear();
		var FileUploadPath = document.getElementById("image").value;
		var Extension;
		var issue_found = [];
		var requiredObj = <?php echo file_get_contents('assets/json/requirements.json'); ?>;
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
		
		// * checking for a valid designation
		// note: should this be mandatory?
		if(designation.replace(/\s{2,}/g, ' ').split(" ").length>50  || requiredFields.indexOf('designation') !== -1 && designation == '') {
			issue_found.push("designation");
			alerts.push("Please enter a valid designation up to 50 words.");
		}
		
		// checking for a valid phone number
		var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
		if(phoneNumberPattern.test(phone) == false || requiredFields.indexOf('phone') !== -1 && phone == '') {
			issue_found.push("phone");
			alerts.push('Please enter a valid 10 digit phone number.');
		}
		
		// checking for valid office address
		if(office_address.length > 140 || requiredFields.indexOf('office_address') !== -1 && office_address == '') {
			issue_found.push("office_address");
        	alerts.push("Please enter a valid office address up to 140 characters.");
		}
		  
		// * checking for valid e-mail address
		if(!isValidEmailAddress(email) || requiredFields.indexOf('email') !== -1 && email == '') {
			issue_found.push("email");
			alerts.push("Please enter a valid e-mail. Example: name@marshall.edu.");
		}
		
		// checking validity of degree 1
		//if (degree1.length > 0) {
			// checking for valid degree1 name
			if(degree1.length > 100  || requiredFields.indexOf('degree1') !== -1 && degree1 == '') {
				issue_found.push("degree1");
				alerts.push("Please enter a valid degree 1 name up to 100 characters.");
			}
			
			// checking for valid degree1 school
			if(degree1_school.length > 100  || requiredFields.indexOf('degree1_school') !== -1 && degree1_school == '') {
				issue_found.push("degree1_school");
				alerts.push("Please enter a valid degree 1 school name up to 100 characters.");
			}
			  
			// checking for valid degree1 year
			if(degree1_year < 1900 ||degree1_year > (new Date().getFullYear() + 5) || requiredFields.indexOf('degree1_year') !== -1 && degree1_year == 0) {
				issue_found.push("degree1_year");
				alerts.push("Please enter a valid degree 1 year.");
			}
		//}
		
		// checking validity of degree 2
		//if (degree2.length > 0) {
			// checking for valid degree2 name
			if(degree2.length > 100  || requiredFields.indexOf('degree2') !== -1 &&degree2 == '') {
				issue_found.push("degree2");
				alerts.push("Please enter a valid degree 2 name up to 100 characters.");
			}
			
			// checking for valid degree2 school
			if(degree2_school.length > 100  || requiredFields.indexOf('degree2_school') !== -1 &&degree2_school == '') {
				issue_found.push("degree2_school");
				alerts.push("Please enter a valid degree 2 school name up to 100 characters.");
			}
			
			// checking for valid degree2 year
			if(degree2_year < 1900 ||degree2_year > (new Date().getFullYear() + 5) || requiredFields.indexOf('degree2_year') !== -1 && degree2_year == 0) {
				issue_found.push("degree2_year");
				alerts.push("Please enter a valid degree 2 year.");
			}
		//}
		
		// checking validity of degree 3
		//if (degree3.length > 0) {
			// checking for valid degree3 name
			if(degree3.length > 100  || requiredFields.indexOf('degree3') !== -1 && degree3.length < 1){
				issue_found.push("degree3");
				alerts.push("Please enter a valid degree 3 name up to 100 characters.");
			}
			  
			// checking for valid degree3 school
			if(degree3_school.length > 100  || (requiredFields.indexOf('degree3_school') !== -1 && degree3_school.length < 1)){
				issue_found.push("degree3_school");
				alerts.push("Please enter a valid degree 3 school name up to 100 characters.");
			}
			
			// checking for valid degree3 year
			if(degree3_year < 1900 ||degree3_year > (new Date().getFullYear() + 5)|| (requiredFields.indexOf('degree3_year') !== -1 && degree3_year.length < 1)) {
				issue_found.push("degree3_year");
				alerts.push("Please enter a valid degree 3 year.");
			}
		//}
		  
		if(overview.replace(/\s{2,}/g, ' ').split(" ").length > 500 || requiredFields.indexOf('overview') !== -1 && overview == ''){
			issue_found.push("overview");
			alerts.push("Please enter a valid overview up to 500 words.");
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
<?php
} else {
	header('Location:index.php');
exit();
}

?>
