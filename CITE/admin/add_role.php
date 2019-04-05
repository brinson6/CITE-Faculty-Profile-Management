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
		$sql = $conn->prepare('INSERT INTO staff_roles (name) VALUES (?)');
		$sql->bind_param('s', $_POST['name']);
		if ($sql->execute()) {
			echo 'Successfully added new role: "' . $_POST['name'] . '"<br />If you are not redirected automatically, <a href="staff_roles.php">Click here.</a><script>document.location.href="staff_roles.php";</script>';
		} else {
			echo 'That role is already in the database.';
		}
	} else if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
		$sql = $conn->prepare("DELETE FROM `staff_roles` WHERE `id`=?");
		$sql->bind_param('i', $_GET['id']);
		if ($sql->execute())
			exit('Successfully deleted role. <br />
				If you are not redirected automatically, <a href="staff_roles.php">Click here.</a>
				<script>document.location.href="staff_roles.php";</script>');
		else
			exit('Something went wrong with the database.');
	} else {
		echo '<h4 class="title">Add Role</h4>' . PHP_EOL;
		echo '<form method="post" action="add_role.php">' . PHP_EOL;
		echo 	'<div style="margin: 20px 0px;"><input class="form-control" type="text" name="name" id="name" placeholder="Role Name" /></div>' . PHP_EOL;
		echo 	'<input class="btn" type="submit" value="Submit" />' . PHP_EOL;
		echo '</form>' . PHP_EOL;
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