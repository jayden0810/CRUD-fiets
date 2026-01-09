<?php

//functies: class fiets
//autor: Jayden Sadhoe

namespace Project_fiets\Classes;

use PDO;
use PDOException;

class Fiets {
    public int $id;
    public string $merk;
    public string $type;
    public int $prijs;
    private PDO $conn;

    public function __construct(PDO $conn, int $id, string $merk, string $type, int $prijs) {
        $this->conn = $conn;
        $this->id = $id;
        $this->merk = $merk;
        $this->type = $type;
        $this->prijs = $prijs;
    }

    //add fiets
    public function add(string $type = ""): bool {
        try {
            $stmt = $this->conn->prepare("INSERT INTO fietsen (merk, type, prijs) VALUES (:merk, :type, :prijs)");
            $stmt->execute([

                ':merk' => $this->merk,
                ':type' => $this->type,
                ':prijs' => $this->prijs
            ]);
            echo "Fiets '{$this->merk}' toegevoegd.<br>";
            return true;
        } catch (PDOException $e) {
            echo "Fout bij toevoegen fiets: " . $e->getMessage();
            return false;
        }
    }
    //get all fietsen
    public function getAll(): array {
        try {
            $stmt = $this->conn->query("SELECT * FROM  fietsen");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "❌ Fout bij ophalen gegevens: " . $e->getMessage();
            return [];
        }
    }
    //delete fiets
    public function delete(int $id): bool {
    try {
        $stmt = $this->conn->prepare("DELETE FROM fietsen WHERE id = :id");
        $stmt->execute([':id' => $id]);
        echo "✅ Fiets met ID $id verwijderd.<br>";
        return true;
    } catch (PDOException $e) {
        echo "❌ Fout bij verwijderen fiets: " . $e->getMessage();
        return false;
    }
    }

}
?>
