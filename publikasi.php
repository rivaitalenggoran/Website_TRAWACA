<?php
global $conn;
include 'config/database.php';

// Peneliti --------------------------------------------
$resultprofil = $conn->query("SELECT id_peneliti, nama_peneliti, bidang_minat FROM profil_peneliti");

// Array Profil Peneliti
$profiles = [];
while ($row = $resultprofil->fetch_assoc()) {
    $profiles[] = $row;
}

// ID Peneliti
$id_peneliti = isset($_GET['id_peneliti']) ? $_GET['id_peneliti'] : (isset($profiles[0]['id_peneliti']) ? $profiles[0]['id_peneliti'] : null);


//Tautan Peneliti --------------------------------------
$resulttautan = $conn->query("SELECT * FROM tautan_peneliti");

// Array Tautan Peneliti
$tautan = [];
while ($row = $resulttautan->fetch_assoc()) {
    $tautan[] = $row;
}


//Publikasi Peneliti -----------------------------------
$resultpublikasi = $conn->query("SELECT tahun_publikasi,nama_publikasi,
                   nama_peneliti,hari_tanggal_publikasi,tempat_publikasi,tautan_publikasi FROM publikasi_peneliti");

// Array Publikasi
$kelompok_publikasi = [];
while ($publikasi = $resultpublikasi->fetch_assoc()) {
    $kelompok_publikasi[$publikasi['tahun_publikasi']][] = $publikasi;}

// Filter Container Publikasi Berdasarkan Tahun--
$resulttahun = $conn->query("SELECT tahun_publikasi, COUNT(*) AS jumlah_publikasi 
               FROM publikasi_peneliti GROUP BY tahun_publikasi ORDER BY tahun_publikasi DESC");

?>


<!DOCTYPE html>
<!-- saved from url=(0032)https://trawaca.id/publikasi.php -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TRAWACA - Publikasi</title>
    <link rel="shortcut icon" href="https://trawaca.id/images/trawaca_small.png">

    <!-- Bootstrap core CSS -->
    <link href="trawaca_bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="trawaca_bootstrap/business-frontpage.css" rel="stylesheet">
    <link href="trawaca_bootstrap/css" rel="stylesheet">
</head>


<body data-new-gr-c-s-check-loaded="14.1221.0" data-gr-ext-installed="">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#914b34;">
    <div class="container">
        <a class="navbar-brand" href="https://trawaca.id/publikasi.php#">TRAWACA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item " style="">
                    <a class="nav-link " href="https://trawaca.id/index.php">Beranda              <!--<span class="sr-only">(current)</span>-->
                    </a>
                </li>
                <li class="nav-item active" style="background-color:#E31245;border-bottom: 2px solid white;">
                    <a class="nav-link active" href="https://trawaca.id/publikasi.php">Publikasi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="https://trawaca.id/publikasi.php#" role="button" aria-haspopup="true" aria-expanded="false">Aplikasi</a>
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
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="https://trawaca.id/publikasi.php#" role="button" aria-haspopup="true" aria-expanded="false">Bahasa</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="https://trawaca.id/publikasi.php?lang=">Bahasa Indonesia</a>
                        <a class="dropdown-item" href="https://trawaca.id/publikasi.php?lang=jv">Basa Jawa</a>
                        <a class="dropdown-item" href="https://trawaca.id/publikasi.php?lang=en">English</a>
                        <a class="dropdown-item" href="https://trawaca.id/publikasi.php?lang=jv">ꦧꦱꦗꦮ</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Page Content -->
<div class="container">
    <div class="row mb-5" style="margin-top:35px;">
        <div class="col-md-8 col-sm-12">
            <h2 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;">Publikasi Penelitian Trawaca</h2>
            <hr>
            <?php foreach ($kelompok_publikasi as $tahun => $publikasi_tahun) {?>
                        <div class="card">
                            <div class="card-header">
                                <strong><?= $tahun?></strong>&nbsp;<span class="badge badge-danger"><?= count($publikasi_tahun) ?></span>
                            </div>
                            <div class="card-body border border-top-0 border-right-0 border-left-0 border-bottom">
                                <?php foreach ($publikasi_tahun as $publikasi) { ?>
                                <h5 class="card-title"><?= $publikasi['nama_publikasi']?><br><small class="coklat"><?= $publikasi['nama_peneliti']?></small></h5>
                                <p class="card-text siji abuabu">
                                    <?= $publikasi['hari_tanggal_publikasi']?><br>
                                    <?= $publikasi['tempat_publikasi']?> <br>
                                </p>
                                <a href="<?= $publikasi['tautan_publikasi']?>" class="btn btn-outline-danger btn-sm" target="_blank">Tautan</a>
                                <hr>
                                <?php } ?>
                            </div>
                        </div>
                        <br>
            <?php } ?>
            <?php ?>
        </div>


        <div class="col-md-4 col-sm-12 sijisiji">
            <h2>&nbsp;</h2>
            <hr>
            <h4><b>Profil Peneliti</b></h4>
            <p class="abuabu">
            <div>
                <?php foreach ($profiles as $profile): ?>
                    <a class="button" href="profil.php?id_peneliti=<?= $profile['id_peneliti']; ?>">
                        <strong><?= $profile['nama_peneliti']; ?></strong>
                    </a><br>
                <?= $profile['bidang_minat']; ?><br>
                    <?php foreach ($tautan as $link): ?>
                        <?php if ($link['id_peneliti'] == $profile['id_peneliti']): ?>
                            <a href="<?= $link['link_tautan'] ?>" class="btn btn-primary btn-sm mt-2" target="_blank"><?= $link['nama_tautan'] ?></a>&nbsp;<br>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </p>
        </div>
    </div>
</div>
<!-- /.container -->



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