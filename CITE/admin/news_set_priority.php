  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '' && isset($_GET['id']) && is_numeric($_GET['id'])) {
	
	$newsId = intval($_GET["id"]);
	$priority = isset($_GET['priority']) && strtolower($_GET['priority']) == 'true' ? 1 : 0;

	$dateAndTime = date("d-m-Y") . '-' . time();
	$newsId = intval($_GET['id']);

	$sql = "UPDATE `news` SET `priority`='$priority', `dateAndTime`='$dateAndTime' WHERE `newsId`='$newsId'";
	   
	if ($conn->query($sql) === TRUE) {
		$msg = 'Record Updated Successfully';
		header('Location: news_your_news.php?msg='.$msg);
		exit();
	}
	
	exit("Error : " . $conn->error);
}

header('Location: index.php');
?>
