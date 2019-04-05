
 <?php
 
session_start();
error_reporting(E_ERROR | E_PARSE);
 $_SESSION["admin_status"] = "0";
 $_SESSION["prev_status"] = "1";

 echo $profile_name;
require '../includes/db_connection.php';
require('header.php');

 function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       
	   switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
		   case 'image/jpg': return '.jpg';
           case 'image/jpeg': return '.jpeg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

if($_GET["id"] != ''){
	$image_status = TRUE;
 if(isset($_POST['name']) && !($_POST['name'] == 'yoow@marshall.edu')) {
 
	 if(isset($_FILES["image"]["name"] )){
		$file_name=$_FILES["image"]["name"];
		$temp_name=$_FILES["image"]["tmp_name"];
		$imgtype=$_FILES["image"]["type"];
	
		/*
		$allowed_types = array ( 'image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/bmp' );
		$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
		$detected_type = finfo_file( $fileInfo, $_FILES["image"]["tmp_name"] );
		if ( !in_array($detected_type, $allowed_types) ) {
		$image_status = FALSE;
		}
		finfo_close( $fileInfo );
		*/
		
		$ext= GetImageExtension($imgtype);
		$imagename=date("d-m-Y")."-".time().$ext;
		$target = "../images/".$imagename;
		//$target = "http:marshallcite.org/fpmt/images/".$imagename;
		$target_path = (string) $target;
		
	 }
		
		$id = $_SESSION["id"];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$l_name = $_POST['l_name'];
		$division = $_POST['division'];
		$phone = $_POST['phone'];
		$office_address = $_POST['office_address'];
		$designation = $_POST['designation'];
		$overview = htmlspecialchars($_POST['overview']);
		$degree1 = $_POST['degree1Name'];
		$degree1_year = $_POST['degree1Year'];
		$degree1_school = $_POST['degree1School'];
		$degree2 = $_POST['degree2Name'];
		$degree2_year = $_POST['degree2Year'];
		$degree2_school = $_POST['degree2School'];
		$degree3 = $_POST['degree3Name'];
		$degree3_year = $_POST['degree3Year'];
		$degree3_school = $_POST['degree3School'];
		//$status = $_POST['status'];
		
		/*
		echo $id;
		echo $email;
		echo $name ;
		echo $l_name;
		//$division = $_POST['division'];
		echo $division;
		echo $phone ;
		echo $office_address;
		echo $designation;
		echo $overview ;
		echo $degree1;
		echo $degree1_year;
		echo $degree1_school;
		echo $degree2;
		echo $degree2_year;
		echo $degree2_school;
		echo $degree3;
		echo $degree3_year;
		echo $degree3_school;
		*/
   
   
		
		if($image_status === TRUE && move_uploaded_file($temp_name, $target_path)) {
		   
		  
		  $sql2 = "update faculty_member 
		  set email = '$email', 
		  name = '$name', 
		  l_name = '$l_name', 
		  division = '$division',
		  image = '$target_path',		  
		  phone = '$phone', 
		  office_address = '$office_address', 
		  designation = '$designation', 
		  overview = '$overview', 
		  degree1 = '$degree1', 
		  degree1_school = '$degree1_school', 
		  degree1_year = '$degree1_year', 
		  degree2 = '$degree2', 
		  degree2_school = '$degree2_school', 
		  degree2_year = $degree2_year, 
		  degree3 = '$degree3', 
		  degree3_school = '$degree3_school', 
		  degree3_year  = '$degree3_year' 
		  where id = '$id'";  
		 
		 // $sql2 = "UPDATE `faculty_member  SET name = '$name', l_name = '$l_name', degree1 = '$_POST['degree1Name'].'",`degree1_year` ="'.$_POST['degree1Year'].'",`degree1_school` ="'.$_POST['degree1School'].'",`degree2` ="'.$_POST['degree2Name'].'",`degree2_year` ="'.$_POST['degree2Year'].'",`degree2_school` ="'.$_POST['degree2School'].'",`degree3` ="'.$_POST['degree3Name'].'",`degree3_year` ="'.$_POST['degree3Year'].'",`degree3_school` ="'.$_POST['degree3School'].'",`designation` ="'.$_POST['designation'].'",`email` = "'.$_POST['email'].'" ,`image` = "'.$target_path.'" ,`phone` = "'.$_POST['phone'].'",`office_address` = "'.$_POST['office_address'].'",`overview` ="'.htmlspecialchars($_POST['overview']).'" WHERE id ="'.$_SESSION["id"].'"';
		
		  
		}else{
			
			  //$sql2 = 'UPDATE `faculty_member`  SET `name` = "'.$_POST['name'].'",`l_name` = "'.$_POST['l_name'].'",`email` = "'.$_POST['email'].'" ,`phone` = "'.$_POST['phone'].'",`office_address` = "'.$_POST['office_address'].'" ,`designation` ="'.$_POST['designation'].'",`overview` ="'.htmlspecialchars($_POST['overview']).'",`degree1` ="'.$_POST['degree1Name'].'",`degree1_year` ="'.$_POST['degree1Year'].'",`degree1_school` ="'.$_POST['degree1School'].'",`degree2` ="'.$_POST['degree2Name'].'",`degree2_year` ="'.$_POST['degree2Year'].'",`degree2_school` ="'.$_POST['degree2School'].'",`degree3` ="'.$_POST['degree3Name'].'",`degree3_year` ="'.$_POST['degree3Year'].'",`degree3_school` ="'.$_POST['degree3School'].'" WHERE id ="'.$_SESSION["id"].'"';
		
			$sql2 = "update faculty_member 
			set email = '$email', 
			name = '$name', 
			l_name = '$l_name', 
			division = '$division', 
			phone = '$phone', 
			office_address = '$office_address', 
			designation = '$designation', 
			overview = '$overview', 
			degree1 = '$degree1', 
			degree1_school = '$degree1_school', 
			degree1_year = '$degree1_year', 
			degree2 = '$degree2', 
			degree2_school = '$degree2_school', 
			degree2_year = $degree2_year, 
			degree3 = '$degree3', 
			degree3_school = '$degree3_school', 
			degree3_year  = '$degree3_year' 
			where id = '$id'";
			
		 }
	 
	 
	 
	/*if(isset($_FILES["image"]["name"]) && $image_status === FALSE){
		
		echo '<script language="JavaScript"> alert("Please select an image file having an extension like .bmp/.jpg/.jpeg/.png. "); </script>';
		//$msg =  "Error updating record: " . $conn->error;
	}*/
	
	if ($conn->query($sql2) === TRUE) {
		//$msg = "Record Updated";
		//echo '<script language="JavaScript"> alert("Record Updated "); </script>';
	}else{
		echo '<script language="JavaScript"> alert("Record Not Updated "); </script>';
	}
 }
 //echo $msg;exit;
 $sql = 'SELECT * FROM faculty_member where id = "'.$_GET["id"] .'" ';
 $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $_SESSION["name"] = $row['email'];
  $_SESSION["id"] = $row['id'];

  

  
?>


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
                           <div class="header">
                               <h4 class="title">BASIC INFORMATION</h4>
               <p style="color:red"<?php if(isset($msg)) {
                 echo $msg;
               } ?>
                           </div>
                           <div class="content">
                               <form method="post" enctype="multipart/form-data" onsubmit="return validateForm();">

                                   <div class="row">

                                     <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>First NAME - MIDDLE NAME</label>
                                                 <input type="text" name="name" id="name" class="form-control" placeholder="First & Middle Name" value="<?php echo $row['name']?>">
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                                 <div class="form-group">
                                                     <label>LAST NAME</label>
                                                     <input type="text" name="l_name" id = "l_name" class="form-control" placeholder="Last  Name" value="<?php echo $row['l_name']?>">
                                                 </div>
                                             </div>
                                        
										
                                       <div class="col-md-4">
                                           <div class="form-group">
                                               <label>OFFICE PHONE</label>
                                               <input type="tel"  name="phone" id="phone" class="form-control" placeholder="10 Digits Phone Number" value="<?php echo $row['phone']?>">
                                           </div>
                                       </div>

									   <!--
                                       <div class="col-md-4">
                                                               <div class="form-group">
                                                                   <label>Division</label>
                                                                   <input type="text" name="division" id = "division" class="form-control" placeholder="division" value="<?php echo $row['division']?>">
                                                               </div>
                                                           </div>  -->

                                        <div class="col-md-4">
                                           <div class="form-group">
                                               <label>Office Number</label>
                                               <input type="text" name="office_address" id = "office_address" class="form-control" placeholder="EG. WAEC XXXX" value="<?php echo $row['office_address']?>">
                                           </div>
                                       </div>

                                       <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">OFFICE EMAIL </label>
                                                      <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['email']?>">
                                                  </div>
                                              </div>
											  
											   <div class="clearfix"></div>
											  <div class="header">
                                <h4 class="title">YOUR PICTURE</h4>
								
                            </div>
											 

                                     <div class="col-md-4">
                                          <div class="form-group">
                                              
<?php if( $row['image'] != '')
{

?>
<label>Your Current Picture</label>
<img src="<?php echo $row['image']?>" width="70px" height="70px">

<?php } ?>
<?php if( $row['image'] == '')
 {
	
 ?>
 <label>Your Current Picture</label>
 <img src="../images/default_image.png" width="70px" height="70px">

 <?php } ?> <br>
 
                                          </div>
                                      </div>
									  
									  <div class="col-md-4">
                                          <div class="form-group">
										  <label>Change Image</label>
  <input type="file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg,image/jpg,image/bmp" >
										  </div>
                                          </div>
									  
									  
									  
                                            </div>
											 <div class="clearfix"></div>
							  <div class="header">
                                <h4 class="title">EDUCATION</h4>
								
                            </div>
							 <div class="clearfix"></div>
                                            <div class="row">
  <p><b> Please enter your 3 Degrees in chronological order. </b></p> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Degree name </label>
                                                    <input type="text" name="degree1Name" id = "degree1Name" class="form-control" placeholder="Degree1name" value="<?php echo $row['degree1']?>">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>School Name</label>
                                                    <input type="text" name="degree1School" id = "degree1School" class="form-control" placeholder="Degree1 School" value="<?php echo $row['degree1_school']?>">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Graduation Year</label>
                                                    <input type="text" name="degree1Year" id="degree1Year" class="form-control" placeholder="Degree1 Year" value="<?php echo $row['degree1_year']?>">
                                                </div>
                                            </div>

                                            </div>
                                            <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <!--<label>Degree2 name </label>-->
                                                    <input type="text" name="degree2Name" id = "degree2Name" class="form-control" placeholder="Degree2 name" value="<?php echo $row['degree2']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <!-- <label>Degree2 School Name</label>-->
                                                    <input type="text" name="degree2School" id = "degree2School" class="form-control" placeholder="Degree2 School" value="<?php echo $row['degree2_school']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <!--<label>Degree2 Year</label>-->
                                                    <input type="text" name="degree2Year" id="degree2Year" class="form-control" placeholder="Degree2 Year" value="<?php echo $row['degree2_year']?>">
                                                </div>
                                            </div>

                                            </div>

                                              <div class="row">

                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <!--<label>Degree3 name </label>-->
                                                    <input type="text" name="degree3Name" id = "degree3Name" class="form-control" placeholder="Degree3 name" value="<?php echo $row['degree3']?>">
                                                </div> </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <!-- <label>Degree3 School Name</label>-->
                                                        <input type="text" name="degree3School" id = "degree3School" class="form-control" placeholder="Degree3 School" value="<?php echo $row['degree3_school']?>">
                                                    </div>
                                                </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                  <!--  <label>Degree3 Year</label>-->
                                                    <input type="text" name="degree3Year" id="degree3Year" class="form-control" placeholder="Degree3 Year" value="<?php echo $row['degree3_year']?>">
                                                </div>
                                            </div>
											</div>
											<div class="header">
                                <h4 class="title">PROGRAM INFORMATION</h4>
								
                            </div>
											
												<div class="form-group col-md-4">
									  <label for="division">Division:</label>
									  <select class="form-control" id="division"  name="division" onChange="display(this.value)" required>
										 <option value="<?php echo $row['division']?>" ><?php echo $row['division']?></option>
										<?php
												$sql2 = "SELECT * from division;";
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
                                                         <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation / Title" value="<?php echo $row['designation']?>">
                                                     </div>
                                                 </div>
											
											
											
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>overview</label>
                                                    <textarea rows="5" name="overview" id = "overview" class="form-control" placeholder="Enter Description" ><?php echo $row['overview']?></textarea>
                                                </div>
                                            </div>


                                   <button type="submit" class="btn btn-info btn-fill pull-right" >Submit</button>
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
<script type="text/javascript">
if (location.href.indexOf('reload')==-1)
{
   location.href=location.href+'?reload';
}
</script>

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
	   
	  var name = document.getElementById("name").value;
	  var l_name = document.getElementById("l_name").value;
	  var designation = document.getElementById("designation").value;
	  var phone = document.getElementById("phone").value;
	  var office_address = document.getElementById("office_address").value;
	  var email = document.getElementById("email").value;
	  var overview = document.getElementById("overview").value;
	  var degree1 = document.getElementById("degree1Name").value;
	  var degree1_year = document.getElementById("degree1Year").value;
	  var degree1_school = document.getElementById("degree1School").value;
	  var  degree2 = document.getElementById("degree2Name").value;
	  var degree2_year = document.getElementById("degree2Year").value;
	  var degree2_school = document.getElementById("degree2School").value;
	   var degree3 = document.getElementById("degree3Name").value;
	  var degree3_year = document.getElementById("degree3Year").value;
	  var degree3_school = document.getElementById("degree3School").value;
	   var cur_year = (new Date()).getFullYear();
	   
	  if((document.getElementById("image").value) == "") 
	   {
		  
	   }else{
		   
		   var FileUploadPath = document.getElementById("image").value;
		var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
			
		  if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {
            }
			else{
							alert("Please select an image file having an extension like .bmp/.jpg/.jpeg/.png. ");
			}
	   }
	 
	  
		 if(name.replace(/\s{2,}/g, ' ').split(" ").length>50 || name == ""){
			  alert("Please Enter a Valid User Name or First Name up to 50 words.");
			  return false;
		  }
		  
		  if(l_name.replace(/\s{2,}/g, ' ').split(" ").length>50 || l_name == ''){
			  alert("Please Enter a Valid Last Name up to 50 Words.");
			  return false;
		  }

		
		  
		  if(designation.replace(/\s{2,}/g, ' ').split(" ").length>50  || designation == ''){
			  alert("Please Enter a Valid Designation up to 50 Words.");
			  return false;
		}
		  
		 if(phone.replace(/\s{2,}/g, ' ').split(" ").length>15 || phone == '') {
 			  alert("Please Enter a Valid Phone Number.");
			  return false;
			}else if(phone != ''){
			var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
			if(phoneNumberPattern.test(phone) == false){
				alert('Please enter a 10 digit phone number.');
				return false;
			}
			}
			
			if(office_address.replace(/\s{2,}/g, ' ').split(" ").length>50  || office_address == ''){
        alert("Please Enter a Valid Office Address.");
        return false;
		  }
		  
		  if( !isValidEmailAddress( email ) ) {
			 alert("Please Enter a Valid Email. Example: name@marshall.edu.");
			  return false;
		  }
		    
		  if(degree1.replace(/\s{2,}/g, ' ').split(" ").length>50  || degree1 == ''){
			  alert("Please Enter a Valid Degree1 Name up to 50 Words.");
			  return false;
		  }
		  
		   if(degree1_school.replace(/\s{2,}/g, ' ').split(" ").length>50  || degree1_school == ''){
			  alert("Please Enter a Valid Degree1 School Name up to 50 Words.");
			  return false;
		  }
		  
		 
		  
		  if( degree1_year.replace(/\s{2,}/g, ' ').split(" ").length>50  || degree1_year == '' || degree1_year<1000 || degree1_year>cur_year || !degree1_year.match("^[0-9]*$")){
			  alert("Please Enter a Valid Degree1 Year.");
			  return false;
		  }
		  
		   if(degree2.replace(/\s{2,}/g, ' ').split(" ").length>50  || degree2 == ''){
			  alert("Please Enter a Valid Degree2 Name up to 50 Words.");
			  return false;
		  }
		  
		   if(degree2_school.replace(/\s{2,}/g, ' ').split(" ").length>50  || degree2_school == ''){
			  alert("Please Enter a Valid Degree2 School Name up to 50 Words.");
			  return false;
		  }
		  
		  if( degree2_year.replace(/\s{2,}/g, ' ').split(" ").length>50  || degree2_year == '' || degree2_year<1000 || degree2_year>cur_year || !degree2_year.match("^[0-9]*$")){
			  alert("Please Enter a Valid Degree2 Year.");
			  return false;
		  }
		  
		 if(degree3.replace(/\s{2,}/g, ' ').split(" ").length>50  || degree3 == ''){
			  alert("Please Enter a Valid Degree3 Name up to 50 Words.");
			  return false;
		  }
		  
		   if(degree3_school.replace(/\s{2,}/g, ' ').split(" ").length>50  || degree3_school == ''){
			  alert("Please Enter a Valid Degree3 School Name up to 50 Words.");
			  return false;
		  }
		  
		  if( degree3_year.replace(/\s{2,}/g, ' ').split(" ").length>50  || degree3_year == '' || degree3_year<1000 || degree3_year>cur_year || !degree3_year.match("^[0-9]*$")){
			  alert("Please Enter a Valid Degree3 Year.");
			  return false;
		  }
		  
		 if(overview.replace(/\s{2,}/g, ' ').split(" ").length>500  || overview == ''){
			  alert("Please Enter a Valid Overview. Max Length Allowed up to 500 Words.");
			  return false;
		  } 
	  }


    </script>



<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
<?php
} else {
	header('Location:index.php');
exit();
}

?>
