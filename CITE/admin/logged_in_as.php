<?php
require_once( '../includes/db_connection.php');
if ($_SESSION['table'] == 'staff')
	$sql_new = 'SELECT `name`,`l_name` FROM staff WHERE id=?';
else
	$sql_new = 'SELECT `name`,`l_name` FROM faculty_member WHERE id=?';
$result_new = $conn->prepare($sql_new);
if (!$conn->error) {
$result_new->bind_param('i', $_SESSION['id']);
$result_new->execute();
$row_new = array();
$result_new->bind_result($row_new['name'], $row_new['l_name']);
$result_new->fetch();
$result_new->close();
} else echo $conn->error;
  $_SESSION["profile_name"] = $row_new['name'].' '.$row_new['l_name'];
?>

					<li>
					<a>
					Logged in as <?php echo $_SESSION["profile_name"]; ?> 
					</a>
					</li>