<style type="text/css">
.panel {
    border: 1px solid #d8d8d8;
    margin: 20px 10px;
    padding: 1.25rem;
    background: #f2f2f2;
        width: 298px;
    height: 158px;
    font-weight: normal;
}

h1, h2, h3, h4, h5, h6, body, p, a, span {
    font-family: "'Open Sans'","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-weight: normal;
}

.panel h6 {
	    line-height: 1;
    margin-bottom: 0.625rem;
    font-size: 13px;
    color: #333;
}

div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, p, blockquote, th, td {
    margin: 0;
    padding: 0;
}

.name {
	box-sizing: border-box;
	font-size: 14px;
	line-height: 1;
	margin-block-start: 5px;
    margin-block-end: 15px;
    font-weight: normal;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}

.thumbnail {
	max-width: 90px;
	max-height: 125px;
	margin: 5px 15px 5px 5px;
}

.image-container {
	height: 135px;
	width: 110px;
	padding: 0px;
	float:left;
}

.heading.shadow {
	    font-size: 1.6875rem;
	    line-height: 1.4;
}
.division-divider {
	display: flex;
	justify-content: left;
	flex-wrap: wrap;
}

.adjunct-bridge {
	line-height: 1.4;
	font-size: 1.125rem;
}
</style>
<div class="faculty-container">
<?php

require_once( '../includes/db_connection.php');
require_once( '../includes/user.php');

$cards = '';

$result = $conn->query('SELECT * FROM division');
if ($result) {
	while($division = $result->fetch_object()) {
		$staff_members = $conn->query('SELECT id FROM faculty_member WHERE division="' . $division->divisionName . '" AND (IFNULL(designation, "")="" OR designation NOT LIKE "Adjunct%") ORDER BY permissions DESC, l_name ASC');
		$cards .= '<h3 class="heading shadow">Weisberg Division of ' . $division->divisionName . '</h3><div class="division-divider">';
		while($staff_member = $staff_members->fetch_object()) {
			$id = $staff_member->id;
			$cards .= (new User($conn, $id))->make_card(isset($_GET['strict']));
		}

		$staff_members = $conn->query('SELECT id FROM faculty_member WHERE division="' . $division->divisionName . '" and designation LIKE "Adjunct%"');
		if ($staff_member = $staff_members->fetch_object()) {
			$cards .= '</div><h5 class="adjunct-bridge">Adjunct Faculty</h5><br /><div class="division-divider">';
			do {
				$id = $staff_member->id;
				$cards .= (new User($conn, $id))->make_card(isset($_GET['strict']));
			} while($staff_member = $staff_members->fetch_object());
		}
		$cards .= "</div>";
	}
}

echo $cards;


?>
</div>