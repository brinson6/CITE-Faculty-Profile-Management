<?php
session_start();
require_once( '../includes/db_connection.php');
require_once( '../includes/user.php');

if (isset($_SESSION['id']) && (new User($conn, $_SESSION['id']))->get_permissions() > 1) {
	require('header.php');
	echo '<div class="main-panel"><div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="card" style="padding: 20px;">';
	if (isset($_POST['name'])) {
		$sql = $conn->prepare('UPDATE staff_roles SET name=? WHERE id=?');
		$sql->bind_param('si', $_POST['name'], $_POST['id']);
		if ($sql->execute()) {
			echo 'Successfully changed role name: "' . $_POST['name'] . '"<br />If you are not redirected automatically, <a href="staff_roles.php">Click here.</a>
				<script>window.setTimeout(function () {document.location.href="staff_roles.php";}, 3000);</script>';
		}
	} else if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
		$sql = $conn->prepare("DELETE FROM `staff_roles` WHERE `id`=?");
		$sql->bind_param('i', $_GET['delete']);
		if ($sql->execute())
			exit('Successfully deleted department. <br />
				If you are not redirected automatically, <a href="staff_roles.php">Click here.</a>
				<script>window.setTimeout(function () {document.location.href="staff_roles.php";}, 3000);</script>');
		else
			exit('Something went wrong with the database.');
	} else if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$sql = $conn->prepare("SELECT name FROM staff_roles WHERE id=?");
		$sql->bind_param('i', $_GET['id']);
		$sql->execute();
		$sql->bind_result($name);
		if($sql->fetch()) { 
			echo '<h4 class="title">Edit Role</h4>' . PHP_EOL;
			echo '<form method="post" action="edit_role.php">' . PHP_EOL;
			echo 	'<div style="margin: 20px 0px;"><input class="form-control" type="text" name="name" id="name" placeholder="Role Name" value="' . $name . '"/></div>' . PHP_EOL;
			echo 	'<input type="hidden" name="id" value="' . $_GET['id'] . '" />' . PHP_EOL;
			echo 	'<input class="btn" type="submit" value="Submit" />' . PHP_EOL;
			echo '</form>' . PHP_EOL;
		}
	}
	echo '</div></div></div></div></div></div>';
	echo '    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>';
	require('footer.php');
} else {
	http_response_code(401);
	exit("Error (401): you are not authorized to access this page. (" . $_SESSION['id'] . ', ' . (new User($conn, $_SESSION['id']))->get_permissions() . ')');
}
?>