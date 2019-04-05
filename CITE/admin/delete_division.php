  <?php
  
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {

	 if(isset($_GET['delete'])) {
	$sql = 'DELETE FROM  division where divisionId = "'.$_GET['delete'] .'" ';
    $results = $conn->query($sql);
		$msg = "Record Deleted";
		header('Location:divisions.php?msg='.$msg);
	}
}
?>
