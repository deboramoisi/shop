<?php 

	Class User {

		public $db;

		public function __construct() {
			$this->db = new mysqli('localhost', 'root', '', 'proiect');

			if (mysqli_connect_errno()) {
				echo "ERROR: Nu s-a putut realiza conectarea cu BD.";
				exit;
			}
		}

		// REGISTER
		public function register_user($username, $lname, $fname, $email, $password, $address = null, $phone = null) {

			$password = md5($password);

			$sql_check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

			$check = $this->db->query($sql_check);

			$row_count = $check->num_rows;

			if ($row_count == 0) {

				$sql_insert = "INSERT INTO users (username, last_name, first_name, email, password, address, phone) VALUES (?,?,?,?,?,?,?)";

				if ($stmt = $this->db->prepare($sql_insert)) {
					$stmt->bind_param('sssssss', $username, $lname, $fname, $email, $password, $address, $phone);
					$stmt->execute();
					$stmt->close();

					return true;
				}
				else {
					echo 'Nu s-a putut realiza inregistrarea deoarece s-a produs o eroare. Va rugam reincercati!';
				} 
			}
			return false;
		}

		// LOGIN
		public function login_user($emailusername, $password) {
			// criptam parola
			$password = md5($password);

			$sql_find = "SELECT * FROM users WHERE username = '$emailusername' OR email = '$emailusername' AND password = '$password'";

			$result = $this->db->query($sql_find);

			$row = $result->fetch_array();

			$row_count = $result->num_rows;

			if ($row_count == 1) {
				// Conectare reusita
				$_SESSION['login'] = true;
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				return true;
			} else {
				return false;
			}

		}

		// Return SESSION
		public function get_session() {
			return $_SESSION['login'];
		}

		// LOGOUT
		public function logout() {
			$_SESSION['login'] = false;
			session_destroy();
		}

		// get all users 
		public function getUsers() {

			$sql_statement = "SELECT * FROM users";
			$result = $this->db->query($sql_statement);
			return $result;

		}

		// get User by Id 
		public function getUser($id) {
			$sql = "SELECT * FROM users WHERE id = $id";
			$result = $this->db->query($sql);
			if ($result->num_rows == 1) {
				return $result->fetch_assoc();
			}
			return false;
		}

		// delete user
		public function deleteUser($id) {
			if (isset($id)) {
				$sql = "DELETE FROM users WHERE id = $id";
				$result = $this->db->query($sql);
				if ($result) {
					return true;
				}
			}
			return false;
		}

		// Editare user de catre administrator
		public function updateUser($id, $username, $last_name, $first_name, $email, $password, $address = null, $phone = null) {

			$sql_statement = "SELECT * FROM users WHERE id = $id";

			if ($this->db->query($sql_statement)->num_rows == 1) {
				
				if (isset($username, $last_name, $first_name, $email, $password)) {
					$password = md5($password);

					$sql_statement = "UPDATE users SET username = ?, last_name = ?, first_name = ?, email = ?, password = ?, address = ?, phone = ? WHERE id = ?";

					if ($stmt = $this->db->prepare($sql_statement)) {
						$stmt->bind_param('sssssssi', $username, $last_name, $first_name, $email, $password, $address, $phone, $id);
						$stmt->execute();
						$stmt->close();
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			}

		}

		// Update adresa de livrare
		public function updateAddress($id, $address) {
			
			if (isset($id, $address)) {
				$sql = "UPDATE users SET address = ? WHERE id = ?";

				if (isset($id, $address)) {
					if ($stmt = $this->db->prepare($sql)) {
						$stmt->bind_param('si', $address, $id);
						$stmt->execute();
						$stmt->close();
						return true;
					}
				}
			}

			return false;
		}


	}

?>