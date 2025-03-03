<?php
// Informasi koneksi database
$host = 'localhost';       // Nama host
$dbname = 'trawaca_db'; // Nama database
$username = 'root';        // Username database
$password = '';            // Password database

// Membuat objek PDO untuk koneksi
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set error mode ke Exception untuk menangani error dengan lebih baik
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Tangani error jika koneksi gagal
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
