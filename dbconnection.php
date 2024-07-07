<?php
function connect_to_db() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ourfamilyrecipes";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Uključivanje funkcije za povezivanje s bazom podataka
$conn = connect_to_db();
?>
