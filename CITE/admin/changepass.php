<?php
session_start();
require '../includes/db_connection.php';
require('header.php');

$tbl = $_SESSION['table'] == 'faculty' ? 'faculty_member' : 'staff';

if($_SESSION["id"] != '') {
  $sqll = 'SELECT * FROM  ' . $tbl . ' where id = "'.$_SESSION["id"] .'" ';
  $res = $conn->query($sqll);
  $row1 = $res->fetch_assoc();

 if(isset($_POST['password']) == $row1['password']) {

   if ($_POST['npassword'] == $_POST['cpassword']) {

$sql = 'UPDATE `' . $tbl . '`
  SET
  `password` = "'.password_hash($_POST['cpassword'], PASSWORD_BCRYPT).'" WHERE id ="'.$_SESSION["id"].'"';

if ($conn->query($sql) === TRUE) {
  $msg = "record updated successfully";
}

}else {
  $msg =  "Error: Your Old Password Doesn't Match " . $conn->error;
}

}

$sql = 'SELECT * FROM  ' . $tbl . ' where id = "'.$_SESSION["id"] .'" ';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
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
                    <a class="navbar-brand">PROFILE MANAGEMENT: CHANGE PASSWORD </a>
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
                               <h4 class="title">CHANGE PASSWORD</h4>
               <p style="color:red"<?php if(isset($msg)) {
                 echo $msg;
               } ?>
                           </div>
                          <div class="content">
                              <form method="post" onsubmit="return validateForm();">
                                  <div class="row">

                                    <div class="col-md-4">
                                               <div class="form-group">
                                                   <label>Old Password </label>
                                                   <input type="password" id="password" name="password" class="form-control" placeholder="*******" value="">
                                               </div>
                                           </div>
                                    <div class="col-md-4">
                                               <div class="form-group">
                                                   <label>New Password </label>
                                                   <input type="password" id="npassword" name="npassword" class="form-control" placeholder="*******" value="">
                                               </div>
                                           </div>
                                           <div class="col-md-4">
                                                      <div class="form-group">
                                                          <label>Confirm Password </label>
                                                          <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="*******" value="">
                                                      </div>
                                                  </div>
                                  <button type="submit" class="btn btn-info btn-fill pull-right"onclick="return confirm('Confirm?');">Update Password</button>
                                  
								  
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
    if($("#password").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#password").val() == ''){
        alert("Please enter valid passowrd, up to 50 words");
        return false;
      }else if($("#cpassowrd").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#cpassword").val() == '') {
        alert("Please enter valid Confirm Password up to 50 words");
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
