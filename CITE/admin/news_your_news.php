  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');
error_reporting(E_ERROR | E_PARSE);
if($_SESSION["id"] != '') {

		$facultyId = $_SESSION["id"];
	
		if($_SESSION['name'] =='yoow@marshall.edu'){
			$sql = "SELECT * FROM  news order by timeOfNews desc"; 
		}else{
			$sql = "SELECT * FROM  news  where facultyId = '$facultyId' order by timeOfNews desc";
		}
 
 $result = $conn->query($sql);
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
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">YOUR CURRENT NEWS STATUS
								 
								<p style="color:red" ><?php if(isset($_GET['msg'])) {
									echo $_GET['msg'];
								}?>
								<?php if(isset($msg)) {
									echo $msg;
								}?>
								</p></h4>
                            </div>
							 <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
									<th>TITLE</th>
									<th>STATUS </th>
									     <th>DATE & TIME</th>	
									<?php 										
										if($_SESSION['name']=='yoow@marshall.edu'){
									?>	 
										<th>PROFESSOR</th>
                                    	<th>ACCEPT</th>
									<?php 
										}
									?>
									<th>EDIT </th>
                                        <th>DELETE </th>
										<th>PRIORITY</th>
										
									
                                     </thead>
                                    <tbody>
								<?php  
								$no_news = mysqli_num_rows($result);
								if($no_news == 0){  ?>
								
								<tr>
										<td>No Records for News Requests. </td>
										
								</tr>
								<?php 
								}else{
								
								while($row = $result->fetch_assoc()) { ?>
                                        <tr>
										<td><?php echo $row['title'];?></td>
										<td><?php echo $row['status'];?></td>
										<td><?php echo $row['dateAndTime'];?></td>
                                      	
										<?php 										
										if($_SESSION['name'] =='yoow@marshall.edu'){
									?>
									
									<td><?php echo $row['professorName'];?></td>
                                       <td>
													<?php if($row['status'] == "ACCEPTED" ){  ?>
														<a href=""  >------------</a>
													<?php }else{ ?>
													<a href="news_accept_news.php?id=<?php echo $row['newsId'];?>"  >Accept</a>
													<?php } ?>
                                            </td>
                                        
										<?php } ?>

										<td>
                                            <a href="news_edit_new_news.php?id=<?php echo $row['newsId'];?>"  >Edit</a></td>
                                        
										  <td>
										  <a href="news_delete_news.php?delete=<?php echo $row['newsId'];?>" onclick="return confirm('Are you sure you want to delete the selected news titled: <?php echo $row['title']?>?');" >Delete</a></td>
										<td>
											<?php if ($row['priority']) {
												echo '<a href="news_set_priority.php?id=' . $row['newsId'] . '&priority=false">Yes</a>';
											} else {
												echo '<a href="news_set_priority.php?id=' . $row['newsId'].'&priority=true">No</a>';
											}?>
                                        </tr>

								<?php }}?>

								  </tbody>
                                </table>

								<a href="news_add_new_news.php">&nbsp;&nbsp;Create News</a>
								<br><br>
								<a href="news_your_current_news.php">&nbsp;&nbsp;View Current Live News</a>
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

    </script>



<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
<?php
} else {
	header('Location:index.php');
exit();
}

?>
