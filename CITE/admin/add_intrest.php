<?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '') {
$check_limit_query = 'SELECT COUNT(id) AS total  FROM research WHERE facult_id = '.$_SESSION["id"];
$check = $conn->query($check_limit_query);
   $row = $check->fetch_assoc();
 if($row['total'] >= '1')
    {
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
                                   <h4 class="title">ADD Intrest</h4>
                                   <p style="color:red" >You are Limited to add only 1 Research Summary  , Delete old to add new</p>
                               </div>
                               <div class="content">
                                   <form method="post" onsubmit="return validateForm();">
                                       <div class="row">

                                    <div class="col-md-4">

                                           </div>


                                            <div class="col-md-12">
                                               <div class="form-group">
                                                   <label>summary</label>
                                                   <textarea rows="5" name="summary" id="summary" class="form-control" placeholder="Enter Description" ></textarea>
                                               </div>
                                           </div>

                                       <button type="submit" class="btn btn-info btn-fill pull-right">Add Intrest</button>
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
<?php
}
else {
     if(isset($_POST['summary'])) {
		
		$summary = $_POST['summary'];
		 $title = "null";
		 $facult_id = $_SESSION["id"];
		 
   // $sql = 'insert into `research`  SET `summary` = "'.$_POST['summary'].'", facult_id ="'.$_SESSION["id"].'"';
		$sql = "insert into  research"."(facult_id,title,summary)"."values('$facult_id', '$title', '$summary')";
		
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

                             <a href="#">
                                  <i class="fa fa-search"></i>
                              </a>
                          </li>
                      </ul>

                      <ul class="nav navbar-nav navbar-right">
                          <li>
                             <a href="add_intrest.php">
                                Add Intrest
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
                                  <h4 class="title">ADD Interest</h4>
                 <p style="color:red" ><?php if(isset($msg)) {
                   echo $msg;
                 }?></p>
                              </div>
                              <div class="content">
                                  <form method="post" onsubmit="return validateForm();">
                                      <div class="row">

                                   <div class="col-md-4">

                                          </div>


                                           <div class="col-md-12">
                                              <div class="form-group">
                                                  <label>Summary</label>
                                                  <textarea rows="5" name="summary" id="summary" class="form-control" placeholder="Enter Description" ></textarea>
                                              </div>
                                          </div>

                                      <button type="submit" class="btn btn-info btn-fill pull-right">Add Intrest</button>
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
   <?php

} ?>

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
	  if($("#summary").val().replace(/\s{2,}/g, ' ').split(" ").length>500  || $("#summary").val() == ''){
      alert("Please enter valid summary description up to 500 words");
      return false;
		  }else if($("#summary").val().replace(/\s{2,}/g, ' ').split(" ").length>500  || $("#summary").val() == ''){
			  alert("Please enter valid summary description up to 500 words");
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
