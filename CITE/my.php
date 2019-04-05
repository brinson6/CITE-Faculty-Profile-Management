<?php
session_start();

require '../includes/db_connection.php';
require('header.php');
function GetImageExtension($imagetype)
    {
      if(empty($imagetype)) return false;
      switch($imagetype)
      {
          case 'image/bmp': return '.bmp';
          case 'image/gif': return '.gif';
          case 'image/jpeg': return '.jpg';
          case 'image/png': return '.png';
          default: return false;
      }
    }

if($_SESSION["id"] = "1"){
if(isset($_POST['name'])) {
  if(isset($_FILES["uploadedimage"]["name"] )){
   $file_name=$_FILES["uploadedimage"]["name"];
   $temp_name=$_FILES["uploadedimage"]["tmp_name"];
   $imgtype=$_FILES["uploadedimage"]["type"];
   $ext= GetImageExtension($imgtype);
   $imagename=date("d-m-Y")."-".time().$ext;
   $target_path = "../images/".$imagename;
   if(move_uploaded_file($temp_name, $target_path)) {
     $sql2 = 'UPDATE `faculty_member`  SET `name` = "'.$_POST['name'].'",`l_name` = "'.$_POST['l_name'].'",`degree1` ="'.$_POST['degree1'].'",`degree1_year` ="'.$_POST['degree1Year'].'",`degree1_school` ="'.$_POST['degree1school'].'",`degree2` ="'.$_POST['degree2'].'",`degree2_year` ="'.$_POST['degree2Year'].'",`degree2_school` ="'.$_POST['degree2school'].'",`degree3` ="'.$_POST['degree3'].'",`degree3_year` ="'.$_POST['degree3year'].'",`degree3_school` ="'.$_POST['degree3school'].'" ,`designation` ="'.$_POST['designation'].'",`division` ="'.$_POST['division'].'",`email` = "'.$_POST['email'].'" ,`image` = "'.$target_path.'" ,`phone` = "'.$_POST['phone'].'",`office_address` = "'.$_POST['officeaddress'].'",`overview` ="'.$_POST['overview'].'" WHERE id ="'.$_SESSION["id"].'"';
   }else {
        $sql2 = 'UPDATE `faculty_member`  SET `name` = "'.$_POST['name'].'",`l_name` = "'.$_POST['l_name'].'",`degree1` ="'.$_POST['degree1'].'",`degree1_year` ="'.$_POST['degree1Year'].'",`degree1_school` ="'.$_POST['degree1school'].'",`degree2` ="'.$_POST['degree2'].'",`degree2_year` ="'.$_POST['degree2Year'].'",`degree2_school` ="'.$_POST['degree2school'].'",`degree3` ="'.$_POST['degree3'].'",`degree3_year` ="'.$_POST['degree3year'].'",`degree3_school` ="'.$_POST['degree3school'].'" ,`designation` ="'.$_POST['designation'].'",`division` ="'.$_POST['division'].'",`email` = "'.$_POST['email'].'" ,`image` = "'.$target_path.'" ,`phone` = "'.$_POST['phone'].'",`office_address` = "'.$_POST['officeaddress'].'",`overview` ="'.$_POST['overview'].'" WHERE id ="'.$_SESSION["id"].'"';
    }
  }
 if ($conn->query($sql2) === TRUE) {
   $msg = "Record Updated";

     header('Location:Admin_abtme.php?msg='.$msg);
 } else {
   $msg =  "Error updating record: " . $conn->error;
 }
}
//echo $msg;exit;
$sql = 'SELECT * FROM faculty_member where id = "'.$_SESSION["id"] .'" ';
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
                                                 <label>First Name</label>
                                                 <input type="text" name="name" class="form-control" placeholder="Username" value="<?php echo $row['name']?>">
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                                 <div class="form-group">
                                                     <label>Last Name</label>
                                                     <input type="text" name="l_name" class="form-control" placeholder="name" value="<?php echo $row['l_name']?>">
                                                 </div>
                                             </div>
                                         <div class="col-md-4">
                                                     <div class="form-group">
                                                         <label>Designation</label>
                                                         <input type="text" name="designation" class="form-control" placeholder="designation" value="<?php echo $row['designation']?>">
                                                     </div>
                                                 </div>
                                       <div class="col-md-4">
                                           <div class="form-group">
                                               <label>phone</label>
                                               <input type="text" name="phone" class="form-control" placeholder="phone" value="<?php echo $row['phone']?>">
                                           </div>
                                       </div>

                                       <div class="col-md-4">
                                                               <div class="form-group">
                                                                   <label>Division</label>
                                                                   <input type="text" name="division" class="form-control" placeholder="division" value="<?php echo $row['division']?>">
                                                               </div>
                                                           </div>

                                        <div class="col-md-4">
                                           <div class="form-group">
                                               <label>Office Address</label>
                                               <input type="text" name="officeaddress" class="form-control" placeholder="Home Address" value="<?php echo $row['office_address']?>">
                                           </div>
                                       </div>

                                       <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Email </label>
                                                      <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['email']?>">
                                                  </div>
                                              </div>

                                     <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Image</label>
  <input type="file" name="uploadedimage" id="fileToUpload">
<input type="hidden" name="image_name" <?php echo $row['image']?>><br>
<?php if( $row['image'] != '')
{
?>
<img src="<?php echo $row['image']?>" width="70px" height="70px">

<?php } ?>
                                          </div>
                                      </div>
                                            </div>
                                            <div class="row">
  <p> List 3 Degrees in chronological order. </p> <br>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree1 name </label>
                                                    <input type="text" name="degree1" class="form-control" placeholder="Degree1name" value="<?php echo $row['degree1']?>">
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree1 School Name</label>
                                                    <input type="text" name="degree1school" class="form-control" placeholder="degree1 School" value="<?php echo $row['degree1_school']?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree1 Year</label>
                                                    <input type="text" name="degree1Year" class="form-control" placeholder="degree1 Year" value="<?php echo $row['degree1_year']?>">
                                                </div>
                                            </div>

                                            </div>
                                            <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree2 name </label>
                                                    <input type="text" name="degree2" class="form-control" placeholder="Degree2 name" value="<?php echo $row['degree2']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree2 School Name</label>
                                                    <input type="text" name="degree2school" class="form-control" placeholder="Degree2 School" value="<?php echo $row['degree2_school']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree2 Year</label>
                                                    <input type="text" name="degree2Year" class="form-control" placeholder="Degree2 Year" value="<?php echo $row['degree2_year']?>">
                                                </div>
                                            </div>

                                            </div>

                                              <div class="row">

                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree3 name </label>
                                                    <input type="text" name="degree3" class="form-control" placeholder="Degree3 name" value="<?php echo $row['degree3']?>">
                                                </div> </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Degree3 School Name</label>
                                                        <input type="text" name="degree3school" class="form-control" placeholder="Degree3 School" value="<?php echo $row['degree3_school']?>">
                                                    </div>
                                                </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree3 Year</label>
                                                    <input type="text" name="degree3year" class="form-control" placeholder="Degree3 Year" value="<?php echo $row['degree3_year']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>overview</label>
                                                    <textarea rows="5" name="overview" class="form-control" placeholder="Enter Description" ><?php echo $row['overview']?></textarea>
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
     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
     (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
     m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
     })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

     ga('create', 'UA-46172202-1', 'auto');
     ga('send', 'pageview');

   function isValidEmailAddress(emailAddress) {
   var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
   return pattern.test(emailAddress);
 }
   function validateForm(){

     if( !isValidEmailAddress( $("#email").val() ) ) {
      alert("Please enter valid email");
       return false;
     }else if($("#name").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#name").val() == ''){
         alert("Please enter valid name up to 50 words");
       return false;
     }else if(!$.isNumeric( $("#phone").val() ) || $("#phone").val().replace(/\s{2,}/g, ' ').split(" ").length>15){
       alert("Please enter numeric value for phone number");
       return false;
     }else if($("#office_address").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#office_address").val() == ''){
       alert("Please enter valid address up to 50 words");
       return false;
     }else if($("#designation").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#designation").val() == ''){
       alert("Please enter valid designation up to 50 words");
       return false;
     }/* */else if($("#overview").val().replace(/\s{2,}/g, ' ').split(" ").length>500  || $("#overview").val() == ''){
       alert("Please enter valid overview up to 500 words");
       return false;
     }/* */else if($("#division").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#division").val() == ''){
       alert("Please enter valid division up to 50 words");
       return false;
     }else if($("#degree1").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree1").val() == ''){
       alert("Please enter valid Degree1name up to 50 words");
       return false;
     } else if($("#degree1year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree1year").val() == ''){
       alert("Please enter valid degree1year up to 50 words");
       return false;
     }else if($("#degree1school").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree1school").val() == ''){
       alert("Please enter valid degree1 School up to 50 words");
       return false;

     }else if($("#degree2name").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree2name").val() == ''){
       alert("Please enter valid Degree2name up to 50 words");
       return false;
     }else if($("#degree2Year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree2Year").val() == ''){
       alert("Please enter valid Degree2Year up to 50 words");
       return false;
     }else if($("#degree2school").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree2school").val() == ''){
       alert("Please enter valid Degree2 School up to 50 words");
       return false;
     }else if($("#degree3year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree3year").val() == ''){
       alert("Please enter valid Degree2name up to 50 words");
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
