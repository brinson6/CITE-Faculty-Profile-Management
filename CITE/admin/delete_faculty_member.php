  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {

	//$faculty_id = $_GET['delete'];
	
	 if(isset($_GET['delete'])) {

	$sql = 'DELETE FROM  activities where  faculty_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  awards where  faculty_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  certification where  faculty_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  description where  faculty_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  funds where  facult_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  industrial where  faculty_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  membership where  faculty_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  research where  facult_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  selected_publications where  faculty_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  services where  faculty_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  teaching where  faculty_id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	$sql = 'DELETE FROM  faculty_member where  id = "'.$_GET['delete'].'" ';
    $results = $conn->query($sql);
	
	//echo '<script language="JavaScript"> alert("User Deleted!!!"); </script>';
	
	echo '<script language="JavaScript"> window.location.href ="faculty_members.php" </script>';
	}
}
?>
