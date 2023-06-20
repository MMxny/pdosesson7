<?php
// Start de sessie
session_start();

// Weergeven van sessievariabelen
if (isset($_SESSION['naam']) && isset($_SESSION['email'])) {
    echo "Naam: " . $_SESSION['naam'] . "<br>";
    echo "E-mail: " . $_SESSION['email'];
} else {
    echo "De sessievariabelen zijn niet ingesteld.";
}
?>

