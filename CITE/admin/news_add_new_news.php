<?php
session_start();
require '../includes/db_connection.php';
require './includes/ImageUpload.php';
require('header.php');
if($_SESSION["id"] != '') {

  if(isset($_POST['newsTitle'])) {
   
	$facultyId = $_SESSION["id"];
 
	$status = "";
	if($_SESSION['name']=='yoow@marshall.edu'){
		$status = "ACCEPTED";
	}else{
		$status = "PENDING";
	}
	$title = $conn->escape_string(htmlentities($_POST['newsTitle']));
	$description = $conn->escape_string(htmlentities($_POST['newsDes']));
	$professorName = $conn->escape_string($_SESSION["profile_name"]);
	$dateAndTime = date("d-m-Y");
	$timeOfNews = time();
	$temp_name = "";
	$target_path = "";
	$sql = "";
	$division_id = intval($_POST['division']);
   
	if(isset($_FILES["image"]["name"] )){
		$file_name=$_FILES["image"]["name"];
		$temp_name=$_FILES["image"]["tmp_name"];
		$imgtype=$_FILES["image"]["type"];
	
		
		$ext= ImageUpload::GetImageExtension($imgtype);
		$imagename=date("d-m-Y")."-".time().$ext;
		$target = "../images/".$imagename;
		$target_path = (string) $target;
	}
	
	$upload_str = move_uploaded_file($temp_name, $target_path)
		? $target_path : 'NULL';
	$sql = "INSERT INTO `news`
		(`title`, `status`, `dateAndTime`, `professorName`,
			`imageName`, `description`, `facultyId`, `timeOfNews`, `priority`, `division_id`)
		VALUES ('$title', '$status', '$dateAndTime','$professorName',
			$upload_str,  '$description', '$facultyId', '$timeOfNews', 0, $division_id)";

    $msg = $conn->query($sql) ? "New record created successfully" : "Error : " . $conn->error;
	header('Location:news_your_news.php?msg='.$msg);
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
					<a class="navbar-brand">PROFILE MANAGEMENT: NEWS</a>
					</div>
                           
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li> 
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
        </nav>
        <div class="content">
            <div class="container-fluid">
        <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ADD/ REQUEST NEWS</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?></p>
                            </div>
                            <div class="content">
                                <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                    <div class="row">

										<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title </label>
                                                <input type="text" id="newsTitle" name="newsTitle" class="form-control">
                                            </div>
                                        </div>
										
										<div class="col-md-4" style="display: none;">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Professor Name </label>
                                                <input type="text" id="professorName" name="professorName" class="form-control" value = "<?php echo $_SESSION["profile_name"]; ?> ">
                                            </div>
                                        </div>
										
										<div class="col-md-4">
                                          <div class="form-group">
										  <label>Image For News</label>
										<input type="file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg,image/jpg,image/bmp" >
										  </div>
                                          </div>
										  
										  
										
										<div style="clear:both;"></div>

                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" name="newsDes" id="newsDes" class="form-control" placeholder="Enter description upto a limit of 500 words." ></textarea>
                                            </div>
                                        </div>
										
										<div class="form-group col-md-4">
											<label for="division">Division:</label>
											<select class="form-control" id="division"  name="division" onChange="display(this.value)" required>
											<?php
												$sql = 'SELECT * FROM faculty_member where id = "'.$_SESSION["id"] .'" ';
												$result = $conn->query($sql);
												$row = $result->fetch_assoc();
												$curr_division = $row['division'];
												$sql = 'SELECT `id` FROM `division` WHERE `divisionName`="' . $conn->real_escape_string($curr_division) . '"';
												$result = $conn->query($sql);
												$curr_division_id = $row['id'];
											?>
																					 <option value="<?php echo $curr_division_id; ?>" ><?php echo $curr_division; ?></option>

											<?php
												$result2 = $conn->query("SELECT * FROM `division`"); ?>
												<option value="" >-- Select Division --</option>
												<?php while($row2 = $result2->fetch_assoc())   
												{
												?>
												
												<option value="<?php echo $row2['divisionId']; ?>"><?php echo $row2['divisionName']; ?></option>
												<?php
												}
												?>
											</select>
										</div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add News</button>
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
        <footer class="footer">

        </footer>



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


	  function validateForm(){
	  if($("#title").val().replace(/\s{2,}/g, ' ').split(" ").length>100 || $("#title").val() == ''){
			  alert("Please enter valid sponsor, up to 50 words");
			  return false;
		  }else if($("#professorName").val().replace(/\s{2,}/g, ' ').split(" ").professorName>50 ||  $("#professorName").val() == ''){
			  alert("Please enter valid fund amount up to 50 words");
			  return false;
		  }else if($("#news_des").val().replace(/\s{2,}/g, ' ').split(" ").length>500)  {
			  alert("Please enter valid news description up to 500 words");
			  return false;
		  }
	
	
		if((document.getElementById("image").value) == "") 
	   {
			alert("Please select an image for the news.");
			return false;
	   }else{
		   
		   var FileUploadPath = document.getElementById("image").value;
		var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
		
		  if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {
            }
			else{
							alert("Please select an image file having an extension like .bmp/.jpg/.jpeg/.png. ");
							return false;
			}
	   }
	  }
    </script>

 </html>
<?php
} else {
	header('Location:index.php');
exit();
}
?>
