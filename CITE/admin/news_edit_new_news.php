  <?php
session_start();
require '../includes/db_connection.php';
require './includes/ImageUpload.php';
require('header.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	header('Location: index.php');
	exit();
}

$article_id = intval($_GET['id']);

if($_SESSION["id"] != '' && ) {
    if(isset($_POST['newsTitle'])) {   
		$temp_name = "";
		$target_path = "";
		$title = htmlentities($_POST['newsTitle']);
		$description = htmlentities($_POST['newsDes']);
		$professorName = $_POST['professorName'];
		$dateAndTime = date("d-m-Y");
		$timeOfNews = time();
	    $status = "";
		
	// TODO: Remove hardcoded authentication step
	if($_SESSION['name']=='yoow@marshall.edu'){
		$status = "ACCEPTED";
	} else {
		$status = "PENDING";
	}
	  
	$sql= "";
   
	if(isset($_FILES["image"]["name"] )){
		$file_name=$_FILES["image"]["name"];
		$temp_name=$_FILES["image"]["tmp_name"];
		$imgtype=$_FILES["image"]["type"];

		$ext = ImageUpload::GetImageExtension($imgtype);
		$imagename=(new DateTime())->format("d-m-Y").'-'.time().$ext;
		$target = "../images/".$imagename;
		$target_path = (string) $target; // note: what does this do?
	}

	$upload_str = move_uploaded_file($temp_name, $target_path)
		? "`imageName`='$target_path', " : '';

	$sql = "UPDATE `news` SET 
	`title` = '$title', 
	$upload_str 
	`status` = '$status',
	`dateAndTime` = '$dateAndTime', 
	`description` = '$description',
	`timeOfNews` = '$timeOfNews'
	WHERE `newsId` = '$article_id' ";

	
	   
	if ($conn->query($sql) === TRUE) {
		$msg = "Record updates successfully.";

		header('Location:news_your_news.php?msg='.$msg);
		exit();
	}
	$msg =  "Error : " . $conn->error;
}

$sql = "SELECT * FROM  `news` WHERE `newsId` = '$article_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<<div class="main-panel">
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
                                <h4 class="title">EDIT NEWS</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?></p>
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                                    <div class="row">

										<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title </label>
                                                <input type="text" id="newsTitle" name="newsTitle" class="form-control" value = "<?php echo $row['title'];?>" >
                                            </div>
                                        </div>
										
										<div class="col-md-4" style="display: none;">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Professor Name </label>
                                                <input type="text" id="professorName" name="professorName" class="form-control" value = "<?php echo $row["professorName"]; ?> ">
                                            </div>
                                        </div>


											 <div class="col-md-4">
                                          <div class="form-group">
										<?php if( $row['imageName'] != '')
{

?>
<label>Current Picture</label>
<img src="<?php echo $row['imageName']?>" width="70px" height="70px">

<?php } ?>
<?php if( $row['imageName'] == '')
 {
	
 ?>
 <label>Current Picture</label>
 <img src="../images/default_image.png" width="70px" height="70px">

 <?php } ?> </div></div>
 
                                       
									  
									  <div class="col-md-4">
                                          <div class="form-group">
										  <label>Change Image</label>
  <input type="file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg,image/jpg,image/bmp" >
										  </div>
                                          </div>
										  
										  
										
										<div style="clear:both;"></div>

                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" name="newsDes" id="newsDes" class="form-control" placeholder="Enter description upto a limit of 500 words." ><?php echo $row['description'];?></textarea>
                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Edit News</button>
                                    <div class="clearfix"></div>
                                </form>

                    </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
  

 </div></div>



        <footer class="footer">

        </footer>

    </div>
</div>


        <footer class="footer">

        </footer>

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



<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
<?php
} else {
	header('Location:index.php');
exit();
}

?>
