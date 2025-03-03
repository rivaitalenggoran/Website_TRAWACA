<?php
// Memulai session
session_start();

include 'config/database.php';

// Gunakan PDO untuk semua query jika konsisten
$queryBeranda = "SELECT * FROM beranda";
$stmtBeranda = $pdo->query($queryBeranda);
$tentang = $stmtBeranda->fetch(PDO::FETCH_ASSOC);

// Ambil data lainnya
$queryProfil = "SELECT nama_peneliti, bidang_minat FROM profil_peneliti";
$stmtProfil = $pdo->query($queryProfil);

$queryKontributor = "SELECT * FROM kontributor";
$stmtKontributor = $pdo->query($queryKontributor);

$queryKontak = "SELECT * FROM kontak_trawaca";
$stmtKontak = $pdo->query($queryKontak);

$queryKegiatan = "SELECT * FROM kegiatan";
$stmtKegiatan = $pdo->query($queryKegiatan);

$querySahabat = "SELECT * FROM sahabat_trawaca";
$stmtSahabat = $pdo->query($querySahabat);

// Cek apakah ada request untuk mengganti bahasa
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Default bahasa = Indonesia jika belum ada sesi bahasa yang dipilih
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';

// Ambil teks untuk bagian header_1
$query = "SELECT header, sub_header 
        FROM beranda_translation 
        WHERE language_code = :lang AND section_name = 'header_1'";
$stmt = $pdo->prepare($query);
$stmt->execute(['lang' => $lang]);
$header1 = $stmt->fetch(PDO::FETCH_ASSOC);

// Ambil teks untuk bagian header_2
$query = "SELECT header, sub_header 
        FROM beranda_translation 
        WHERE language_code = :lang AND section_name = 'header_2'";
$stmt = $pdo->prepare($query);
$stmt->execute(['lang' => $lang]);
$header2 = $stmt->fetch(PDO::FETCH_ASSOC);

// Ambil teks untuk bagian header_3
$query = "SELECT header, sub_header 
        FROM beranda_translation 
        WHERE language_code = :lang AND section_name = 'header_3'";
$stmt = $pdo->prepare($query);
$stmt->execute(['lang' => $lang]);
$header3 = $stmt->fetch(PDO::FETCH_ASSOC);

// Ambil teks untuk bagian header_4
$query = "SELECT header, sub_header 
        FROM beranda_translation 
        WHERE language_code = :lang AND section_name = 'header_4'";
$stmt = $pdo->prepare($query);
$stmt->execute(['lang' => $lang]);
$header4 = $stmt->fetch(PDO::FETCH_ASSOC);

// Ambil teks untuk bagian header_5
$query = "SELECT header, sub_header 
        FROM beranda_translation 
        WHERE language_code = :lang AND section_name = 'header_5'";
