<?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {
  if(isset($_POST['publication_author'])) {
      //$sql = 'UPDATE `selected_publications`  SET `publication_title` =  "'.$_POST['publication_title'].'",`publication_author` =  "'.$_POST['publication_author'].'",`publication_type` =  "'.$_POST['publication_type'].'" WHERE id ="'.$_GET["id"].'"';

   $data = htmlentities($_POST['data']);
   $publication_title = htmlentities($_POST['publication_title']);
   $publication_author = htmlentities($_POST['publication_author']);
   $genre_type = htmlentities($_POST['genre_type']);
   $publication_year = $_POST['publication_year'];
   $id = $_GET["id"];
   
   $sql = "UPDATE selected_publications SET publication_title = '$publication_title', publication_author = '$publication_author', genre_type = '$genre_type', data = '$data', publication_year = '$publication_year' WHERE id = $id";
   
      if($conn->query($sql) === TRUE) {
        $msg = "Record Updated";
        header('Location:selected_publications.php?msg='.$msg);
      } else {
        $msg =  "Error updating record: " . $conn->error;
      }
    }
    
$sql = 'SELECT * FROM  selected_publications where id = "'.$_GET["id"] .'"';
$result = $conn->query($sql);
$res = $result->fetch_assoc();

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
                              <h4 class="title">EDIT PUBLICATION</h4>
              <p style="color:red" ><?php if(isset($msg)) {
                echo $msg;
              } ?>
			  
                          </div>
						  <?php
						  $publication_title_HTML = $res['publication_title'];
						  
						  ?>
                          <div class="content">
                              <form method="post" onsubmit="return validateForm();">
                                  <div class="row">


                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label>publication title</label>
                                              <input type="text" name="publication_title" id="publication_title" class="form-control" placeholder=" Publication title" value="<?php echo $publication_title_HTML ?>">
                                          </div>
                                      </div>
                  <div class="col-md-12">
                                          <div class="form-group">
                                              <label>publication author(s)</label>
                                              <input type="text" name="publication_author" id="publication_author" class="form-control" placeholder=" Publication author(s)" value="<?php echo ($res['publication_author'])?>"/>
                                          </div>
                                      </div>
                  <div class="col-md-12">
                                          <div class="form-group">
                                              <label>name of genre/ conference/ publisher</label>
                                               <input type="text" name="genre_type"  id="genre_type" class="form-control" placeholder="genre/ conference/ publisher" value="<?php echo ($res['genre_type'])?>"/>
                                          </div>
                                      </div>

                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label>other information</label>
                                              <textarea rows="5" name="data"  id="data" class="form-control" placeholder="Vol No/ Issue No/ Other Information upto a limit of 500 words" ><?php echo ($res['data'])?></textarea>
                                          </div>
                                      </div>

									  
									<div class="col-md-12">
									  <div class="form-group">
                                              <label>publication year</label>
                                               <input type="text" name="publication_year"  id="publication_year" class="form-control" placeholder="4 digit year" value="<?php echo ($res['publication_year'])?>"/>
                                          </div>
										  </div>
										  
										  <!--
										  <div class="form-group col-md-3">
									  <label for="division">Publication Year</label>
									  <select class="form-control" id="publication_year"  name="publication_year" onChange="display(this.value)" required>
										<option value="<?php echo ($res['publication_year'])?>"><?php echo ($res['publication_year'])?></option>
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
										  
                                      </div>
                                  <button type="submit" class="btn btn-info btn-fill pull-right">Update data</button>
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
		  }else  if($("#publication_year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#publication_year").val() == '' || $("#publication_year").val()<1000 || $("#publication_year").val()>cur_year || !$("#publication_year").val().match("^[0-9]*$")){
			  alert("Please enter a valid 4 digit Publication Year.");
			  return false;
		  }
		  /*
		  else if($("#data").val().replace(/\s{2,}/g, ' ').split(" ").length>500  || $("#data").val() == ''){
			  alert("Please enter valid Data (other information) up to a limit of 500 words.");
			  return false;
		  }
		  */
	  }
    </script>

</html>
<?php
} else {
header('Location:index.php');
exit();
}

?>
