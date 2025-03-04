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
        pp.email_peneliti,
        pp.keterangan_tambahan, 
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

    

// Ambil data Profil dari berdasarkan ID
$selected_profile = null;
foreach ($profiles as $profile) {
    if ($profile['id_peneliti'] == $id_peneliti) {
        $selected_profile = $profile;
        break;
    }
}

//Tautan Peneliti --------------------------------------
$queryTautan = "SELECT * FROM tautan_peneliti";
$stmtTautan = $pdo->query($queryTautan);
$tautan = $stmtTautan->fetchAll(PDO::FETCH_ASSOC);



// //------------------------------------------------------------------------------------------------
// // Pendidikan--------------------------------------------
$queryPendidikan = "
    SELECT 
        id_peneliti,
        nama_instansi,
        gelar,
        fakultas,
        tugas_akhir
    FROM 
        pendidikan_peneliti
    WHERE 
        kode_bahasa = :lang 
    AND 
    id_peneliti = $id_peneliti
";
$stmtPendidikan = $pdo->prepare($queryPendidikan);
$stmtPendidikan->execute(['lang' => $lang]);
$pendidikan = $stmtPendidikan->fetchAll(PDO::FETCH_ASSOC);



// // Pekerjaan----------------------------------------------
$queryPekerjaan = "
    SELECT 
        id_peneliti,
        nama_instansi,
        pekerjaan,
        waktu_pekerjaan,
        keterangan_tambahan
    FROM 
        pekerjaan_peneliti
    WHERE 
        kode_bahasa = :lang 
    AND 
    id_peneliti = $id_peneliti
";
$stmtPekerjaan = $pdo->prepare($queryPekerjaan);
$stmtPekerjaan->execute(['lang' => $lang]);
$pekerjaan = $stmtPekerjaan->fetchAll(PDO::FETCH_ASSOC);



// // // Minat--------------------------------------------------
$queryMinat = "
    SELECT 
        id_peneliti,
        nama_minat,
        subtopik_minat
    FROM 
        minat_peneliti
    WHERE 
        kode_bahasa = :lang 
    AND 
    id_peneliti = $id_peneliti
";
$stmtMinat = $pdo->prepare($queryMinat);
$stmtMinat->execute(['lang' => $lang]);
$minat = $stmtMinat->fetchAll(PDO::FETCH_ASSOC);

// // Karya--------------------------------------------------
$queryKarya = "
    SELECT 
        ky.id_peneliti,
        ky.tahun_pengerjaan_karya, 
        ky.tautan_karya,
        kyt.nama_karya,
        kyt.deskripsi_karya,
        kyt.nama_tautan_karya
    FROM 
        karya_peneliti ky
    JOIN 
        karya_peneliti_translate kyt ON ky.id_peneliti = kyt.id_peneliti
    WHERE 
        kyt.kode_bahasa = :lang
";
$stmtKarya = $pdo->prepare($queryKarya);
$stmtKarya->execute(['lang' => $lang]);
$karya = $stmtKarya->fetchAll(PDO::FETCH_ASSOC);


// //Publikasi Peneliti -----------------------------------
$queryPublikasi = "
    SELECT 
        id_peneliti,
        tahun_publikasi,
        nama_publikasi,
        nama_peneliti,
        hari_tanggal_publikasi,
        tempat_publikasi,
        tautan_publikasi 
    FROM 
        publikasi_peneliti 
    WHERE 
        id_peneliti = $id_peneliti
";

$stmtPublikasi = $pdo->query($queryPublikasi);
$publikasi = $stmtPublikasi->fetchAll(PDO::FETCH_ASSOC);
// Array Publikasi
$kelompok_publikasi = [];
foreach ($publikasi as $rowpublikasi) {
    $kelompok_publikasi[$rowpublikasi['tahun_publikasi']][] = $rowpublikasi;
}
?>