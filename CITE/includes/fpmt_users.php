<?php

/*
Hosted Server Name: 50.62.160.155
Username: test_acc
Passs: Test@123
Port: 21
*/

/*Newly Hosted GoDaddy Credentials for MYSQL 
$servername = "50.62.209.72";
$username = "MarshallFPMT";
$password = "Marshall.FPMT123";
*/

/*
$servername = "50.62.209.41";

$username = "MarshallFPMT";
$password = "Marshall.FPMT123";
*/

	require_once('degree.php');
	

	class User {
		private $id;
		private $email;
		private $first_name;
		private $last_name;
		private $password;
		private $image;
		private $phone;
		private $office;
		private $education;
		private $status;
		private $permissions;
		private $title;
		private $division_id;
		private $division;
		private $conn;
		
		public function __construct(&$conn, $user_id) {
			if (!is_numeric($user_id))
				throw new Exception('Invalid user ID: ' . htmlspecialchars($user_id));
			
			$this->conn = &$conn;

			$stmt = $conn->prepare("SELECT `id`,`email`,`first_name`,`last_name`,`password`,`image`,`phone`,`office`,`education`,`status`,`permissions`,`title`,`division_id`,`division`.`name` AS `division` FROM `users` INNER JOIN `divisions` WHERE `id`=? AND `users`.`division_id`=`divisions`.`id`");
			$stmt->bind_param('s', $user_id);
			$stmt->execute();
			$stmt->bind_result($this->id, $this->email, $this->first_name, $this->last_name, $this->password, $this->image, $this->phone, $this->office, $this->education, $this->status, $this->permissions, $this->title, $this->division_id, $this->division);
			$stmt->fetch();

		}

		public function authenticate($password) {
			return password_verify($password, $this->password);
		}
		
		public function can_edit($division_id) {
			// user is a system administrator
			if ($this->permissions > 2)
				return true;
			
			// user is a department chair or dean
			if ($this->permissions >= 1)
				return $this->get_division_id() == $division_id;
			
			// user is faculty, regular access, or banned
			return false;
		}
		
		public function get_division() {
			if (isset($this->division))
				return $this->division;

			return null;
		}
		
		public function get_id() {
			return $this->id;
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
			return $sfae ? htmlentities($this->first_name . ' ' . $this->last_name) : $this->first_name . ' ' . $this->last_name;
		}
		
		public function get_first_name($safe = false) {
			return $safe ? htmlentities($this->first_name) : $this->first_name;
		}
		
		public function set_first_name($name) {
			$this->first_name = $name;
		}
		
		public function get_last_name() {
			return $this->last_name;
		}
		
		public function set_last_name($l_name) {
			$this->last_name = $l_name;
		}
		
		public function get_division($safe = false) {
			return $safe ? htmlentities($this->division) : $this->division;
		}
		
		public function set_division_id($division) {
			$this->division_id = $division;
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
		
		public function get_office($safe = false) {
			return $safe ? htmlentities($this->office) : $this->office;
		}
		
		public function set_office($address) {
			$this->office = $address;
		}
		
		public function get_designation($safe = false) {
			return $safe ? htmlentities($this->designation) : $this->designation;
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
		
		public function update() {
			$stmt = $this->conn->prepare("UPDATE `users` SET `email`=?,
				`first_name`=?, 
				`last_name`=?, 
				`division`=?,
				`password`=?, 
				`image`=?, 
				`phone`=?, 
				`office`=?, 
				`status`=?, 
				`permissions`=?");
			$stmt->bind_param('sssissssii', $this->get_email(), 
				$this->get_first_name(),
				$this->get_last_name(), 
				$this->get_division_id(), 
				$this->password,
				$this->image, 
				$this->get_phone(), 
				$this->get_office(),
				$this->get_status(), 
				$this->get_permissions());
			return $stmt->execute();
		}

		public function update_new() {
			$stmt = $this->conn->prepare("INSERT INTO `users` (`email`, 
				`first_name`, 
				`last_name`, 
				`division`, 
				`password`, 
				`image`, 
				`phone`,
				`office`, 
				`status`,
				`permissions`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('sssissssii', $this->get_email(), 
				$this->get_first_name(), 
				$this->get_last_name(), 
				$this->get_division_id(), 
				$this->password, 
				$this->image, 
				$this->get_phone(), 
				$this->get_office(), 
				$this->get_status(), 
				$this->get_permissions());
			return $stmt->execute();
		}

		function make_card() {

			$image_tag = '';
			if (!empty($this->get_image())) $image_tag = '
				<div style="float: left;" class="image-container">
					<img class="photo thumbnail" src="%s" alt="Photo: %1$s %2$s" />
				</div>';
			$str = sprintf('
			<div class="panel radius">
				<h5 class="name" style="color: #800000;">
					%s %s%s
				</h5>
				' . ($image_tag ? $image_tag : '<!-- %s -->') . '
				<h6>%s</h6>
				%s
				%s
				<h6><a href="mailto:%s" style="color: #04954A; text-decoration: none;">Email</a></h6>
				<h6><a href="%s" style="color: #04954A; text-decoration: none;">Webpage</a></h6>
			</div>', $this->get_name(), trim($this->get_last_name()), empty($this->title) ? '' : ', ' . $this->title, $this->get_image(), $this->get_designation(), empty($this->get_office_address()) ? '' : '<h6>Office: ' . $this->get_office_address() . '</h6>', empty($this->get_phone()) ? '' : '<h6>Phone: ' . $this->get_phone() . '</h6>', $this->get_email(), '/cite/faculty.php?id=' . $this->get_id());
			return $str;
		}
	}

class MarshallFPMT {
	public static $db = null;

	public static make_staff_member($id) {
		// ensure the database is connected before continuing
		if (is_null(MarshallFPMT::$db)) {
			return null;
		}


	}
}


$servername = "127.0.0.1";
$username =  "root";
$password =  "Govind@123";


$dbname = "cite_test";
// Create connection
MarshallFPMT::$db = new mysqli($servername, $username, $password, $dbname );

// Check connection
if (MarshallFPMT::$db->connect_error) {
    die("Connection failed: " . MarshallFPMT::$db->connect_error);
}




?> 