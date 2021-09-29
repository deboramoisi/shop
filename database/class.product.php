<?php
	
	class Product {

		public $db = null;

		function __construct(DBController $db) {
			
			if (!isset($db->conn)) 	return null;
			$this->db = $db;
		}

		// Get all data
		public function getData($table = "products") {

			$sql_statement = "SELECT * FROM $table";

			$result = $this->db->conn->query($sql_statement);

			// fetch product data one by one
			if ($result->num_rows > 0) {
				return $result;
			}
			return false;
		}

		// Get Category name
		public function getCategoryName() {

			$sql_statement = "SELECT DISTINCT category FROM products";
			$result = $this->db->conn->query($sql_statement);

			if ($result->num_rows > 0) {
				return $result;
			}
			return false;
		}

		// Get the latest products inserted
		public function mostRecentData() {
			$sql_statement = "SELECT * FROM products ORDER BY id DESC LIMIT 10";
			$result = $this->db->conn->query($sql_statement);
			if ($result->num_rows > 0) {
				return $result;
			}
			return $false;
		}

		// Product by Id
		public function getProductById($id, $table = 'products') {

			$sql_statement = "SELECT * FROM $table WHERE id = $id";

			$result = $this->db->conn->query($sql_statement);

			if ($result->num_rows == 1) {
				return $result->fetch_array();
			}
			return false;
		}

		// Products by Category
		public function getProductsByCategory($category) {


			$sql_statement = "SELECT * FROM products WHERE category = '$category'";
			$result = $this->db->conn->query($sql_statement);

			$returnSet = array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$returnSet[] = $row;
				}
				return $result;
			}
			return false;
		}

		// Toate produsele adaugate in cos de catre un user dat
		public function getCartElementsForUser($user_id) {

			$sql_statement = "SELECT products.name AS name, products.image AS image, products.price AS price, cart.cart_id AS cart_id, cart.quantity AS quantity 
				FROM cart JOIN products 
				ON cart.item_id = products.id WHERE cart.user_id = $user_id";

			$result = $this->db->conn->query($sql_statement);

			if($result) {
				return $result;
			}
			return false;
		}

		// Update cart for users
		public function updateCartElementsForUser($user_id, $cart_id, $quantity) {

			$sql_statement = "UPDATE cart SET quantity = ? WHERE cart_id = ? AND user_id = ?";

			if (isset($user_id, $cart_id, $quantity)) {

				if ($stmt = $this->db->conn->prepare($sql_statement)) {

					$stmt->bind_param('iii', $quantity, $cart_id, $quantity);
					$stmt->execute();
					$stmt->close();
					return true;
				}

			}
			return false;
		}
		

		// insert new product by admin
		public function insertProduct($name, $category, $quantity, $gramaj = null, $description = null, $prop_car = null, $image, $price) {

			$sql_statement = "INSERT INTO products (name, category, quantity, gramaj, description, prop_car, image, price) VALUES (?,?,?,?,?,?,?,?)";

			if (isset($name, $category, $quantity, $description, $image, $price)) {

				if ($stmt = $this->db->conn->prepare($sql_statement)) {

					$stmt->bind_param('ssiisssi', $name, $category, $quantity, $gramaj, $description, $prop_car, $image, $price);

					$stmt->execute();
					$stmt->close();
					return true;
				} else {
					echo "<div class='text-danger'>Nu s-a putut realiza inserarea in baza de date!</div>";
					return false;
				}

			} 
			return false;
		}

		// update existing product by admin
		public function updateProduct($id, $name, $category, $quantity, $gramaj = null, $description = null, $prop_car = null, $image, $price) {

			$sql_statement = "UPDATE products SET name = ?, category = ?, quantity = ?, gramaj = ?, description = ?, prop_car = ?, image = ?, price = ? WHERE id = $id";

			if (isset($name, $category, $quantity, $description, $image, $price)) {

				if ($stmt = $this->db->conn->prepare($sql_statement)) {

					$stmt->bind_param('ssiisssi', $name, $category, $quantity, $gramaj, $description, $prop_car, $image, $price);

					$stmt->execute();
					$stmt->close();
					return true;
				} else {
					echo "<div class='text-danger'>Nu s-a putut realiza modificarea produsului in baza de date!</div>";
					return false;
				}

			} 
			return false;
		}

		// delete existing product by admin
		public function deleteProduct($id) {

			$sql_statement = "DELETE FROM  products WHERE id = $id";

			if ($result = $this->db->conn->query($sql_statement)) {
				return true;
			} else {
				echo "<div class='text-danger'>Nu s-a putut realiza modificarea produsului in baza de date!</div>";
					return false;
			}
				
		}


	}

?>