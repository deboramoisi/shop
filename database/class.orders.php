<?php

	class Orders {

		public $db = null;

		function __construct() {

			$this->db = new mysqli('localhost', 'root', '', 'proiect');

			if (mysqli_connect_errno()) {
				echo "ERROR: Nu s-a putut realiza conectarea cu BD.";
				exit;
			}
		
		}

		public function getOrdersForUser($user_id) {
			$sql = "SELECT * FROM orders_history WHERE user_id = $user_id";
			$result = $this->db->query($sql);
			if($result) {
				return $result;
			}
			return false;
		}

		public function insertOrder($user_id, $order_nr, $total) {

			if(isset($user_id, $order_nr, $total)) {

				$sql = "INSERT INTO orders_history (user_id, order_nr, total) VALUES (?,?,?)";

				if ($stmt = $this->db->prepare($sql)) {
					$stmt->bind_param('iid', $user_id, $order_nr, $total);
					$stmt->execute();
					$stmt->close();
					return true;
				}
			}
			return false;
		}

	}

?>