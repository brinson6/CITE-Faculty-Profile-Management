  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {

	//$faculty_id = $_GET['delete'];
	
	 if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {

	$sql = 'DELETE FROM  education_records where  staff_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  staff where  id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	
	//echo '<script language="JavaScript"> alert("User Deleted!!!"); </script>';
	
header("Location: staff_members.php");exit();	}
}
?>
