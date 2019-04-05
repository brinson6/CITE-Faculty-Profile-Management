<?php
session_start();
 require '../includes/db_connection.php';
if(isset($_POST['email'])):
  $sql = 'SELECT * FROM faculty_member where email = "'.$_POST['email'].'"';
 $result = $conn->query($sql);
   if ($result->num_rows > 0 ) {
     while($row = $result->fetch_assoc()) {
                  $recover = $row['password'];
				  $password = base64_decode($recover);
				  $name = $row['name'];
				  $l_name = $row['l_name'];
     //$data = "your password is: " . base64_decode($recover);

// In case any of our lines are larger than 70 characters, we should use wordwrap()
//$message = wordwrap($message, 70, "\r\n");

// Send
$email = $_POST['email'];

$data = "
				<html>
				<head>
				<title>
				Welcome to Faculty Profile Management System
				</title>
				</head>
				<body>
				<p>Dear ".$name." ".$l_name.", </p>
				<p>Your password to access Faculty Profile Management System (FPMS) is ".$password."</p>
				<p>Please click <a href = 'http://marshallcite.org/CITE/admin'>here</a> to login to FPMS with your email address and password provided and edit your profile. Please 
					contact Dr. Yoo (yoow@marshall.edu) if you still have any problem.</p>
				<p>Thanks,
				<br>Admin of FPMS</p>
				</body>
				</html>
				";
					
				
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers = "Content-Transfer-Encoding: base64\r\n\r\n";
					$data = wordwrap($data, 70, "\r\n");


mail($email, 'Password Recovery - Faculty Profile Management System', $data, $headers);

   }
$message = "Password sent to your registered email. Please click the 'Login' and enter your username and password.";
}
else {
    $message = "Email not Found";
}
mysqli_close($conn);
endif;
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


    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
<div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                  <div class="row">
                                        <?php if(isset($message)) :
 echo $message;
endif;?>
								   <form method="post">
								   <h3><b>
										FACULTY PROFILE MANAGEMENT SYSTEM (FPMS)
										</b></h3>
										<h7>
										<i>Developed by The Division of Computer Science, CITE, Marshall University.</i><br><br></h7>
										<h5>Welcome to the Faculty Profile Management System!<br><br>
										You can add, edit your profile from this site.
										To access the system please enter your email and password provided by clicking on the link, Login. 
										<br><br>If you have <b>forgotten the password</b>, please enter your email and click the "Submit" button.
										<br><br>You will receive an email about your password from the FPMS after you sumbit your email-id.
										</h5>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input required type="text" class="form-control" name="email" placeholder="abc@marshall.edu"  >
                                            </div>
                                        </div>

                                     <div class="col-md-4">
									     <div class="form-group">
                                                <label for="exampleInputEmail1"> </label>
									<button type="submit" style="margin-top:27px" class="btn btn-info btn-fill pull-left">Submit</button>
                                            </div>
                                    </div>
									<div class="clearfix"></div>
									<p>
									
									&nbsp;&nbsp;<a href = "../admin/">Login</a></p>
                  </form>
							
				  </div>
                    </div>
                </div>
  </div>
            </div>

<?php
require 'footer.php';
?>
