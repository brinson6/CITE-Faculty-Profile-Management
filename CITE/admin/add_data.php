  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '') {
	
/*
Changes done for mysql code
ALTER TABLE selected_publications CHANGE publication_type genre_type varchar(200);
ALTER TABLE selected_publications add publication_year year;
alter table selected_publications drop status, drop Other_name;
*/	
	
$check_limit_query = 'SELECT COUNT(id) AS total  FROM selected_publications WHERE faculty_id = '.$_SESSION["id"];
	$check = $conn->query($check_limit_query);
	   $row = $check->fetch_assoc();
   if($row['total'] >= '10') { ?>
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
					<a class="navbar-brand">PROFILE MANAGEMENT: RESEARCH</a>
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
                                <h4 class="title">ADD PUBLICATION</h4>
								<p style="color:red" ><?php
									echo 'Currently you Reached Limit of 10 , Delete old to add';
								 ?></p>
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm();">
                                    <div class="row">
									

 				                       <div class="col-md-12">

                                        </div>

                                          <div class="col-md-12">
                                            <div class="form-group">
                                                <label>publication title</label>
                                                <input type="text" name="publication_title" id="publication_title" class="form-control" disabled placeholder=" Enter publication title" value=""/>
                                            </div>
                                        </div>
										 <div class="col-md-12">
                                            <div class="form-group">
                                                <label>publication authors</label>
                                                <input type="text" name="publication_author" id="publication_author" class="form-control" disabled placeholder=" Enter publication author" value=""/>
                                            </div>
                                        </div>

										<div class="col-md-12">
                                            <div class="form-group">
                                                <label>publication date</label>
                                                 <input type="text" name="publication_type" id="publication_type" class="form-control" disabled placeholder=" Enter publication date" value=""/>
                                            </div>
                                        </div>
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label>publication</label>
                                                <textarea rows="5" name="data" id="data" class="form-control"  disabled placeholder="Enter Description" >
												 </textarea>
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

 <?php }
	else {
   if(isset($_POST['data'])) {
   //$sql = 'insert into `selected_publications`  SET `data` = "'.htmlentities($_POST['data']).'",`publication_title` =  "'.$_POST['publication_title'].'",`publication_author` =  "'.$_POST['publication_author'].'",`publication_type` =  "'.$_POST['publication_type'].'", faculty_id ="'.$_SESSION["id"].'"';
   
   $data = htmlentities($_POST['data']);
   $publication_title = htmlspecialchars($_POST['publication_title']);
   $publication_author = $_POST['publication_author'];
   $genre_type = $_POST['genre_type'];
   $faculty_id = $_SESSION["id"];
   $publication_year = $_POST['publication_year'];
 
   
  $sql = "insert into  selected_publications"."(publication_title, publication_author, genre_type, faculty_id, data, publication_year)"."values('$publication_title', '$publication_author', '$genre_type','$faculty_id', '$data', '$publication_year' )";
   
	if ($conn->query($sql) === TRUE) {
    $msg = "New record created successfully";
	header('Location:selected_publications.php?msg='.$msg);
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
					<a class="navbar-brand">PROFILE MANAGEMENT: RESEARCH</a>
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
                                <h4 class="title">ADD PUBLICATION</h4>
								<p style="color:red" ><?php if(isset($msg)) {
									echo $msg;
								}?></p>
                            </div>
                            <div class="content">
                                <form method="post" onsubmit="return validateForm();">
                                    <div class="row">
									
                                          <div class="col-md-12">
                                            <div class="form-group">
                                                <label>publication title</label>
                                                <input type="text" name="publication_title" id="publication_title" class="form-control" placeholder=" Publication title" value=""/>
                                            </div>
                                        </div>
										 <div class="col-md-12">
                                            <div class="form-group">
                                                <label>publication author(s)</label>
                                                <input type="text" name="publication_author" id="publication_author" class="form-control" placeholder=" Publication author(s)" value=""/>
                                            </div>
                                        </div>
							  		<div class="col-md-12">
                                            <div class="form-group">
                                                <label>name of genre/ conference/ publisher</label>
                                                 <input type="text" name="genre_type"  id="genre_type" class="form-control" placeholder=" Genre/ Conference/ Publisher" value=""/>
                                            </div>
                                        </div>
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label>other informaton</label>
                                                <textarea rows="5" name="data" id="data" class="form-control" placeholder="Vol No/ Issue No/ Other Information upto a limit of 500 words." ></textarea>
                                            </div>
                                        </div>
									
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label>pubication year</label>
                                                 <input type="text" name="publication_year"  id="publication_year" class="form-control" placeholder=" 4 digit year" value=""/>
                                            </div>
                                        </div>
									
										
										<!--
										<div class="form-group col-md-3">
									  <label for="division">Publication Year</label>
									  <select class="form-control" id="publication_year"  name="publication_year" onChange="display(this.value)" required>
										 <option value = "">--Select Year--</option>
										<?php 
											  $right_now = getdate();
											  $this_year = $right_now['year'];
											  $start_year = $this_year-50;
											  while ($this_year >= $start_year) {
												  echo "<option>{$this_year}</option>";
												  $this_year--;
											  }
											 ?>
												</select>
									</div>
									-->
										
										<div class="clearfix"></div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Publication</button>
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

	<?php } ?>

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
	   var cur_year = (new Date()).getFullYear();
	    if($("#publication_title").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#publication_title").val() == ''){
			  alert("Please enter a valid Publication Title up to a limit of 50 words.");
			  return false;
		  }else if($("#publication_author").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#publication_author").val() == ''){
			  alert("Please enter valid Publication Author name(s) up to a limit of 50 words.");
			  return false;
		  }else if($("#genre_type").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#genre_type").val() == ''){
			  alert("Please enter valid Genre Type up to a limit of 50 numbers.");
			  return false;
		  }
		  else  if($("#publication_year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#publication_year").val() == '' || $("#publication_year").val()<1000 || $("#publication_year").val()>cur_year || !$("#publication_year").val().match("^[0-9]*$")){
			  alert("Please enter a valid 4 digit Publication Year.");
			  return false;
		  }
		  
		  /*else if($("#data").val().replace(/\s{2,}/g, ' ').split(" ").length>500  || $("#data").val() == ''){
			  alert("Please enter valid Data (other information) up to a limit of 500 words.");
			  return false;
		  }*/
		  
	  }
    </script>
    
</html>
<?php
} else {
	header('Location:index.php');
exit();
}

?>
