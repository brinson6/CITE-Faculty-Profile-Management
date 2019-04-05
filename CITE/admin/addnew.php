<?php
session_start();
 require '../includes/db_connection.php';

if(isset($_POST['email'])){

  $sql = 'SELECT * FROM faculty_member where email = "'.$_SESSION['email'].'"';
 $result = $conn->query($sql);
   if ($result->num_rows > 0 ) {
     while($row = $result->fetch_assoc()) {
                  $recover = $row['password'];

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send
mail($row['email'], 'Password jhgjahgbjahga Recovery', $data);

   }
$message = "Password sent to your Email, please select login to enter your PASSWORD.";
header('Location:../index.php?msg='.$msg);
}
else {
    $message = "Email not Found";
}

}

mysqli_close($conn);
?>
<?php
require 'footer.php';
?>
