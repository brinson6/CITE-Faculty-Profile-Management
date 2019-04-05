<?php
	require_once('db_connection.php');
	require_once('degree.php');
	

	class User {
		private $id;
		private $email;
		private $name;
		private $l_name;
		private $division;
		private $password;
		private $image;
		private $phone;
		private $office_address;
		private $designation;
		private $overview;
		private $degrees;
		private $status;
		private $permissions;
		private $division_id;
		private $conn;
		
		public function __construct($conn, $user_id) {
			if (!is_numeric($user_id))
				throw new Exception('Invalid user ID: ' . htmlspecialchars($user_id));
			
			$sql = "SELECT * FROM `faculty_member` WHERE `id`='$user_id'";
			$this->conn = $conn;
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();

			$this->id = $row['id'];
			$this->email = $row['email'];
			$this->name = $row['name'];
			$this->l_name = $row['l_name'];
			$this->division = trim($row['division']);
			$this->password = $row['password'];
			$this->image = $row['image'];
			$this->phone = $row['phone'];
			$this->office_address = $row['office_address'];
			$this->designation = $row['designation'];
			$this->overview = $row['overview'];
			$this->degrees = array(
				($row['degree1'] ? new Degree($row['degree1'], $row['degree1_school'], $row['degree1_year']) : new Degree('', '', '')),
				($row['degree2'] ? new Degree($row['degree2'], $row['degree2_school'], $row['degree2_year']) : new Degree('', '', '')),
				($row['degree3'] ? new Degree($row['degree3'], $row['degree3_school'], $row['degree3_year']) : new Degree('', '', ''))
			);
			$this->status = $row['status'];
			$this->permissions = $row['permissions'];
		}

		public function has_complete_profile() {
			return $this->id > 0 && !empty($this->email) && !empty($this->name) && !empty($this->l_name) && !empty($this->division)
				&& !empty($this->password) && !empty($this->image) && !empty($this->phone) && !empty($this->office_address)
				&& !empty($this->designation) && !empty($this->overview) && !empty($this->degrees);
		}
		
		public function authenticate($password) {
			return base64_encode($password) == $this->password;
		}
		
		public function can_edit($division_id) {
			// user is a system administrator
			if ($this->permissions > 2)
				return true;
			
			// user is a department chair
			if ($this->permissions > 1)
				return $this->get_division_id() == $division_id;
			
			// user is faculty, regular access, or banned
			return false;
		}
		
		public function get_division_id() {
			if (isset($this->division_id)) 
				return $this->division_id;

			$sql = "SELECT `divisionId` FROM `division` WHERE `divisionName`='$division'";
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			return $this->division_id = intval($row['divisionId']);
		}
		
		public function get_id() {
			return $this->id;
		}
		
		public function set_id($id) {
			if (is_numeric($id)) {
				$this->id = $id;
				return true;
			}
			
			return false;
		}
		
		public function get_email($safe = false) {
			return $safe ? htmlentities($this->email) : $this->email;
		}
		
		public function set_email($email) {
			if (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/', $email)) {
				$this->email = $email;
				return true;
			}
			
			return false;
		}
		
		public function get_name($safe = false) {
			return $safe ? htmlentities($this->name) : $this->name;
		}
		
		public function set_name($name) {
			$this->name = $name;
		}
		
		public function get_last_name() {
			return $this->l_name;
		}
		
		public function set_last_name($l_name) {
			$this->l_name = $l_name;
		}
		
		public function get_division($safe = false) {
			return $safe ? htmlentities($this->division) : $this->division;
		}
		
		public function set_division($division) {
			$this->division = $division;
		}
		
		public function get_image() {
			return $this->image;
		}
		
		public function set_image($image_link) {
			$this->image = $image_link;
		}
		
		public function get_phone() {
			return $this->phone;
		}
		
		public function set_phone($phone) {
			$this->phone = $phone;
		}
		
		public function get_office_address() {
			return $this->office_address;
		}
		
		public function set_office_address($address) {
			$this->office_address = $address;
		}
		
		public function get_designation() {
			return $this->designation;
		}
		
		public function set_designation($designation) {
			$this->designation = $designation;
		}
		
		public function get_overview() {
			return $this->overview;
		}
		
		public function set_overview($overview) {
			$this->overview = $overview;
		}
		
		public function get_degree($degree_id) {
			if (!is_numeric($degree_id)) 
				throw new Exception ("Degree ID required for function User::get_degree");
			
			if ($degree_id > 0) {
				$degree_id--;
			}
			
			if ($degree_id < 0 || $degree_id > 2)
				throw new Exception("Invalid degree in User::get_degree (degree #" . ($degree_id + 1) . ")");
			
			return $this->degrees[$degree_id];
		}
		
		public function set_degree($degree_name, $degree_school, $degree_year, $degree_id) {
			if (!is_numeric($degree_id)) 
				throw new Exception ("Degree ID required for function User::set_degree");
			
			if ($degree_id > 0) {
				$degree_id--;
			}
			
			if ($degree_id < 0 || $degree_id > 2)
				throw new Exception("Invalid degree in User::set_degree (degree #" . ($degree_id + 1) . ")");
			
			$this->degrees[$degree_id] = new Degree($degree_name, $degree_school, $degree_year);
		}
		
		public function get_status() {
			return $this->status;
		}
		
		public function set_status($status) {
			$this->status = $status;
		}
		
		public function get_permissions() {
			return $this->permissions;
		}
		
		public function set_permissions($permissions) {
			$this->permissions = $permissions;
		}
		
		public function has_degrees() {
			return !empty($this->degrees);
		}
		
		public function commit_record() {
			$sql = "UPDATE `faculty_member` SET
				`email`='" . $this->conn->real_escape_string($this->get_email()) . "',
				`name`='" . $this->conn->real_escape_string($this->get_name()) . "',
				`l_name`='" . $this->conn->real_escape_string($this->get_last_name()) . "',
				`division`='" . $this->conn->real_escape_string($this->get_division()) . "',
				`password`='" . $this->conn->real_escape_string($this->password) . "',
				`image`='" . $this->conn->real_escape_string($this->get_image()) . "',
				`phone`='" . $this->conn->real_escape_string($this->get_phone()) . "',
				`office_address`='" . $this->conn->real_escape_string($this->get_office_address()) . "',
				`designation`='" . $this->conn->real_escape_string($this->get_designation()) . "',
				`degree1`='" . $this->conn->real_escape_string($this->get_degree(1)->name) . "',
				`degree2`='" . $this->conn->real_escape_string($this->get_degree(2)->name) . "',
				`degree3`='" . $this->conn->real_escape_string($this->get_degree(3)->name) . "',
				`degree1_school`='" . $this->conn->real_escape_string($this->get_degree(1)->school) . "',
				`degree2_school`='" . $this->conn->real_escape_string($this->get_degree(2)->school) . "',
				`degree3_school`='" . $this->conn->real_escape_string($this->get_degree(3)->school) . "',
				`degree1_year`='" . $this->conn->real_escape_string($this->get_degree(1)->year) . "',
				`degree2_year`='" . $this->conn->real_escape_string($this->get_degree(2)->year) . "',
				`degree3_year`='" . $this->conn->real_escape_string($this->get_degree(3)->year) . "',
				`status`='" . $this->conn->real_escape_string($this->get_status()) . "',
				`permissions`='" . $this->conn->real_escape_string($this->get_permissions()) . "',
				`overview`='" . $this->conn->real_escape_string($this->get_overview()) . "'
				WHERE `id`='" . $this->get_id() . "'";
				
			return $this->conn->query($sql) === true;
		
		}
	}
?>