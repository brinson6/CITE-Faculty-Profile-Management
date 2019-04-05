<?php
class Degree {
	public $name;
	public $year;
	public $school;
	
	public function __construct($name, $school, $year) {
		$this->name = $name;
		$this->school = $school;
		$this->year = $year;
	}

	public static function get_degrees($conn, $id, $staff = true) {
		$staff = $staff ? 'staff_id' : 'faculty_id';

		$sql = "SELECT * FROM education_records WHERE staff_id='" . intval($id) . "' ORDER BY year";
		$result = $conn->query($sql);
		$deg_arr = array();

		while($degree_info = $result->fetch_object()) {
			array_push($deg_arr, new Degree($degree_info->name, $degree_info->school, $degree_info->year));
		}

		return $deg_arr;
	}
	
	public function enumerated_array() {
		return array($this->name, $this->school, $this->year);
	}
}
?>