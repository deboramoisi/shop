<?php

	class ODetails {
		
		public $db = null;

		function __construct() {

			$this->db = new mysqli('localhost', 'root', '', 'proiect');

			if (mysqli_connect_errno()) {
				echo "ERROR: Nu s-a putut realiza conectarea cu BD.";
				exit;
			}

		}

		public function insertOrderDetail($order_id, $product_id, $quantity, $price, $order_nr, $discount = null) {

			if (isset($order_id, $product_id, $quantity, $price, $order_nr)) {

				$data = array('order_id' => $order_id, 
						'product_id' => $product_id, 
						'quantity' => $quantity, 
						'price' => $price, 
						'order_nr' => $order_nr, 
						'discount' => $discount);

				$sql = "INSERT INTO order_details (order_id, product_id, quantity, price, order_nr, discount) VALUES (:order_id, :product_id, :quantity, :price, :order_nr, :discount)";

				if ($stmt = $this->db->prepare($sql)) {
					$stmt->execute($data);
					$stmt->close();
					return true;
				}
				return false;
			}
			return false;
		}

	}

?>