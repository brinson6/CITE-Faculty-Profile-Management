<?php
session_start();
require '../includes/db_connection.php';
if (isset($_POST['email'])) {
	$email = $conn->real_escape_string(strtolower($_POST['email']));

	$sql = "SELECT 'faculty' AS `user_table`, `email`, `id`, `name`, (`password` is null or `password` = '') as `password_null`, `password`, `status`, `permissions` FROM `faculty_member` WHERE `email`='$email' AND `status`='1' UNION SELECT 'staff' AS `user_table`, `email`, `id`, `name`,(`password` is null or `password` = '') as `password_null`,  `password`, `status`, `permissions` FROM `staff` WHERE `email`='$email' AND `status`='1' LIMIT 1" ;

	$result = $conn->query($sql);
		
	if ($result->num_rows > 0 ) {
		// output data of each row
		$row = $result->fetch_object();
		if ($row->password_null) {
			$_SESSION['can_set_pass'] = array($row->id, $row->user_table);
			header('Location: set-password.php');
			exit();
		}

		//echo "<script>window.alert('$_POST[password]" . PHP_EOL . "{$row->password}" . PHP_EOL . base64_encode($_POST['password']) . "');</script>";
		if (password_verify($_POST['password'], $row->password) || base64_encode($_POST['password']) == $row->password ) {
			$_SESSION["name"] = $row->email;
			$_SESSION["id"] = $row->id;
			$_SESSION['table'] = $row->user_table;
			$_SESSION['profile_name'] = $row->name . ' ' . $row->l_name;

			if(intval($row->permissions) > 1){
				$_SESSION["admin_status"] = "1";
				$_SESSION["prev_status"] = "1";
				header('Location: Admin_abtme.php'); // want to get rid of this page...
				exit();
			} else {
				$_SESSION["admin_status"] = "0";
				$_SESSION["prev_status"] = "0";
			}
			
			if ($row->user_table == 'faculty')
				header('Location: edit_profile.php'); // redirect to the edit profile page
			else {
				header('Location: edit_staff.php');
				echo 'a';
			}
			exit(); // stop execution due to redirect
		} else if ($row->status != '1') {
			$msg = "Account Deactivated...";
		} else {
			$msg = "Password Incorrect...";
		}	
	} else {
		  $msg = "The e-mail '" . htmlspecialchars($email) . "' is not registered with the system.";
	}
	mysqli_close($conn);
}
?>
<!doctype html>
<html lang="en">

 <head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />





    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
<div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                  <div class="row">
                                        <?php if(isset($msg)) :
 echo $msg;
endif;?>
								   <form method="post" onsubmit = "return formValidation()" >
                                        
										<h3><b>
										FACULTY PROFILE MANAGEMENT SYSTEM (FPMS)
										</b></h3>
										<h7>
										<i>Developed by The Division of Computer Science, CITE, Marshall University.</i><br><br></h7>
										<h5>Welcome to the Faculty Profile Management System!<br><br>
										You can add, edit your profile from this site.
										To access the system please enter your email and password provided and click on Login. 
										<br><br>If you have forgotten the password, please click the "Forgot Password" link to reset the password.</h5>
										
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" placeholder="abc@marshall.edu" id = "email" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="*****" id = "password">
                                            </div>
                                        </div>
										<div class="clearfix"></div>
                                     <div class="col-md-4"> <br>
									     <div class="form-group">
                                                <label for="exampleInputEmail1"></label>
									<button type="submit" class="btn btn-info btn-fill pull-left" >Login</button>
                                            </div>
                                    </div>
									
									
                  </form>
				  
				  <script>
				  function isValidEmailAddress(emailAddress) {
					var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
					return pattern.test(emailAddress);
				  }
							
					function formValidation(){									
						if( !isValidEmailAddress( $("#email").val() ) ) {
							alert("Please Enter A Valid Email. Example: abc@xyz.edu");
							return false
						}else if( $("#password").val() == '' )  {
							alert("Please Enter A Valid Password.");
							return false;
						}
				   }
				  </script>
							 <p> <a href="forget_password.php">
                              Forget Password
                            </a><b></p>

				              </div>
                    </div>
                </div>
              </div>
            </div>
<?php
require 'footer.php';
?>
