<?php

session_start();

include(__DIR__ . '/../config/database.php');


// cek perubahan bahasa
if (isset($_GET['lang'])) {
  $_SESSION['lang'] = $_GET['lang'];}

// inisisasi bahasa default
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';




// Peneliti --------------------------------------------
$queryPeneliti = "
    SELECT 
        pp.id_peneliti,
        pp.nama_peneliti, 
        ppb.bidang_minat
    FROM 
        profil_peneliti pp
    JOIN 
        profil_peneliti_bahasa ppb ON pp.id_peneliti = ppb.id_peneliti
    WHERE 
        ppb.kode_bahasa = :lang
";
$stmtPeneliti = $pdo->prepare($queryPeneliti);
$stmtPeneliti->execute(['lang' => $lang]);
$profiles = $stmtPeneliti->fetchAll(PDO::FETCH_ASSOC);

$profile = [];
foreach ($profiles as $rowprofile) {
    $profile[] = $rowprofile;
}


// ID Peneliti
$id_peneliti = isset($_GET['id_peneliti']) 
    ? $_GET['id_peneliti'] 
    : (!empty($profile) ? $profile[0]['id_peneliti'] : null);


//Tautan Peneliti --------------------------------------
$queryTautan = "SELECT * FROM tautan_peneliti";
$stmtTautan = $pdo->query($queryTautan);
$tautan = $stmtTautan->fetchAll(PDO::FETCH_ASSOC);


// //Publikasi Peneliti -----------------------------------
$queryPublikasi = "SELECT tahun_publikasi,nama_publikasi,
                   nama_peneliti,hari_tanggal_publikasi,tempat_publikasi,tautan_publikasi FROM publikasi_peneliti";
$stmtPublikasi = $pdo->query($queryPublikasi);
$publikasi = $stmtPublikasi->fetchAll(PDO::FETCH_ASSOC);
// Array Publikasi
$kelompok_publikasi = [];
foreach ($publikasi as $rowpublikasi) {
    $kelompok_publikasi[$rowpublikasi['tahun_publikasi']][] = $rowpublikasi;
}

// Header -----------------------------------------
$queryHeader = "SELECT nama_header, header, sub_header 
          FROM publikasi_peneliti_translate
          WHERE kode_bahasa = :lang";
$stmtHeader = $pdo->prepare($queryHeader);
$stmtHeader->execute(['lang' => $lang]);
$headers = $stmtHeader->fetchAll(PDO::FETCH_ASSOC);

$headerData = [];
foreach ($headers as $row) {
    $headerData[$row['nama_header']] = [
        'header' => $row['header'],
        'sub_header' => $row['sub_header']];}

?>