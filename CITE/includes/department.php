<?php
require_once('db_connection.php');

class Department {
	public $name;
	public $id;

	function __construct($id) {
		$this->id = $id;
		$this->name = get_department($id);
	}

	public static function get_department($id = false) {
		$query = $conn->prepare('SELECT name FROM departments WHERE id=?');
		$query->bind_param('i', $id);
		if ($query->execute()) {
			$department_name = '';
			$query->bind_result($department_name);
			if (!empty($department_name))
				return array($id => $department_name);
		}

		return array();
	}
}
?>