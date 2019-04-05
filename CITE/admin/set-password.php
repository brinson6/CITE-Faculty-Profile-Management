<?php
session_start();
require_once '../includes/db_connection.php';
require_once '../includes/user.php';
require_once '../includes/staff.php';
if (isset($_SESSION['can_set_pass']) && $_SESSION['can_set_pass'][0] > 0) {
	if (isset($_POST['password'])) {
		if ($_SESSION['can_set_pass'][1] == 'faculty')
			$s = new User($conn, $_SESSION['can_set_pass'][0]);
		else if ($_SESSION['can_set_pass'][1] == 'staff')
			$s = new Staff($conn, $_SESSION['can_set_pass'][0]);

		$s->set_password($_POST['password']);
		$s->save_record();

		header('Location: index.php');
		exit();
	}
} else {
	http_response_code(401);
	exit("Error: unauthorized - you do not have permission to change the password for this account. Please contact your department chair to have it changed.");
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
										<h4>Please set your password below:</h4>
										
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="****" id = "password" >
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="verify-password">Verify Password</label>
                                                <input type="password" class="form-control" name="verify-password" placeholder="****" id = "verify-password" >
                                            </div>
                                        </div>
										<div class="clearfix"></div>
                                     <div class="col-md-4"> <br>
									     <div class="form-group">
                                                <label for="exampleInputEmail1"></label>
									<button type="submit" class="btn btn-info btn-fill pull-left" >Submit</button>
                                            </div>
                                    </div>
									
									
                  </form>
				  
				  <script>
						
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