<?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if(isset($_POST['sub']) && $_POST['sub'] == "Add Teaching Interest")
	{
		/* echo "<pre>";
		print_r($_POST);
		echo "</pre>"; */
		$desc = htmlspecialchars($_POST['description']);

			$faculty_id = $_SESSION["id"];

			$exe_sql="insert into description (faculty_id, description) values ('$faculty_id', '$desc')";
			$exe_courses=$conn->query($exe_sql);
			if($exe_courses)
			{
				$msg = "Teaching Interest Added";
				header('Location:teaching.php?msg='.$msg);
			
				//echo '<script language="JavaScript"> window.location.href ="teaching.php" </script>';
			}

	}
if($_SESSION["id"] != ''){

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
                           <a href="add_service.php">
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
                                <h4 class="title">Teaching Interest</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?>
                            </div>
                                          <div class="content">
                                <form method="post" action="">
                                    <div class="row">

                                         <div class="col-md-12">
										 <label></label>
                                            <div class="form-group">

                                                <textarea rows="5" cols="50" name="description" id="description" class="form-control" placeholder="Enter Description" required></textarea>
                                            </div>
                                        </div>

                </div>
            </div>
        </div>




                                    <input type="submit" class="btn btn-info btn-fill pull-right" name="sub" value="Add Teaching Interest">
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
}
else{
	header('Location:index.php');
exit();
}
?>
