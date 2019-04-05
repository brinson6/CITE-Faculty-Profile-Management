  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {
 $sql = 'SELECT * FROM  teaching where id = "'.$_GET["id"] .'" ';
 $result = $conn->query($sql);
   $row = $result->fetch_assoc();
  if(isset($_POST['subjectname'])) {
   $sqlw = 'UPDATE `teaching`  SET `subjectname` = "'.$_POST['subjectname'].'",`date` = "'.$_POST['date'].'",`subjectnumber` = "'.$_POST['subjectnumber'].'" WHERE id ="'.$_GET["id"].'"';

	if ($conn->query($sqlw) === TRUE) {
    //$msg = "Record Updated";

	//header('Location:teaching.php?msg='.$msg);
	echo '<script language="JavaScript"> window.location.href ="teaching.php" </script>';
} else {
    //$msg =  "Error updating record: " . $conn->error;
	echo '<script> alert("An Error Occured..") </script>';
	echo '<script language="JavaScript"> window.location.href ="teaching.php" </script>';
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
					<a class="navbar-brand">PROFILE MANAGEMENT: TEACHING</a>
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
                                <h4 class="title">EDIT COURSE TAUGHT</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?>
                            </div>
                                          <div class="content">
                                <form method="post" onsubmit="return validateForm();" >
                                    <div class="row">
                                      <div class="col-md-4">
                                                             <div class="form-group">
                                                                 <label for="exampleInputEmail1">Course Number </label>
                                                                 <input type="text" name="subjectnumber" id="subjectnumber" class="form-control" placeholder="course number" value="<?php echo $row['subjectnumber'];?> ">
                                                             </div>
                                                         </div>
                                 <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Course Name </label></br>

                                                <input type="text" name="subjectname" id="subjectname" class="form-control" placeholder="course name" value="<?php echo $row['subjectname'];?>">
                                            </div>
                                        </div>


                                       
										 <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Year </label>
                                                <input type="text" name="date" id="date" class="form-control" placeholder="year" value="<?php echo $row['date'];?>">
                                            </div>
                                        </div>
										
										   <button type="submit" class="btn btn-info btn-fill pull-right" >Edit Course Taught</button>
										 </div>
									</div>



									

                                   
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
	  if($("#subjectnumber").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#subjectnumber").val() == ''){
			  alert("Please enter valid number up to 50 words");
			  return false;
		  }else if($("#subjectname").val().replace(/\s{2,}/g, ' ').split(" ").length>50) {
			  alert("Please enter valid name up to 50 words");
			  return false;
		  }else if( $("#date").val() != '' || $("#date").val() == ''){
               var dateInput = $("#fund_year").val(); }
     var goodDate = /^(19[5-9]\d|20[0-4]\d|2050)/;
        if (dateInput.match(goodDate)){
            //return true;
        } else {
            alert("Please enter Date as (Start Year) to (End Year) Formate, e.g 1950-2010 ");
                    return false;
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
