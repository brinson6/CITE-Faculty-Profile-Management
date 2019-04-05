<?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '') {
   
   if(isset($_POST['name'])) {
		  extract($_POST);
		  $name = $_POST['name'];
		  $sql2 = 'SELECT * FROM `division`
		  WHERE
		   `divisionName` = "'.htmlspecialchars($name).'"';
		  $result = $conn->query($sql2);
	      $row_cnt = $result->num_rows;
		 
		 echo $row_cnt;

		 if($row_cnt>0){
			
			
			$msg =  "Division to be Added is already present. Please Try Again.";
			header('Location:divisions.php?msg='.$msg);
		 }else{

			$sql = 'INSERT INTO `division`
		  SET
		   `divisionName` = "'.htmlspecialchars($name).'"';

		if ($conn->query($sql) === TRUE) {
		$msg = "Record Added";
		header('Location:divisions.php?msg='.$msg);
		//echo '<script> alert("Division Added Successfully..") </script>';
		echo '<script language="JavaScript"> window.location.href ="divisions.php" </script>';
	} else {
		$msg =  "Error Adding record: " . $conn->error;
	}
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
                   <a class="navbar-brand">PROFILE MANAGEMENT: FACULTY MEMBERS (DIVISIONS)</a>
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
                                <h4 class="title">ADD DIVISION</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?>
                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Division Name </label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>
										<div style="clear:both;"></div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Division</button> 
									
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
 	 function validateForm(){
		 var dateInput1 = $("#industrial_date").val();
		 var dateInput2 = $("#certificates_date").val();
			     var dateInput3 = $("#honors_award_date").val();


					 var goodDate = /^(19[5-9]\d|20[0-4]\d|2050)/;
					 var t = dateInput1.match(goodDate);
					  var tt = dateInput2.match(goodDate);
					 var ttt = dateInput3.match(goodDate);

					 	if($("#industrial_organization").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter string value for industrial organization up to 50 words");
					 			 return false;
					 		 }else if($("#industrial_position").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid industrial position up to 50 words");
					 			 return false;
					 		 }else if($("#industrial_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid industrial description  up to 50 words");
					 			 return false;
					 		 }else if($("#certificate_organization").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid certificate organization up to 50 words");
					 			 return false;
					 		 }else if($("#certificate_role").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid certificate role up to 50 words");
					 			 return false;
					 		 }else if($("#certificate_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid certificate description up to 50 words");
					 			 return false;
					 		 }else if($("#honors_award_organization").val().length>50 ){
					 				 alert(" enter valid honors/award organization up to 50 words");
					 							return false;
					 		 }else if($("#honors_award_role").val().length>50 ){
					 				 alert(" enter valid honors/award  role up to 50 words");
					 							return false;
					 		 }else if($("#honors_award_des").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
					 				 alert(" enter valid honors/award description up to 50 words");
					 			 return false;
					 		 }
					 }

    </script>
<!------Date Picker---------->
	
	<link href="calender/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="calender/jquery-1.9.1.js"></script>
	<script src="calender/jquery-ui-1.10.3.custom.js"></script>
	
<script>
	$(function() {
    $( ".datepicker" ).datepicker({
	
	dateFormat: "mm/dd/yy",
    });
  });
</script>
 </html>
<?php
} else {
	header('Location:index.php');
exit();
}
?>
