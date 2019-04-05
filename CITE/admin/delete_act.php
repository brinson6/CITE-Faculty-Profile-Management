  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');
if($_SESSION["id"] != '') {

	 if(isset($_GET['delete'])) {
	$sql = 'DELETE FROM  activities where  id = "'.$_GET['delete'] .'" ';
    $results = $conn->query($sql);
	
		echo '<script language="JavaScript"> window.location.href ="services.php" </script>';
	}
}
?>
