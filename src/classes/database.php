<?php
namespace Project_fiets\Classes;

use PDO;
use PDOException;

class Database {
	public string $naamdb;
	public string $username;
	public string $password;
	private ?PDO $conn = null;

	public function __construct(string $naamdb, string $username, string $password) {
		$this->naamdb = $naamdb;
		$this->username = $username;
		$this->password = $password;
	}

	public function connect(string $type = "mysql"): ?PDO {
		try {
			$this->conn = new PDO("$type:host=localhost;dbname={$this->naamdb}", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "✅ Verbinding succesvol.<br>";
			return $this->conn;
		} catch (PDOException $e) {
			echo "❌ Verbinding mislukt: " . $e->getMessage();
			return null;
		}
	}
}

?>


