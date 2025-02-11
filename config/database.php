<?php
$host = "localhost";
$user = "root"; // Ganti jika ada password
$password = "";
$dbname = "trawaca_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
