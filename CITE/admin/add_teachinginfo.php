  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '') {
	$check_limit_query = 'SELECT COUNT(id) AS total  FROM teaching WHERE faculty_id = '.$_SESSION["id"];
	$check = $conn->query($check_limit_query);
	if( $check == true ) {
	   $row = $check->fetch_assoc();
	}
	else {
		$row['total'] ='0';
	}
   if($row['total'] >= '5') {
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

                           <a href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="add_teachinginfo.php">
                              Add TeachingInfo
                            </a>
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
                                <h4 class="title">ADD teachinginfo</h4>
								<p style="color:red" > Limit of Records Reached Maximum </p>
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm();">
                                    <div class="row">

                                      <div class="col-md-4">
                                         <div class="form-group">
                                             <label for="exampleInputEmail1">Subject number </label>
                                             <input type="text" name="subjectnumber" id="subjectnumber" class="form-control" disabled placeholder="subjectnumber" value=" ">
                                         </div>
                                       </div> <div class="col-md-4">
                                           <div class="form-group">
                                               <label for="exampleInputEmail1">Subject name </label>
                                               <input type="text" name="subjectname" id="subjectname" class="form-control" disabled placeholder="subjectname" value=" ">
                                           </div>
                                       </div>
                                       <div class="col-md-4">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">date </label>
                                     <input type="text" name="date" id="date" class="form-control" disabled placeholder="date" value=" ">
                                 </div>
                             </div>
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>description</label>
                                                <textarea rows="5" name="description" id="description" class="form-control" disabled placeholder="Enter Description" ></textarea>
                                            </div>
                                        </div>
                                        <div style="clear:both;"></div>
                                     <div class="clearfix"></div>
                                </form>

                    </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

  <?php
   }
   else {

   if(isset($_POST['subjectname'])) {
  $sql = 'INSERT into `teaching`  SET `subjectname` = "'.$_POST['subjectname'].'",`date` = "'.$_POST['date'].'",`subjectnumber` = "'.$_POST['subjectnumber'].'",`description` = "'.$_POST['description'].'", faculty_id ="'.$_SESSION["id"].'"';

	if ($conn->query($sql) === TRUE) {
    $msg = "New record created successfully";
	header('Location:teaching.php?msg='.$msg);
} else {
    $msg =  "Error : " . $conn->error;
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

                           <a href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="add_teachinginfo.php">
                              Add TeachingInfo
                            </a>
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
                                <h4 class="title">ADD teachinginfo</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?></p>
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm();">
                                    <div class="row">


                                                                            <div class="col-md-4">
                                                                               <div class="form-group">
                                                                                   <label for="exampleInputEmail1">Subject number </label>
                                                                                   <input type="text" name="subjectnumber" id="subjectnumber" class="form-control" disabled placeholder="subjectnumber" value=" ">
                                                                               </div>
                                                                             </div> <div class="col-md-4">
                                                                                 <div class="form-group">
                                                                                     <label for="exampleInputEmail1">Subject name </label>
                                                                                     <input type="text" name="subjectname" id="subjectname" class="form-control" disabled placeholder="subjectname" value=" ">
                                                                                 </div>
                                                                             </div>
                                                                             <div class="col-md-4">
                                                                       <div class="form-group">
                                                                           <label for="exampleInputEmail1">date </label>
                                                                           <input type="text" name="date" id="date" class="form-control" disabled placeholder="date" value=" ">
                                                                       </div>
                                                                   </div>

                                                                       <div class="col-md-4">
                                                                                  <div class="form-group">
                                                                                      <label for="exampleInputEmail1">status </label>
                                                                                      <input type="text" name="date" id="date" class="form-control" disabled placeholder="date" value=" ">

                                                                                  </div>

                                                                              </div>

                                                                               <div class="col-md-12">
                                                                                  <div class="form-group">
                                                                                      <label>description</label>
                                                                                      <textarea rows="5" name="description" id="description" class="form-control" disabled placeholder="Enter Description" ></textarea>
                                                                                  </div>
                                                                              </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add info</button>
                                    <div class="clearfix"></div>
                                </form>

                    </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

   <?php  } ?>
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
        if($("#subjectname").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#subjectname").val() == ''){
          alert("Please enter valid subject name up to 50 words");
          return false;
        }
      else if($("#subjectnumber").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#subjectnumber").val() == ''){
          alert("Please enter valid subject number, up to 50 words");
          return false;
        }
        else if( $("#date").val() != '' || $("#date").val() == ''){
             var dateInput = $("#date").val(); }

       var goodDate = /^(19[5-9]\d|20[0-4]\d|2050)/;
      if (dateInput.match(goodDate)){
          //return true;
      } else {
          alert("Please enter Date as (Start Year) to (End Year) Formate, e.g 1950-2010 ");
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
