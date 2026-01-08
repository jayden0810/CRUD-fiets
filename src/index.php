<?php
// functie: overzicht van alle fietsen
// auteur: Jayden Sadhoe

require_once '../vendor/autoload.php';
use Project_fiets\Classes\Fiets;
use Project_fiets\Classes\Database;

//database verbinding maken

$db = new Database("fietsenmaker", "root", "");
$conn = $db->connect();

if ($conn === null) {
    die("Database niet beschikbaar.");
}

//FIETS OBJECT AANMAKEN
$fiets = new Fiets($conn, 0, "", "", 0);

//alle fietsen
$alleFietsen = $fiets->getAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Fietsen Overzicht</title>
      <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="insert.php">
    <button>➕ Nieuwe fiets</button>
</a>
<br><br>

<h1>🚲 Fietsen</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Merk</th>
        <th>Type</th>
        <th>Prijs</th>
        <th>Actie</th>
    </tr>

    <?php foreach ($alleFietsen as $f): ?>
        <tr>
            <td><?= $f['id'] ?></td>
            <td><?= $f['merk'] ?></td>
            <td><?= $f['type'] ?></td>
            <td>€<?= $f['prijs'] ?></td>
            <td>
                <a href="delete.php?id=<?= $f['id'] ?>"
                onclick="return confirm('Weet je zeker dat je deze fiets wilt verwijderen?')">
                ❌ Verwijder
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
