<?php

//session_start();

//$_SESSION['naam'] = 'Manoy';
//$_SESSION['email'] = '2176730@.com';
?>

<?php
// Start de sessie
session_start();

$servername = "localhost:3307";
$username = "root"; 
$password = ""; 
$dbname = "Winkel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query om alle gegevens uit de tabel op te halen
$sql = "SELECT * FROM producten";
$result = $conn->query($sql);

// Controleren of er rijen zijn
if ($result->num_rows > 0) {
    // Loop door alle rijen en geef de gegevens weer
    while ($row = $result->fetch_assoc()) {
        // Controleren of de sleutels in de array bestaan voordat ze worden gebruikt
        if (isset($row["id"])) {
            echo "ID: " . $row["id"] . "<br>";
        }
        if (isset($row["naam"])) {
            echo "Naam: " . $row["naam"] . "<br>";
        }
        if (isset($row["email"])) {
            echo "Email: " . $row["email"] . "<br>";
        }
        echo "<br>";

        // Sla de ID's op in de sessievariabele
        if (isset($row["id"])) {
            $_SESSION["selected_ids"][] = $row["id"];
        }
    }
} else {
    echo "Geen gegevens gevonden in de tabel.";
}

// Weergeven van geselecteerde ID's
if (isset($_SESSION["selected_ids"]) && !empty($_SESSION["selected_ids"])) {
    echo "Geselecteerde ID's: ";
    foreach ($_SESSION["selected_ids"] as $id) {
        echo $id . " ";
    }
} else {
    echo "Geen ID's geselecteerd.";
}
?>
