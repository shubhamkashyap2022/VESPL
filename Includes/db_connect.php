<?php
$host = "localhost";   // usually localhost
$user = "root";        // change if hosting
$pass = "";            // set password if needed
$db   = "vitasta_enviro";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
