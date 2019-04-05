<?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if(isset($_POST['sub']) && $_POST['sub'] == "Add Courses Taught")
	{
		/* echo "<pre>";
		print_r($_POST);
		echo "</pre>"; */
		$course_number = $_POST['coursenumber'];
		$course_name = $_POST['coursename'];
		$year = $_POST['year'];
		$link = $_POST['link'];
		$description = "null";
		
		$cnumber_count = count($course_number);
		$cname_count = count($course_name);
		$year_count = count($year);
		$link_count = count($link);

			$ns=0;
			$ni=0;
			$ne=0;
			for($si=0; $si < 2; $si++)
			{
			if($course_number[$si]=="")
			{
			$ns++;
			}
			if($course_name[$si]=="")
			{
			$ni++;
			}
			if($year[$si]=="")
			{
			$ne++;
			}
			}

		if($ns != $ni || $ni != $ne || $ne != $ns)
		{
			//echo '<script> alert("Please Enter Proper Teaching Info") </script>';
			//echo '<script language="JavaScript"> window.location.href ="teaching.php" </script>';
			//echo "hiii";
			/* echo "<br/>";
			echo $ns;
			echo "<br/>";
			echo $ni;
			echo "<br/>";
			echo $ne; */
		}
		else{
			/* echo "hiii2222";
			echo "<br/>";
			echo $cnumber_count;
			echo "<br/>";
			echo $cname_count;
			echo "<br/>";
			echo $year_count; */
			$faculty_id = $_SESSION["id"];
			for($j=0; $j<$cnumber_count; $j++)
			{
				if($course_name[$j] != "")
				{
					if (isset($link[$j]) && preg_match("%^https?://%i", $link[$j]))
						$link[$j] = $conn->escape_string($link[$j]);
					else
						$link[$j] = '';
					$exe_sql="insert into teaching (faculty_id, subjectname, date, subjectnumber,description, link) values ('$faculty_id', '$course_name[$j]', '$year[$j]', '$course_number[$j]', '$description', '$link[$j]')";
					$exe_courses=$conn->query($exe_sql);
				}
			}
			/*if($j == 10)
			{*/
				//$msg = "Courses Added Successfully!!!";
				//echo '<script language="JavaScript"> alert("Courses Added Successfully!!!!!!") </script>';
				//echo '<script language="JavaScript"> window.location.href ="teaching.php"</script>';
				//header('Location:teaching.php?msg='.$msg);
				//header('Location:teaching.php');
				
			/*}*/
			
				//echo '<script> alert("Courses Added Successfully..") </script>';
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
                                <h4 class="title">ADD COURSES TAUGHT</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?>
                            </div>
                                          <div class="content">
                                <form method="post" action="">
                                    <div class="row">

										 <div class="col-md-12">
                        <div class="card card-plain">
							<!--<center><h4>Courses Taught</h4></center>-->
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Course Number</th>
                                    	<th>Course Name</th>
                                    	<th>Year </th>

                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td> <input type="text" name="coursenumber[]" id="coursenumber1" class="form-control" placeholder="coursenumber" required></td>
                                        	<td> <input type="text" name="coursename[]" id="coursename1" class="form-control" placeholder="coursename" required></font></td>
                                        	<td> <input type="text" name="year[]" id="year1" class="form-control" placeholder="year" required></font></td>
											<td> <input type="text" name="link[]" id="link1" class="form-control" placeholder="http://example.com/"></td>
                                       </tr>
                                         <tr>
                                        	<td> <input type="text" name="coursenumber[]" id="coursenumber2" class="form-control" placeholder="coursenumber"></td>
                                        	<td> <input type="text" name="coursename[]" id="coursename2" class="form-control" placeholder="coursename"></td>
                                        	<td> <input type="text" name="year[]" id="year2" class="form-control" placeholder="year"></td>
											<td> <input type="text" name="link[]" id="link2" class="form-control" placeholder="http://example.com/"></td>
                                       </tr> <tr>
                                        	<td> <input type="text" name="coursenumber[]" id="coursenumber3" class="form-control" placeholder="coursenumber"></td>
                                        	<td> <input type="text" name="coursename[]" id="coursename3" class="form-control" placeholder="coursename"></td>
                                        	<td> <input type="text" name="year[]" id="year3" class="form-control" placeholder="year"></td>
											<td> <input type="text" name="link[]" id="link3" class="form-control" placeholder="http://example.com/"></td>
                                       </tr> 
                                    </tbody>
                                </table>
						<input type="submit" class="btn btn-info btn-fill pull-right" name="sub" value="Add Courses Taught">
                            </div>
								
                        </div>
					
                    </div>


                </div>
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
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

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
