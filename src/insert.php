<?php
// functie: insert fiets
// auteur: jayden Sadhoe

echo "<h1>Insert Fiets</h1>";

require_once '../vendor/autoload.php';
use Project_fiets\Classes\Fiets;
use Project_fiets\Classes\Database;

//database verbinding maken

$db = new Database("fietsenmaker", "root", "");
$conn = $db->connect();

if ($conn === null) {
    die("Database niet beschikbaar.");
}

if ($conn === null) {
    die("Database niet beschikbaar");
}

// formulier is verzonden
if (isset($_POST['btn_ins'])) {

    $fiets = new Fiets(
        $conn,
        0,
        $_POST['merk'],
        $_POST['type'],
        (int)$_POST['prijs']
    );

    if ($fiets->add() === true) {
        echo "<script>alert('Fiets is toegevoegd');</script>";
        echo "<script>location.replace('index.php');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>insert fiets</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
    <label for="merk">Merk:</label>
    <input type="text" id="merk" name="merk" required><br>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type" required><br>

    <label for="prijs">Prijs:</label>
    <input type="number" id="prijs" name="prijs" required><br>

    <button type="submit" name="btn_ins">Insert</button>
</form>

<br><br>
<a href="index.php">Home</a>

</body>
</html>
