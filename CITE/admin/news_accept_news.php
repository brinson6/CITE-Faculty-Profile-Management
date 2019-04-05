  <?php
session_start();
require '../includes/db_connection.php';
require('header.php');

if($_SESSION["id"] != '') {
	$status = "ACCEPTED";
	$dateAndTime = date("d-m-Y")."-".time();
	$newsId = intval($_GET['id']);

	$sql = "UPDATE `news` SET `status`='$status', `dateAndTime`='$dateAndTime' WHERE `newsId`='$newsId'";
	   
	if ($conn->query($sql) === TRUE) {
		$msg = 'Record Updated Successfully';
		header('Location: news_your_news.php?msg='.$msg);
		exit();
	}
	
	exit("Error : " . $conn->error);
}

header('Location: index.php');
?>
