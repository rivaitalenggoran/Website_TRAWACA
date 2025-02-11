<?php
global $conn;
include 'config/database.php';

$resulttentang = $conn->query("SELECT * FROM beranda");
$tentang = $resulttentang->fetch_assoc();

$resultprofil = $conn->query("SELECT nama_peneliti,bidang_minat FROM profil_peneliti");

$resultkontributor = $conn->query("SELECT * FROM kontributor");

$resultkontak = $conn->query("SELECT * FROM kontak_trawaca");

$resultkegiatan = $conn->query("SELECT * FROM kegiatan");

$resultsahabat = $conn->query("SELECT * FROM sahabat_trawaca");

?>


<!DOCTYPE html>
<!-- saved from url=(0019)https://trawaca.id/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
          </li><li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="https://trawaca.id/#" role="button" aria-haspopup="true" aria-expanded="false">Bahasa</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="https://trawaca.id/?lang=">Bahasa Indonesia</a>
              <a class="dropdown-item" href="https://trawaca.id/?lang=jv">Basa Jawa</a>
              <a class="dropdown-item" href="https://trawaca.id/?lang=en">English</a>
              <a class="dropdown-item" href="https://trawaca.id/?lang=jv">ꦧꦱꦗꦮ</a>
            </div>    
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
          <h2 class="display-4 mt-5 mb-2" style="color:#E31245; text-shadow: 1px 2px 2px #777777;"><strong>Selamat Datang di<br>Situs Web TRAWACA</strong></h2>
          <p class="lead mb-5">TRAWACA adalah sebuah tim yang peduli pada pelestarian budaya Indonesia, dengan fokus utama pada Aksara Jawa. Anda dapat berpartisipasi pada kegiatan-kegiatan TRAWACA, dengan mengikuti tautan yang tersedia pada halaman ini.</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 mb-5">
        <h2 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;">TENTANG TRAWACA</h2>
        <hr>
          <p><?= $tentang['tentang_trawaca'] ?></p>
      </div>
      <div class="col-md-4 col-sm-12 mb-5 sijisiji">
        <h2 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;">Tim TRAWACA</h2>
        <hr>
        <h4><b>Peneliti Utama</b></h4>
        <p class="abuabu">
            <?php while ($profil = $resultprofil->fetch_assoc()) { ?>
                <strong><?= $profil['nama_peneliti']?></strong><br>
                        <?= $profil['bidang_minat']?><br>
            <?php } ?>
        </p>
        <h4><b>Kontributor</b></h4>
        <p class="abuabu">
            <?php while ($kontributor = $resultkontributor->fetch_assoc()) { ?>
                <?= $kontributor['nama_kontributor']?><span class="cilik pupus"> :: <?= $kontributor['semester_kontributor']?></span><br>
            <?php } ?>
        </p>
        <strong>Kontak Kami</strong>
          <?php while ($kontak= $resultkontak->fetch_assoc()) { ?>
              <a href=<?= $kontak['link_kontak']?>><?= $kontak['nama_kontak']?></a><br>
          <?php } ?>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12 mt-2 mb-5">
        <h2 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;">Kegiatan dan Luaran TRAWACA</h2>
          <hr>
          <?php while ($kegiatan = $resultkegiatan->fetch_assoc()) { ?>
          <div class="row">
              <div class="col-md-4 mb-3">
                  <div class="card h-100">
                      <img class="card-img-top" src="<?= $kegiatan['gambar_kegiatan_luaran']?>" alt="">
                      <div class="card-body">
                          <h4 class="card-title"><?= $kegiatan['nama_kegiatan_luaran']?></h4>
                          <p class="card-text siji abuabu"><?= $kegiatan['deskripsi_kegiatan_luaran']?></p>
                          <p class="cilik"><?= $kegiatan['waktu_kegiatan_luaran']?></p>
                      </div>
                      <div class="card-footer">
                          <a href="<?= $kegiatan['link_kegiatan_luaran']?>" class="btn btn-danger"><?= $kegiatan['nama_link']?></a>
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
        <h2 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;">Sahabat TRAWACA</h2>
        <hr>
        <p class="card-text sepasi">
            <?php while ($sahabat = $resultsahabat->fetch_assoc()) { ?>
                <?= $sahabat['nama_sahabat']?> |<span class="cilik"> <?= $sahabat['nama_waktu_kerjasama']?></span><br>
            <?php } ?>
        </p>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <footer class="py-2 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white siji">Copyright © Tim TRAWACA 2019</p>
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
// Tutup koneksi database
$conn->close();
?>