<?php

session_start();

include(__DIR__ . '/../config/database.php');

// cek perubahan bahasa
if (isset($_GET['lang'])) {
  $_SESSION['lang'] = $_GET['lang'];}

// inisisasi bahasa default
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';

// peneliti
$queryPeneliti = "
    SELECT 
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
$penelitiBahasa = $stmtPeneliti->fetchAll(PDO::FETCH_ASSOC);

// kontributor
$queryKontributor = "SELECT * FROM kontributor";
$stmtKontributor = $pdo->query($queryKontributor);

// kontak
$queryKontak = "SELECT * FROM kontak_trawaca";
$stmtKontak = $pdo->query($queryKontak);

// kegiatan
$queryKegiatan = "
    SELECT
        kl.gambar_kegiatan_luaran,
        kl.waktu_kegiatan_luaran,
        kl.link_kegiatan_luaran,
        klt.nama_kegiatan_luaran,
        klt.deskripsi_kegiatan_luaran,
        klt.nama_link
    FROM
        kegiatan_luaran kl
    JOIN
        kegiatan_luaran_translations klt
        ON kl.id_kegiatan = klt.id_kegiatan
    WHERE
        klt.bahasa_kode = :lang
";
$stmtKegiatan = $pdo->prepare($queryKegiatan);
$stmtKegiatan->execute(['lang' => $lang]);

// sahabat
$querySahabat = "
    SELECT 
        sh.nama_sahabat, 
        sht.nama_waktu_kerjasama
    FROM 
        sahabat_trawaca sh
    JOIN 
        sahabat_trawaca_translate sht ON sh.id_sahabat = sht.id_sahabat
    WHERE 
        sht.kode_bahasa = :lang
";
$stmtSahabat = $pdo->prepare($querySahabat);
$stmtSahabat->execute(['lang' => $lang]);


// header
$queryHeader = "SELECT nama_header, header, sub_header 
          FROM beranda 
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