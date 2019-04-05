<?php
// Database
require_once( '../includes/db_connection.php');


class Validations {
	public static function email($var, $email=null) {
		if (!is_null($email))
			return array_key_exists($email, $var) && Validations::email($var[$email]);
		return isset($var) && !empty($var);
	}

	public static function string($var, $str = null) {
		if (!is_null($str))
			return array_key_exists($str, $var) && Validations::string($var[$str]);
		return isset($var) && !empty($var) && is_string($var);

	}

	public static function department($id) {
		global $conn;
		if (is_null($id) || !is_numeric($id)) {
			return false;
		}

		$departments_query = $conn->prepare("SELECT * FROM departments WHERE id=?");
		$departments_query->bind_param('i', $id);
		$departments_query->execute();
		if ($departments_query->fetch())
			return true;
		return false;
	}

	public static function division($id) {
		global $conn;
		if (is_null($id) || !is_numeric($id)) {
			return false;
		}

		$division = $conn->prepare("SELECT * FROM division WHERE id=?");
		$division->bind_param('i', $id);
		$division->execute();
		if ($division->fetch())
			return true;
		return false;
	}

	public static function role($id) {
		global $conn;
		if (is_null($id) || !is_numeric($id)) {
			return false;
		}

		$roles_query = $conn->prepare("SELECT * FROM staff_roles WHERE id=?");
		$roles_query->bind_param('i', $id);
		$roles_query->execute();
		if ($roles_query->fetch())
			return true;
		return false;
	}

	public static function phone_number($var, $str) {
		return preg_match("/\+?(\d{0,2})[^\d]{0,3}(\d{3})[^\d]{0,3}(\d{3})[^\d]{0,3}(\d{4})/i", $var[$str]);
	}
}
?>