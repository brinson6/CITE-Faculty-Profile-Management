<?php
	require_once('db_connection.php');
	require_once('degree.php');
	

	class Staff {
		private $id;
		private $email;
		private $name;
		private $l_name;
		private $image;
		private $conn;
		private $phone;
		private $department_id;
		private $division_id;
		private $password;
		private $role_id;
		private $status;
		private $office;
		private $department;
		
		public function __construct(&$conn, $staff_id = null) {
			if (!is_null($staff_id)) {
				if (!is_numeric($staff_id))
				throw new Exception('Invalid staff ID: ' . htmlspecialchars($staff_id));

				$this->conn = $conn;
			
				$sql = "SELECT staff.*, departments.name AS department FROM staff INNER JOIN departments WHERE staff.id='$staff_id' AND staff.department_id = departments.id";
				$result = $conn->query($sql);
				if ($result && $result->num_rows > 0) {
					$row = $result->fetch_object();

					$this->id = $row->id;
					$this->email = $row->email;
					$this->name = $row->name;
					$this->l_name = $row->l_name;
					$this->image = $row->image;
					$this->role_id = $row->role;
					$this->phone = $row->phone;
					$this->department_id = $row->department_id;
					$this->division_id = $row->division_id;
					$this->password = $row->password;
					$this->office = $row->office;
					$this->status = $row->status == '0' ? false : true;
					$this->department = $row->department;
				} else throw new Exception("Malformed sql query: cannot find staff member in database.");
			} else {
				$this->conn = &$conn;
				// don't worry about anything. The programmer will fill out the necessary fields.
			}
		}

		public function get_division() {
			return $this->division_id;
		}

		public function has_complete_profile() {
			return $this->id && $this->email && $this->name && $this->l_name;
		}

		public function set_department($department_id) {
			if (is_numeric($department_id)) {
				$this->department_id = intval($department_id);
				$result = $this->conn->query('SELECT name FROM departments WHERE id="' . $department_id . '"');
				if ($result) {
					$this->department = $result->fetch_object()->name;
				}

				return true;
			}

			return false;
		}

		public function set_division($division_id) {
			if (is_numeric($division_id)) {
				$this->division_id = intval($division_id);

			}
		}

		public function set_office_address($office_address) {
			$this->office = $office_address;
		}

		public function set_phone($phone_num) {
			$this->phone = $phone_num;
		}

		public function get_division_id() {
			return $this->division_id;
		}

		public function get_department_id() {
			return $this->department_id;
		}


		public function get_department() {
			return $this->department;
		}

		public function set_role($role_id) {
			if (is_numeric($role_id))
				$this->role_id = intval($role_id);
		}

		public function set_password($password) {
			$this->password = password_hash($password, PASSWORD_BCRYPT);
		}

		public function add_degree($degree, $num) {
			$id = $this->get_id();
			$sql = $this->conn->prepare("SELECT count(name) as has_record FROM education_records WHERE staff_id=? AND record=?");
			$sql->bind_param('ii', $id, $num);
			$sql->execute();
			$sql->bind_result($has_record);
			$sql->fetch();
			$sql->close();
			if ($has_record) {
				$sql = $this->conn->prepare('UPDATE education_records SET name=?, school=?, year=? WHERE staff_id=? AND record=?');
			} else {
				$sql = $this->conn->prepare('INSERT INTO education_records (name, school, year, staff_id, record) VALUES (?, ?, ?, ?, ?)');
			}
			$sql->bind_param('ssiii', $degree['name'], $degree['school'], $degree['year'], $id, $num);
			return $sql->execute();
		}

		public function get_degree($num = false) {
			$id = $this->get_id();
			$degree = array(1 => array('name' => '', 'school' => '', 'year' => ''));
			$degree[2] = $degree[1];
			$degree[3] = $degree[2];
			if (is_numeric($num)) {
				$sql = $this->conn->prepare('SELECT name, school, year, record FROM education_records WHERE staff_id=? AND record=?');
				$sql->bind_param('ii', $id, $num);
			} else {
				$sql = $this->conn->prepare('SELECT name, school, year, record FROM education_records WHERE staff_id=? ORDER BY record ASC LIMIT 3');
				$sql->bind_param('i', $id);
			}

			$sql->execute();
			$sql->bind_result($name, $school, $year, $record);
			if ($num) {
				if ($sql->fetch()) {
					return array('name' => $name, 'school' => $school, 'year' => $year);
				} else {
					return $degree[1];
				}
			}
			while($sql->fetch()) {
				$degree[$record] = array('name' => $name, 'school' => $school, 'year' => $year);
			}
			$sql->close();

			return $degree;
		}

		public function add_record() {
			$sql = sprintf("INSERT INTO staff (name, l_name, image, email, department_id, password, role, phone, office, division_id) VALUES ('%1\$s', '%2\$s', '%3\$s', '%4\$s', '%5\$d', '%6\$s', '%7\$d', '%8\$s', '%9\$s', '%10\$s')",
				$this->conn->real_escape_string($this->name),
				$this->conn->real_escape_string($this->l_name),
				$this->conn->real_escape_string($this->image),
				$this->conn->real_escape_string($this->email),
				$this->department_id,
				$this->conn->real_escape_string($this->password),
				$this->role_id,
				$this->conn->real_escape_string($this->phone),
				$this->conn->real_escape_string($this->office),
				$this->division_id );
			$result = $this->conn->query($sql);
			return $result;
		}

		public function save_record() {
			$sql = sprintf(" UPDATE staff SET  
					name = '%1\$s',
					l_name = '%2\$s',
					image = '%3\$s',
					email = '%4\$s',
					department_id = '%5\$d',
					password = '%6\$s',
					role = '%7\$d',
					phone = '%8\$s',
					office = '%9\$s',
					division_id = '%10\$d' WHERE email = '%4\$s'",
				$this->conn->real_escape_string($this->name),
				$this->conn->real_escape_string($this->l_name),
				$this->conn->real_escape_string($this->image),
				$this->conn->real_escape_string($this->email),
				$this->department_id,
				$this->conn->real_escape_string($this->password),
				$this->role_id,
				$this->conn->real_escape_string($this->phone),
				$this->conn->real_escape_string($this->office),
				$this->division_id);
			file_put_contents('dump.txt', $sql);
			$result = $this->conn->query($sql);
			return $result;
		}

		public function validate_password($pass_str) {
			return password_verify($pass_str, $password);
		}

		public static function list_staff($conn) {
			$arr = array();
			$result = $conn->query("SELECT id FROM staff");
			while($r = $result->fetch_object()) {
				$arr[] = new Staff($conn, $r->id);
				// do nothing
			}

			return $arr;
		}

		public static function query_department($conn, $id) {
			$result = $conn->query("SELECT name FROM departments WHERE id=$id");
			if ($result) {
				return $result->fetch_object()->name;
			}
			return 0;
		}

		public function is_active() {
			return $this->status;
		}
	
		public function get_degrees() {
			if (!isset($this->degrees)) {
				$this->degrees = Degree::get_degrees($this->conn, $this->get_id());
			}

			return $this->degrees;
		}
		
		public function get_id() {
			if (!$this->id) {
				try {
					$this->id = $this->conn->query("SELECT id FROM staff WHERE email='{$this->email}'")->fetch_object()->id;
				} catch (Exception $e) {
					return 0;
				}
			}
			return $this->id;
		}
		
		public function get_email($safe = false) {
			return $safe ? htmlentities($this->email) : $this->email;
		}
		
		public function set_email($email) {
			if (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i', $email)) {
				$this->email = $email;
				return true;
			}
			
			return false;
		}

		public function get_office_address() {
			return $this->office;
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
		
		public function get_image() {
			return $this->image;
		}
		
		public function set_image($image_link) {
			$this->image = $image_link;
		}

		public function get_role_id() {
			return $this->role_id;
		}

		public function get_role($safe = false) {
			$sql = 'SELECT name FROM staff_roles WHERE id=' . $this->get_role_id();
			$result = $this->conn->query($sql);
			if ($result) {
				$result = $result->fetch_object();
				return $safe ? htmlentities($result->name) : $result->name; 
			}
			file_put_contents('dump.txt', $sql);
			return null;
		}
		
		public function get_employment_begin() {
			return $this->employment_begin;
		}

		public function get_phone() {
			return $this->phone;
		}
		
		public function set_employment_begin($date_time) {
			$this->employment_begin = $date_time;
		}
		
	}
?>