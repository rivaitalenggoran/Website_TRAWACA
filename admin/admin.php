<?php
global $conn;
include '../config/database.php';
$result = $conn->query("SELECT * FROM beranda ");
?>


<!DOCTYPE html>
<!-- saved from url=(0019)https://trawaca.id/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TRAWACA - Login</title>
    <link rel="shortcut icon" href="https://trawaca.id/images/trawaca_small_8.png">

    <!-- Bootstrap core CSS -->
    <link href="../trawaca_bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../trawaca_bootstrap/business-frontpage.css" rel="stylesheet">
    <link href=../trawaca_bootstrap/css" rel="stylesheet">
</head>
<body data-new-gr-c-s-check-loaded="14.1220.0" data-gr-ext-installed="">


<!-- Header -->
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#914b34;">
    <div class="container">
        <a class="navbar-brand" href="https://trawaca.id/#">TRAWACA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" style="">
                    <a class="nav-link" href="../beranda.php">Beranda</a>
                </li>
                <li class="nav-item " style="">
                    <a class="nav-link " href="https://trawaca.id/publikasi.php">Publikasi</a>
                </li>
                <li class="nav-item active" style="background-color:#E31245;border-bottom: 2px solid white;">
                    <a class="nav-link active" href="admin.php">Admin</a>
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



<!-- Page Content -->
<div class="container mt-5">
    <h2>Kelola Konten Beranda</h2>
    <a href="../beranda.php" class="btn btn-secondary mb-3">Kembali ke Beranda</a>
    <a href="create.php" class="btn btn-success mb-3">Tambah Paragraf</a>
    <table class="table table-bordered">
        <tr>
            <th>Tentang Trawaca</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['tentang_trawaca'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['tentang_trawaca'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['tentang_trawaca'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?');">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>


<!-- Footer -->
<footer class="py-2 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white siji">Copyright © Tim TRAWACA 2019</p>
    </div>
    <!-- /.container -->
</footer>


<!-- Bootstrap core JavaScript -->
<script src="../TRAWACA%20-%20Beranda_files/jquery.min.js.download"></script>
<script src="../TRAWACA%20-%20Beranda_files/bootstrap.bundle.min.js.download"></script>




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