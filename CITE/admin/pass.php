<?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '') {
if(isset($_POST['l_name'])) {
  $sql = 'UPDATE `faculty_member`  SET `l_name` = "'.$_POST['l_name'].'" WHERE id ="'.$_GET["id"].'"';

  if ($conn->query($sql) === TRUE) {
  $msg = "Record Updated";
  
} else {
  $msg =  "Error updating record: " . $conn->error;
}

}
$sql = 'SELECT * FROM  faculty_member where id = "'.$_GET["id"] .'" ';
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
                   <a class="navbar-brand">Profile Overview </a>
               </div>
               <div class="collapse navbar-collapse">
                   <ul class="nav navbar-nav navbar-right"><li>
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
                               <h4 class="title">Edit Profile</h4>
               <p style="color:red"<?php if(isset($msg)) {
                 echo $msg;
               }?>
                           </div>
                           <div class="content">
                               <form method="post" enctype="multipart/form-data" onsubmit="return validateForm();">

                                   <div class="row">
                                              <div class="col-md-4">
                                                         <div class="form-group">
                                                             <label>Password </label>
                                                             <input type="text" id="l_name" name="l_name" class="form-control" placeholder="password" value="<?php echo $row['summary']?>">
                                                         </div>
                                                     </div>
                                             </div>
                                   <button type="submit" class="btn btn-info btn-fill pull-right"onclick="return confirm('Are you sure you want to Update?');">Update Profile</button>
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