$stmt = $pdo->prepare($query);
$stmt->execute(['lang' => $lang]);
$header5 = $stmt->fetch(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<!-- saved from url=(0019)https://trawaca.id/ -->
<html lang="<?php echo $lang; ?>"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>TRAWACA - Beranda</title>
  <link rel="shortcut icon" href="https://trawaca.id/images/trawaca_small_8.png">
  <!-- Bootstrap core CSS -->
  <link href="trawaca_bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="trawaca_bootstrap/business-frontpage.css" rel="stylesheet">
  <link href="trawaca_bootstrap/css" rel="stylesheet">
</head>


<body data-new-gr-c-s-check-loaded="14.1220.0" data-gr-ext-installed="">


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#914b34;">
    <div class="container">
      <a class="navbar-brand" href="https://trawaca.id/#">TRAWACA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active" style="background-color:#E31245;border-bottom: 2px solid white;">
            <a class="nav-link active" href="./beranda.php">Beranda</a>
          </li>
          <li class="nav-item " style="">
            <a class="nav-link " href="./publikasi.php">Publikasi</a>
          </li>
            <li class="nav-item " style="">
                <a class="nav-link " href="./admin/admin.php">Admin</a>
            </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="https://trawaca.id/#" role="button" aria-haspopup="true" aria-expanded="false">Aplikasi</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="https://trawaca.id/ocrjawa">OCR Cakra</a>
              <a class="dropdown-item" href="https://trawaca.id/anotasi">Anotasi Aksara Jawa</a>
              <a class="dropdown-item" href="https://trawaca.id/sinau">Belajar Aksara Jawa</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="https://trawaca.id/asankey.php">Diagram Sankey Naskah Jawa</a>
              <div class="dropdown-divider"></div>
              <span class="cilik pupus">&nbsp;&nbsp;::: Purwarupa</span>
              <a class="dropdown-item" href="https://trawaca.id/hapusgbr">Pisahkan Ilustrasi Naskah</a>
            </div>    
          </li>
          <li class="nav-item dropdown">


          <!-- buat ini bob, navigasinya -->
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          Select Option
          </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="beranda.php?lang=id">Indonesia</a></li>
                <li><a class="dropdown-item" href="beranda.php?lang=en">English</a></li>
                <li><a class="dropdown-item" href="#4">Jawa</a></li>
              </ul>  






          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header -->
  <header class="py-5 mb-5" style="background-color:#DCD1B8;">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-md-6">
          <img src="trawaca_bootstrap/trawaca_400_8.png" class="img-fluid mx-auto d-block">
        </div>
        <div class="col-md-6">
          <h2 class="display-4 mt-5 mb-2" style="color:#E31245; text-shadow: 1px 2px 2px #777777;"><?php echo $header1['header']; ?></h2>
          <p class="lead mb-5"><?php echo $header1['sub_header']; ?></p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 mb-5">
        <h2 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;"><?php echo $header2['header']; ?></h2>
        <hr>
          <p><?= $tentang['tentang_trawaca'] ?></p>
      </div>
      <div class="col-md-4 col-sm-12 mb-5 sijisiji">
        <h2 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;"><?php echo $header3['header']; ?></h2>
        <hr>
        <h4><b><?php echo $header3['sub_header']; ?></b></h4>
        <p class="abuabu">
        <?php while ($profil = $stmtProfil->fetch(PDO::FETCH_ASSOC)) { ?>
            <strong><?= $profil['nama_peneliti'] ?></strong><br>
            <?= $profil['bidang_minat'] ?><br>
          <?php } ?>
        </p>
        <h4><b>Kontributor</b></h4>
        <p class="abuabu">
          <?php while ($kontributor = $stmtKontributor->fetch(PDO::FETCH_ASSOC)) { ?>
            <?= $kontributor['nama_kontributor'] ?><span class="cilik pupus"> :: <?= $kontributor['semester_kontributor'] ?></span><br>
          <?php } ?>
        </p>
        <strong>Kontak Kami</strong>
        <?php while ($kontak = $stmtKontak->fetch(PDO::FETCH_ASSOC)) { ?>
          <a href=<?= $kontak['link_kontak'] ?>><?= $kontak['nama_kontak'] ?></a><br>
        <?php } ?>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12 mt-2 mb-5">
        <h2 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;"><?php echo $header4['header']; ?></h2>
          <hr>
          <?php while ($kegiatan = $stmtKegiatan->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img class="card-img-top" src="<?= $kegiatan['gambar_kegiatan_luaran'] ?>" alt="">
                <div class="card-body">
                  <h4 class="card-title"><?= $kegiatan['nama_kegiatan_luaran'] ?></h4>
                  <p class="card-text"><?= $kegiatan['deskripsi_kegiatan_luaran'] ?></p>
                  <p class="cilik"><?= $kegiatan['waktu_kegiatan_luaran'] ?></p>
                </div>
                <div class="card-footer">
                  <a href="<?= $kegiatan['link_kegiatan_luaran'] ?>" class="btn btn-danger"><?= $kegiatan['nama_link'] ?></a>
                </div>
              </div>
            </div>
          <?php } ?>
          <div class="col-md-4 mb-3">
            <div class="card h-100">
              <img class="card-img-top" src="trawaca_bootstrap/kegiatan.png" alt="">
              <div class="card-body">
                <h4 class="card-title">Nantikan kegiatan berikutnya!</h4>
                <p class="card-text siji">&nbsp;</p>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>


    <div class="row">
      <div class="col-md-12 mb-5">
        <h2 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;"><?php echo $header5['header']; ?></h2>
        <hr>
        <p class="card-text sepasi">
        <?php while ($sahabat = $stmtSahabat->fetch(PDO::FETCH_ASSOC)) { ?>
            <?= $sahabat['nama_sahabat'] ?> |<span class="cilik"> <?= $sahabat['nama_waktu_kerjasama'] ?></span><br>
          <?php } ?>
        </p>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <footer class="py-2 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white siji">Copyright © Tim TRAWACA 2025</p>
    </div>
  </footer>


<deepl-input-controller><template shadowrootmode="open"><link rel="stylesheet" href="chrome-extension://cofdbpoegempjloogbagkncekinflcnj/build/content.css"><div dir="ltr" style="visibility: initial !important;"><div class="dl-input-translation-container svelte-95aucy"><div></div></div></div></template></deepl-input-controller></body><grammarly-desktop-integration data-grammarly-shadow-root="true"><template shadowrootmode="open"><style>
      div.grammarly-desktop-integration {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select:none;
        user-select:none;
      }
      div.grammarly-desktop-integration:before {
        content: attr(data-content);
      }
    </style><div aria-label="grammarly-integration" role="group" tabindex="-1" class="grammarly-desktop-integration" data-content="{&quot;mode&quot;:&quot;full&quot;,&quot;isActive&quot;:true,&quot;isUserDisabled&quot;:false}"></div></template></grammarly-desktop-integration></html>

<?php
?>