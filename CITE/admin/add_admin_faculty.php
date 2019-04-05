 <?php
session_start();
require '../includes/db_connection.php';
require('header.php');


 if(isset($_POST['name'])) {


	  //$sql = 'Insert INTO `faculty_member`  SET `name` = "'.$_POST['name'].'" ,`l_name` = "'.$_POST['l_name'].'" ,`password` = "'.base64_encode($_POST['password']).'" ,`email` = "'.$_POST['email'].'",`status` ="1"' ;
    
	$name = $_POST['name'];
	$l_name = $_POST['l_name'];
	$password = base64_encode($_POST['password']);
	$email = $_POST['email'];
	$status = "1";
	$division = $_POST['division'];;
	
	$sql = "insert into  faculty_member"."(name, l_name, password, email, status, division)"."values('$name', '$l_name', '$password', '$email', '$status', '$division' )";
	// made some changes to compare email & return error accordingly

    if(($conn->query($sql) === TRUE) && $conn->affected_rows) {
		
		$msg = "Faculty Member, Added";
    header('Location:faculty_members.php?msg='.$msg);



  $sql = 'SELECT * FROM faculty_member where email = "'.$_POST['email'].'"';

 $result = $conn->query($sql);
   if ($result->num_rows > 0 ) {
		
		 while($row = $result->fetch_assoc()) {
		//$recover = $row['password'];
		//$email_password = $base64_decode($recover);
		//$email_name = $row['name'];
		//$email_lname = $row['l_name'];
		$email_id = $row['id'];
		//$email_email = $row['email'];
		
		//$message = "Your Email ID is: " . $_POST['email'] ." and your Password is: " . base64_decode($recover).". Please click the following link to login to Marshall CITE and enter the information for your profile, http://marshallcite.org/CITE/";

	
		/*data = "
				<html>
				<head>
				<title>
				Welcome to Faculty Profile Management System
				</title>
				</head>
				<body>
				<p>Hello ".$_POST['name']." ".$_POST['l_name'].", </p>
				<p>You can now access the Faculty Profile Management System in CITE at Marshall University with following password:</p>
				<p>Your Email: ".$_POST['email']."
				<br>Your Password: ".$_POST['password']."</p>
				<p>Please click <a href = 'http://marshallcite.org/CITE/admin'>here</a> to enter your profile and you can review your profile entered at <a href = 'http://marshallcite.org/cite/faculty.php?id=".$email_id."'>here</a>.
				<p>Dr. Wook-Sung Yoo</p>
				</body>
				</html>
				";*/
				
				$data = "
				<html>
				<head>
				<title>
				Welcome to Faculty Profile Management System
				</title>
				</head>
				<body>
				<p>Hello ".$_POST['name']." ".$_POST['l_name'].", </p>
				<p>Welcome to Faculty Profile Management System in CITE at Marshall University.</p>
				<p>We just created credentials for you to access Faculty Profile Management System as below:<br>
				Your Email: ".$_POST['email']."<br>
				Your Password: ".$_POST['password']."</p>
				<p>Please click <a href = 'http://marshallcite.org/CITE/admin'>here</a> and enter your email and password provided above and click on 'Login' button to access your profile page.
					In profile page, you can click four links in the left hand side frame and fill out the forms: 1. About Me, 2. Research, 3. Services, 4. Teaching.
				</p>
				
				<p>You can save your work and come back to the site multiple times to complete your profile. If you would like to review your profile in public view, please click <a href = 'http://marshallcite.org/cite/faculty.php?id=".$email_id."'>here</a> at any time. 
				Please view Dr. Yoo profile as a sample by clicking <a href = 'http://marshallcite.org/cite/faculty.php?id=1'>here</a>.</p>
			
				<p>If you have any question or encounter any problem, please contact Dr. Yoo (yoow@marshall.edu).</p>
				<p>Thanks,
				<br>Admin of FPMS</p>
				</body>
				</html>
				";
					
				
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers = "Content-Transfer-Encoding: base64\r\n\r\n";
					
		$data = wordwrap($data, 70, "\r\n");
		//$message = chunk_split(base64_encode($message)); 
		// Send*/
		mail($row['email'], 'Welcome to Marshall Faculty Profile Management System', $data, $headers);

   }
		$message = "Faculty Added Successfully.";
		header('Location:faculty_members.php?msg='.$msg);
}
	} else {
		
		$msg =  "Error: Member Already Exists. Try another Email ID ";
		header('Location:faculty_members.php?msg='.$msg);
	 }
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
                   <a class="navbar-brand">PROFILE MANAGEMENT: FACULTY MEMBERS</a>
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
                                <h4 class="title">ADD FACULTY MEMBER</h4>
								<p style="color:red"<?php if(isset($msg)) {
									echo $msg;
								}?>
                            </div>
                            <div class="content">
                                <form method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
                                    <div class="row">

								
									
									
									
                                      <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email </label>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="">
                                            </div>
                                        </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name - Middle Name</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="First Name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="l_name" id="l_name" class="form-control" placeholder="Last Name" value="">
                                                </div>
                                        </div>
                                  
								
								<div class="form-group col-md-4">
									  <label for="division">Division:</label>
									  <select class="form-control" id="division" name = "division" onChange="display(this.value)" required>
										
										<?php
												$sql = "SELECT * from division;";
												$result = $conn->query($sql); ?>
												<option value="" >-- Select Division --</option>
												<?php while($row = $result->fetch_assoc())   
												{
												?>
												
												<option value="<?php echo $row['divisionName']; ?>"><?php echo $row['divisionName']; ?></option>
												<?php
												}
												?>
												</select>
									</div>
									
									
								
								
							
								
								<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="password" value="">
                                            </div>
                                    </div>
									
									
		
									<div class="clearfix"></div>
                                    <button type="submit"  class="btn btn-info btn-fill pull-right" >Add Profile</button>
                                    <br><br><br>
									<div class="clearfix"></div>
									<a href="divisions.php">Manage Divisions</a>
									
									
									
                                </form>
                    </div>
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

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-46172202-1', 'auto');
      ga('send', 'pageview');

	function isValidEmailAddress(emailAddress) {
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		return pattern.test(emailAddress);
	}
	  function validateForm(){

		  if( !isValidEmailAddress( $("#email").val() ) ) {
			 alert("Please Enter A Valid Email.");
			  return false;
		  }else if( $("#password").val() == '' )  {
			 alert("Please Enter A Valid Password.");
			  return false;
		  }else if($("#name").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#name").val() == ''){
				  alert("Please Enter A Valid Name up to 50 words.");
			  return false;
		  }

	  }

    </script>
 </html>
