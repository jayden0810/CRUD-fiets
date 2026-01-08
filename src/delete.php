<?php

// functie: verwijder een fiets
// auteur: Jayden Sadhoe

require_once '../vendor/autoload.php';
use Project_fiets\Classes\Fiets;
use Project_fiets\Classes\Database;

//database verbinding maken

$db = new Database("fietsenmaker", "root", "");
$conn = $db->connect();

//fiets oject aanmaken
$fiets = new Fiets($conn, 0, "", "", 0);

//id uit url halen en fiets verwijderen
if (isset($_GET['id'])) {

    if ($fiets->delete((int)$_GET['id']) === true) {
        echo '<script>alert("fietscode: ' . $_GET['id'] . ' is verwijderd");</script>';
        echo "<script>location.replace('index.php');</script>";
    } else {
        echo '<script>alert("Fiets is NIET verwijderd");</script>';
    }
}
?>

