 <?php
session_start();
require '../includes/db_connection.php';
require('header.php');
 function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

 if(isset($_POST['name'])) {


	 if(isset($_FILES["uploadedimage"]["name"] )){

    $file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "../images/".$imagename;

if(move_uploaded_file($temp_name, $target_path)) {
	  $sql = 'Insert INTO `faculty_member`  SET `name` = "'.$_POST['name'].'",`degree1` ="'.$_POST['Degree1name'].'",`degree1_year` ="'.$_POST['Degree1Year'].'",`degree1_title` ="'.$_POST['Degree1Title'].'",`degree1_des` ="'.$_POST['Degree1TitleDescription'].'",`degree2` ="'.$_POST['Degree2name'].'",`degree2_year` ="'.$_POST['Degree2Year'].'",`degree2_title` ="'.$_POST['Degree2Title'].'",`degree2_des` ="'.$_POST['Degree2TitleDescription'].'",`degree3` ="'.$_POST['Degree3'].'",`degree3_year` ="'.$_POST['Degree3Year'].'",`degree3_des` ="'.$_POST['degree3_des'].'",`degree3_title` ="'.$_POST['degree3_title'].'",`division` ="'.$_POST['division'].'",`email` = "'.$_POST['email'].'" ,`password` = "'.password_hash($_POST['password'], PASSWORD_BCRYPT).'" ,`image` = "'.$target_path.'" ,`designation` ="'.$_POST['designation'].'" ,`phone` = "'.$_POST['phone'].'",`office_address` = "'.$_POST['office_address'].'",`overview` = "'.$_POST['overview'].'" ';

	   }
	  else {
			   $sql = 'Insert INTO `faculty_member`  SET `name` = "'.$_POST['name'].'",`degree1` ="'.$_POST['Degree1name'].'",`degree1_year` ="'.$_POST['Degree1Year'].'",`degree1_title` ="'.$_POST['Degree1Title'].'",`degree1_des` ="'.$_POST['Degree1TitleDescription'].'",`degree2` ="'.$_POST['Degree2name'].'",`degree2_year` ="'.$_POST['Degree2Year'].'",`degree2_title` ="'.$_POST['Degree2Title'].'",`degree2_des` ="'.$_POST['Degree2TitleDescription'].'",`degree3` ="'.$_POST['Degree3'].'",`degree3_year` ="'.$_POST['Degree3Year'].'",`degree3_title` ="'.$_POST['degree3_title'].'",`degree3_des` ="'.$_POST['degree3_des'].'",`division` ="'.$_POST['division'].'",`email` = "'.$_POST['email'].'" ,`password` = "'.password_hash($_POST['password'], PASSWORD_BCRYPT).'" ,`designation` ="'.$_POST['designation'].'" ,`phone` = "'.$_POST['phone'].'",`office_address` = "'.$_POST['office_address'].'",`overview` = "'.$_POST['overview'].'" ';

		 }
	  }
	if ($conn->query($sql) === TRUE) {
		$msg = "Record Inserted";
	} else {
		$msg =  "Error updating record: " . $conn->error;
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
                    <a class="navbar-brand" href="#">Profile</a>


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
                                <h4 class="title">ADD Profile</h4>
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
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="">
                                            </div>
                                        </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Username" value="">
                                            </div>
                                        </div>
                                     <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="password" value="">
                                            </div>
                                        </div>

                                <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Image</label>
    <input type="file" name="uploadedimage" id="fileToUpload">
	<input type="hidden" name="image_name" ><br>

                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>phone</label>
                                                <input type="text" name="phone" id="phone" class="form-control" placeholder="phone" value="">
                                            </div>
                                        </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="office_address" id="office_address" class="form-control" placeholder="Home Address" value="">
                                            </div>
                                        </div>

										 <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" name="designation" id="designation" class="form-control" placeholder="designation" value="">
                                            </div>
                                        </div>

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Division</label>
                                                <input type="text" name="division" id="division" class="form-control" placeholder="division" value="">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree1 name </label>
                                                <input type="text" name="Degree1name" id="Degree1name" class="form-control" placeholder="Degree1name" value="">
                                            </div>
                                        </div>

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree1 Year</label>
                                                <input type="text" name="Degree1Year" id="Degree1Year" class="form-control" placeholder="Degree1 Year" value="">
                                            </div>
                                        </div><div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree1 Title</label>
                                                <input type="text" name="Degree1Title" id="Degree1Title" class="form-control" placeholder="Degree1 Title" value="">
                                            </div>
                                        </div><div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree1 Title Description</label>
                                                <input type="text" name="Degree1TitleDescription" id="Degree1TitleDescription" class="form-control" placeholder="Degree1 Title Description" value="">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree2 name </label>
                                                <input type="text" name="Degree2name" id="Degree2name" class="form-control" placeholder="Degree2 name" value="">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree2 Year</label>
                                                <input type="text" name="Degree2Year" id="Degree2Year" class="form-control" placeholder="Degree2 Year" value="">
                                            </div>
                                        </div><div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree2 Title</label>
                                                <input type="text" name="Degree2Title" id="Degree2Title" class="form-control" placeholder="Degree2 Title" value="">
                                            </div>
                                        </div><div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree2 Title Description</label>
                                                <input type="text" name="Degree2TitleDescription" id="Degree2TitleDescription" class="form-control" placeholder="Degree2TitleDescription" value="">
                                            </div>
                                        </div>
                       <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree3 name</label>
                                                <input type="text" name="Degree3" id="Degree3" class="form-control" placeholder="Degree3 name" value="">
                                            </div>
                                        </div>

                                        </div><div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree3 Year</label>
                                                <input type="text" name="Degree3Year" id="Degree3Year" class="form-control" placeholder="Degree3 Year" value="">
                                            </div>
                                        </div><div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree3 Title</label>
                                                <input type="text" name="degree3_title" id="degree3_title" class="form-control" placeholder="Degree3 Title" value="">
                                            </div>
                                        </div><div class="col-md-4">
                                            <div class="form-group">
                                                <label>Degree3 Title Description</label>
                                                <input type="text" name="degree3_des" id="degree3_des" class="form-control" placeholder="Degree3TitleDescription" value="">
                                            </div>
                                        </div>

                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Overview</label>
                                                <textarea rows="5" name="overview" id="overview" class="form-control" placeholder="Enter Description" ></textarea>
                                            </div>
                                        </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Profile</button>
                                    <div class="clearfix"></div>
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

    <script type="text/javascript">
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
			 alert("Please enter valid email");
			  return false;
		  }else if($("#name").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#name").val() == ''){
				  alert("Please enter valid name up to 50 words");
			  return false;
	  }else if(!$.isNumeric( $("#phone").val() ) || $("#phone").val().replace(/\s{2,}/g, ' ').split(" ").length>15){
      alert("Please enter numeric value for phone number");
      return false;
		  }else if($("#office_address").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#office_address").val() == ''){
			  alert("Please enter valid address up to 50 words");
			  return false;
		  }else if($("#designation").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#designation").val() == ''){
			  alert("Please enter valid designation up to 50 words");
			  return false;
		  }/* */else if($("#overview").val().replace(/\s{2,}/g, ' ').split(" ").length>500  || $("#overview").val() == ''){
			  alert("Please enter valid overview up to 500 words");
			  return false;
		  }/* */else if($("#division").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#division").val() == ''){
			  alert("Please enter valid division up to 50 words");
			  return false;
		  }else if($("#Degree1name").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree1name").val() == ''){
			  alert("Please enter valid Degree1name up to 50 words");
			  return false;
		  } else if($("#degree1year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree1year").val() == ''){
			  alert("Please enter valid degree1year up to 50 words");
			  return false;
		  }else if($("#degree1title").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree1title").val() == ''){
			  alert("Please enter valid degree1title up to 50 words");
			  return false;
		  }
		  else if($("#Degree1TitleDescription").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree1TitleDescription").val() == ''){
			  alert("Please enter valid Degree1TitleDescription up to 50 words");
			  return false;
		  }else if($("#Degree2name").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree2name").val() == ''){
			  alert("Please enter valid Degree2name up to 50 words");
			  return false;
		  }else if($("#Degree2Year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree2Year").val() == ''){
			  alert("Please enter valid Degree2Year up to 50 words");
			  return false;
		  }else if($("#Degree2Title").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree2Title").val() == ''){
			  alert("Please enter valid Degree2Title up to 50 words");
			  return false;
		  }else if($("#Degree2TitleDescription").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree2TitleDescription").val() == ''){
			  alert("Please enter valid Degree2TitleDescription up to 50 words");
			  return false;
		  }else if($("#degree3").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree3").val() == ''){
			  alert("Please enter valid degree3 up to 50 words");
			  return false;
		  }else if($("#Degree3Year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree3Year").val() == ''){
			  alert("Please enter valid Degree3Year up to 50 words");
			  return false;
		  }else if($("#degree3_title").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree3_title").val() == ''){
			  alert("Please enter valid degree3_title up to 50 words");
			  return false;
		  }else if($("#degree3_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree3_des").val() == ''){
			  alert("Please enter valid degree3_des up to 50 words");
			  return false;
		  }
	  }

    </script>



 </html>
