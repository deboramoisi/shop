<?php

	include_once 'Connection.php';

	class DBController {

		protected $host = 'localhost';
		protected $user = 'root';
		protected $password = '';
		protected $database = 'proiect';

		// connection property
		public $conn;

		public function __construct() {
			$this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

			if (mysqli_connect_errno()) {
				echo "Couldn't connect to DB! " . mysqli_connect_error();
			} 
		}

		// Destructor to close the connection when we don't use it
		public function __destruct() {
			$this->closeConnection();
		} 


		// Closing connection method
		protected function closeConnection() {
			// Daca exista o conexiune, o inchidem
			if ($this->conn != null) {
				$this->conn->close();
				$this->conn = null;
			}
		} 

	}

?>
