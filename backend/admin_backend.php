<?php

session_start();


include(__DIR__ . '/../config/database.php');


// Cek Perubahan Bahasa-----------------------------------------------------
if (isset($_GET['lang'])) {
  $_SESSION['lang'] = $_GET['lang'];}


// Inisisasi Bahasa Default--------------------------------------------------
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';


// Handle Create and Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $nama_header = $_POST['nama_header'];
    $kode_bahasa = $_POST['kode_bahasa'];
    $header = $_POST['header'];
    $sub_header = $_POST['sub_header'];
    
    if ($id) {
        // Update existing record
        $stmt = $pdo->prepare("UPDATE beranda SET nama_header=?, kode_bahasa=?, header=?, sub_header=? WHERE id=?");
        $stmt->execute([$nama_header, $kode_bahasa, $header, $sub_header, $id]);
    } else {
        // Create new record
        $stmt = $pdo->prepare("INSERT INTO beranda (nama_header, kode_bahasa, header, sub_header) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nama_header, $kode_bahasa, $header, $sub_header]);
    }
    header("Location: admin.php");
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM beranda WHERE id=?");
    $stmt->execute([$id]);
    header("Location: admin.php");
    exit;
}

// Fetch all records
$stmt = $pdo->query("SELECT * FROM beranda");
$berandas = $stmt->fetchAll();

// Navigasi------------------------------------------------------------------------
$queryNavigasi ="
SELECT
    nama_header,
    header
FROM
    navigasi
WHERE
    kode_bahasa = :lang";
$stmtNavigasi = $pdo->prepare($queryNavigasi);
$stmtNavigasi->execute(['lang' => $lang]);
$navigasi = $stmtNavigasi->fetchAll(PDO::FETCH_ASSOC);
$navigasiData = [];
foreach ($navigasi as $rowsNavigasi) {
$navigasiData[$rowsNavigasi['nama_header']] = [
    'header' => $rowsNavigasi['header']];}
?>