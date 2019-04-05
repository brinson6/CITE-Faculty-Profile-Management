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
    if(isset($_FILES["uploadedimage"]["name"] )){
   $file_name=$_FILES["uploadedimage"]["name"];
   $temp_name=$_FILES["uploadedimage"]["tmp_name"];
   $imgtype=$_FILES["uploadedimage"]["type"];
   $ext= GetImageExtension($imgtype);
   $imagename=date("d-m-Y")."-".time().$ext;
   $target_path = "../images/".$imagename;
   if(!move_uploaded_file($temp_name, $target_path)) {
     $mg =  "Image not upoaded, try again";
     header('Location:Admin_abtme.php?msg='.$mg);

    } }

if($_SESSION["id"] = "1"){
   if ( isset($_POST['namesz'] )){

  $sql2 = 'UPDATE `faculty_member`  SET `name` = "'.$_POST['namesz'].'",`l_name` = "'.$_POST['l_name'].'",`email` = "'.$_POST['email'].'" ,`phone` = "'.$_POST['phone'].'",`office_address` = "'.$_POST['officeaddress'].'" ,`image` = "'.$_POST['image_name'].'" ,`designation` = "'.$_POST['designation'] .'", `overview` = "'.$_POST['overview'].'",`degree1` ="'.$_POST['Degree1'].'",`degree1_year` ="'.$_POST['Degree1Year'].'",`degree1_school` ="'.$_POST['Degree1school'].'",`degree2` ="'.$_POST['Degree2name'].'",`degree2_year` ="'.$_POST['Degree2Year'].'",`degree2_school` ="'.$_POST['Degree2school'].'",`degree3` ="'.$_POST['degree3'].'",`degree3_year` ="'.$_POST['Degree3Year'].'",`degree3_school` ="'.$_POST['Degree3school'].'" WHERE id ="'.$_SESSION['id'].'"';

 	if ($conn->query($sql2) === TRUE) {
 		$msg = "Record Updated";
     header('Location:Admin_abtme.php?msg='.$msg);
exit;
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
                               <form method="post">

                                   <div class="row">

                                     <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>First Name</label>

                                                 <input type="text"  class="form-control"  placeholder="name" value="<?php echo $_POST['name'];?>">
                                                 <input type="hidden" name="id"   value="<?php echo $_POST['id'];?>">
                                                 <input type="hidden" name="namesz" id="names" class="form-control" placeholder="name" value="<?php echo $_POST['name'];?>">

                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                                 <div class="form-group">
                                                     <label>Last Name</label>
                                                    <input type="text" class="form-control" disabled placeholder="l_name" value="<?php echo $_POST['l_name'];?>">
                                                     <input type="hidden" name="l_name" id="l_name" class="form-control"   placeholder="l_name" value="<?php echo $_POST['l_name'];?>">

                                                 </div>
                                             </div>
                                         <div class="col-md-4">
                                                     <div class="form-group">
                                                         <label>Designation</label>
                                                         <input type="text"  class="form-control" disabled placeholder="designation" value="<?php echo $_POST['designation'];?> ">
                                                         <input type="hidden" name="designation" id="designation" class="form-control"  placeholder="designation" value="<?php echo $_POST['designation'];?> ">

                                                     </div>
                                                 </div>
                                       <div class="col-md-4">
                                           <div class="form-group">
                                               <label>phone</label>
                                               <input type="text"  class="form-control" disabled placeholder="phone" value="<?php echo $_POST['phone'];?> ">
                                               <input type="hidden" name="phone" id="phone" class="form-control"  placeholder="phone" value="<?php echo $_POST['phone'];?> ">

                                           </div>
                                       </div>

                                       <div class="col-md-4">
                                                               <div class="form-group">
                                                                   <label>Division</label>
                                                                   <input type="text"  class="form-control" disabled placeholder="division" value="<?php echo $_POST['division'];?> ">
                                                                   <input type="hidden" name="division" id="division" class="form-control"  placeholder="division" value="<?php echo $_POST['division'];?> ">

                                                               </div>
                                                           </div>

                                        <div class="col-md-4">
                                           <div class="form-group">
                                               <label>Office Address</label>
                                               <input type="text"  class="form-control" disabled placeholder="officeaddress" value="<?php echo $_POST['officeaddress'];?> ">
                                               <input type="hidden" name="officeaddress" id="officeaddress" class="form-control"  placeholder="officeaddress" value="<?php echo $_POST['officeaddress'];?> ">

                                           </div>
                                       </div>

                                       <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Email </label>

                                                      <input type="text"  class="form-control" disabled placeholder="email" value="<?php echo $_POST['email'];?> ">
                                                      <input type="hidden" name="email" id="email" class="form-control"  placeholder="email" value="<?php echo $_POST['email'];?> ">

                                                  </div>
                                              </div>

                                     <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Image</label>
                                              <?php
                                                      if(isset($target_path)) { ?>
                                                        <input type="hidden" name="image_name" value="<?php echo $target_path;?>"><br>
                                                        <img src="<?php echo $target_path;?>" width="70px" height="70px">
<?php
                                                      }
                                                      else {
                                               ?>
 <input type="hidden" name="image_name" value="<?php echo $_POST['image_name']?>"><br>

<img src="<?php echo $_POST['image_name']?>" width="70px" height="70px">

<?php } ?>
                                          </div>
                                      </div>
                                            </div>
                                            <div class="row">
  <p> List 3 Degrees in chronological order. </p> <br>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree1 name </label>

                                                    <input type="text"  class="form-control" disabled placeholder="Degree1" value="<?php echo $_POST['Degree1'];?> ">
                                                    <input type="hidden" name="Degree1" id="Degree1" class="form-control"  placeholder="Degree1" value="<?php echo $_POST['Degree1'];?> ">

                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree1 School Name</label>

                                                  <input type="text"  class="form-control" disabled placeholder="Degree1school" value="<?php echo $_POST['Degree1school'];?> ">
                                                 <input type="hidden" name="Degree1school" id="Degree1school" class="form-control"  placeholder="Degree1school" value="<?php echo $_POST['Degree1school'];?> ">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree1 Year</label>
                                                    <input type="text"  class="form-control" disabled placeholder="Degree1Year" value="<?php echo $_POST['Degree1Year'];?> ">
                                                   <input type="hidden" name="Degree1Year" id="Degree1Year" class="form-control"  placeholder="Degree1Year" value="<?php echo $_POST['Degree1Year'];?> ">

                                                </div>
                                            </div>

                                            </div>
                                            <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree2 name </label>

                                                    <input type="text"  class="form-control" disabled placeholder="Degree2name" value="<?php echo $_POST['Degree2name'];?> ">
                                                   <input type="hidden" name="Degree2name" id="Degree2name" class="form-control"  placeholder="Degree2name" value="<?php echo $_POST['Degree2name'];?> ">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree2 School Name</label>
                                                    <input type="text"  class="form-control" disabled placeholder="Degree2school" value="<?php echo $_POST['Degree2school'];?> ">
                                                   <input type="hidden" name="Degree2school" id="Degree2school" class="form-control"  placeholder="Degree2school" value="<?php echo $_POST['Degree2school'];?> ">

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree2 Year</label>
                                                    <input type="text"  class="form-control" disabled placeholder="Degree2Year" value="<?php echo $_POST['Degree2Year'];?> ">
                                                   <input type="hidden" name="Degree2Year" id="Degree2Year" class="form-control"  placeholder="Degree2Year" value="<?php echo $_POST['Degree2Year'];?> ">
                                                </div>
                                            </div>
                                            </div>

                                              <div class="row">

                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree3 name </label>
                                                    <input type="text"  class="form-control" disabled placeholder="degree3" value="<?php echo $_POST['degree3'];?> ">
                                                   <input type="hidden" name="degree3" id="degree3" class="form-control"  placeholder="degree3" value="<?php echo $_POST['degree3'];?> ">
                                                </div> </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Degree3 School Name</label>
                                                        <input type="text"  class="form-control" disabled placeholder="Degree3school" value="<?php echo $_POST['Degree3school'];?> ">
                                                       <input type="hidden" name="Degree3school" id="Degree3school" class="form-control"  placeholder="Degree3school" value="<?php echo $_POST['Degree3school'];?> ">
                                                    </div>
                                                </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree3 Year</label>
                                                    <input type="text"  class="form-control" disabled placeholder="Degree3Year" value="<?php echo $_POST['Degree3Year'];?> ">
                                                   <input type="hidden" name="Degree3Year" id="Degree3Year" class="form-control"  placeholder="Degree3Year" value="<?php echo $_POST['Degree3Year'];?> ">

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>overview</label>
                                                    <textarea rows="5"   class="form-control" disabled placeholder="Enter Description" ><?php echo $_POST['overview'];?></textarea>
                                                    <input type="hidden" name="overview" id="overview"  class="form-control"  placeholder="overview" value="<?php echo $_POST['overview'];?> ">

                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info btn-fill pull-right" >Update Profile</button>
                                          <a href="http://localhost/finalproject/admin/Admin_abtme.php?id=<?php echo $_POST["id"]?>" class="btn btn-info btn-fill pull-right"style="margin-right: 20px;"> Go Back </a>
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
     }else if($("#names").val().replace(/\s{2,}/g, ' ').split(" ").length>50 || $("#names").val() == ''){
         alert("Please enter valid name up to 50 words");
       return false;
     }else if(!$.isNumeric( $("#phone").val() ) || $("#phone").val().replace(/\s{2,}/g, ' ').split(" ").length>15){
       alert("Please enter numeric value for phone number");
       return false;
     }else if($("#officeaddress").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#officeaddress").val() == ''){
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
     }else if($("#Degree1name").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree1name").val() == ''){
       alert("Please enter valid Degree1name up to 50 words");
       return false;
     } else if($("#degree1year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree1year").val() == ''){
       alert("Please enter valid degree1year up to 50 words");
       return false;
     }else if($("#degree1school").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#degree1school").val() == ''){
       alert("Please enter valid degree1 School up to 50 words");
       return false;

     }else if($("#Degree2name").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree2name").val() == ''){
       alert("Please enter valid Degree2name up to 50 words");
       return false;
     }else if($("#Degree2Year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree2Year").val() == ''){
       alert("Please enter valid Degree2Year up to 50 words");
       return false;
     }else if($("#Degree2school").val().replace(/\s{2,}/g, ' ').split(" ").length>50  || $("#Degree2school").val() == ''){
       alert("Please enter valid Degree2 School up to 50 words");
       return false;

     }else if($("#degree3").val().replace(/\s{2,}/g, ' ').split(" ").length>50 ){
       alert("Please enter valid degree3 up to 50 words");
       return false;
     }else if($("#Degree3Year").val().replace(/\s{2,}/g, ' ').split(" ").length>50  ){
       alert("Please enter valid Degree3Year up to 50 words");
       return false;
     }else if($("#degree3scool").val().replace(/\s{2,}/g, ' ').split(" ").length>50  ){
       alert("Please enter valid degree3 Scool up to 50 words");
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
