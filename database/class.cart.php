<?php

	// php cart class
	class Cart {

		public $db = null;

		// Dependency Injection
		public function __construct(DBController $db) {

			if (!isset($db->conn)) return null;
			$this->db = $db;

		}

		// METODA  CARE INSEREAZA IN COS
		// setam default values
		public function insertIntoCart($params = null, $table = "cart") {

			// Daca avem o conexiune la baza de date 
			if ($this->db->conn != null) {
				// Daca s-au transmis parametrii necesari pentru table
				if ($params != null) {
					// returnam un string cu delimitatorul ',' intre coloanele tabelei cart cu fct implode pentru ca $params e un array 
					$columns = implode(',' , array_keys($params));

					// valorile coloanelor
					$values = implode(',' , array_values($params));

					// sql statement
					// formatare foarte usoara cu functia sprintf
					$sql_statement = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $columns, $values);
					
					// execute query
					$result = $this->db->conn->query($sql_statement);

					return $result;
				}

			}

		}


		// INSERAREA PROPRIU-ZISA IN COS CU ACTUALIZAREA CANTITATII PENTRU PRODUSELE EXISTENTE
		public function addToCart($user_id, $item_id, $quantity = 1) {

			if (isset($user_id) && isset($item_id)) {
				$params = array(
					"user_id" => $user_id,
					"item_id" => $item_id,
					"quantity" => $quantity
				);

				// Verificam daca produsul exista deja in cos pentru user-ul dat
				if ($cart_id = $this->verifyIfExists($user_id, $item_id)) {

					// preluam cantitatea veche
					$ex_quantity = $this->getQuantity($cart_id);

					// calculam cantitatea actuala
					$current_quantity = $ex_quantity + $quantity;

					// update cantitate existenta in cos
					$this->updateExistingProduct($cart_id, $current_quantity);

				// daca nu exista deja produsul respectiv in cos
				} else {
					// insert data into cart
					$result = $this->insertIntoCart($params);
				}

			}

			$this->cartItems($user_id);
		}

		// VERIFICAM DACA USER-UL ARE PRODUSUL DAT IN COS, RETURNAND CART_ID PENTRU PRODUSUL RESPECTIV
		public function verifyIfExists($user_id, $item_id) {

			$sql_statement = "SELECT cart_id FROM cart WHERE user_id = $user_id AND item_id = $item_id";

			$result = $this->db->conn->query($sql_statement);

			if ($result->num_rows == 1) {
				$row = $result->fetch_array();
				$cart_id = $row['cart_id'];
				return $cart_id;
			}

			return null;

		}


		// METODA PENTRU REALIZARE UPDATE A CANTITATII LA PRODUSUL EXISTENT
		public function updateExistingProduct($cart_id, $quantity) {

			$sql_update = "UPDATE cart SET quantity = ? WHERE cart_id = ?";

			if ($stmt = $this->db->conn->prepare($sql_update)) {
				$stmt->bind_param('ii', $quantity, $cart_id);
				$stmt->execute();
				$stmt->close();
				return true;
			}
			return false;

		}


		// GET QUANTITY
		public function getQuantity($cart_id) {
			
			$sql_statement = "SELECT quantity FROM cart WHERE cart_id = $cart_id";

			$result = $this->db->conn->query($sql_statement);

			if ($row = $result->fetch_assoc()) {
				return $row['quantity'];
			}
		}

		

		// RETURNEAZA TOATE PRODUSELE DIN COS ALE UNUI UTILIZATOR 
		public function getProductsByUserId($user_id) {

			$sql_statement = "SELECT * FROM cart WHERE user_id = $user_id";

			$resultArray = array();

			$result = $this->db->conn->query($sql_statement);

			if ($result) {
				return $result;
			}
			return false;

		}

		// NUMARUL DE PRODUSE DIN CART PT VARIABILA SESIUNE
		public function cartItems($user_id) {

			$cart_items = 0;
			$sql_statement = "SELECT quantity FROM cart WHERE user_id = $user_id";

			$result = $this->db->conn->query($sql_statement);

			while ($row = $result->fetch_assoc()) {
				$quantity = $row['quantity'];
				$cart_items += $quantity;
			}

			$_SESSION['nr_items'] = $cart_items;

		}

		// STERGE UN ANUMIT PRODUS CORESPUNZATOR UNUI CART_ID
		public function deleteProductFromCart($cart_id) {

			$sql_statement = "DELETE FROM cart WHERE cart_id = $cart_id";

			$result = $this->db->conn->query($sql_statement);

			if ($result) {
				echo "<p class='text-black bold font-size-20 m-3' style='background:red'>Item deleted successfully!</p>";
			}
			else {
				echo 'ERROR';
			}

			$this->setSessionVars();

		}

		public function deleteProductsUser($user_id) {
			
			$sql = "DELETE FROM cart WHERE user_id = $user_id";
			$result = $this->db->conn->query($sql);
			if($result) {
				return true;
			} 
			return false;

		}

		public function setSessionVars() {
			if ($_SESSION['nr_items'] == 0) {
				$_SESSION['total'] = 0;
				$_SESSION['total_total'] = 0;
			}
		}


	}

?>