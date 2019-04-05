<?php
require_once('db_connection.php');

class Role {
	public $name;
	public $id;

	function __construct($id) {
		$this->id = $id;
		$this->name = get_role($id);
	}

	public static function get_role($id = false) {
		$query = $conn->prepare('SELECT name FROM staff_roles WHERE id=?');
		$query->bind_param('i', $id);
		if ($query->execute()) {
			$role_name = '';
			$query->bind_result($role_name);
			if (!empty($role_name))
				return array($id => $role_name);
		}

		return array();
	}
}
?>