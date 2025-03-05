<?php
include 'backend/profil_backend.php'
?>


<!DOCTYPE html>
<html lang="<?php echo $lang; ?>"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TRAWACA - Profil</title>
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
      <a class="navbar-brand" href="https://trawaca.id/#">TRAWACA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <a class="nav-link active" href="beranda.php"><?php echo $navigasiData['navigasi_beranda']['header']; ?></a>
          </li>
          <li class="nav-item " style="">
            <a class="nav-link " href="publikasi.php"><?php echo $navigasiData['navigasi_publikasi']['header']; ?></a>
          </li>
            <li class="nav-item " style="">
                <a class="nav-link" href="admin.php">Admin</a>
            </li>
            <li class="nav-item active" style="background-color:#E31245;border-bottom: 2px solid white;">
            <a class="nav-link " href="profil.php">Profil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="https://trawaca.id/#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $navigasiData['navigasi_aplikasi']['header']; ?></a>
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
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $navigasiData['navigasi_bahasa']['header']; ?>
          </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="beranda.php?lang=id">Indonesia</a></li>
                <li><a class="dropdown-item" href="beranda.php?lang=en">English</a></li>
                <li><a class="dropdown-item" href="beranda.php?lang=jw">Jawa</a></li>
              </ul>  
          </li>
        </ul>
      </div>
    </div>
</nav>

<?php if ($selected_profile): ?>
<!-- Page Content -->
<div class="container">
    <div class="row mb-5" style="margin-top:35px;">
        <div class="col-md-4 col-sm-12 sijisiji" style="margin-bottom:21px;">
            <h3><b>Profil Peneliti</b></h3>
            <hr>
            <p class="abuabu">
                <img src="./trawaca_bootstrap/mahas.jpg" width="144"><br>
            </p><h5 class="abuabu"><?= $selected_profile['nama_peneliti'] ?></php></h5>
                                   <?= $selected_profile['bidang_minat'] ?>
            <?php foreach ($tautan as $link): ?>
                <?php if ($link['id_peneliti'] == $profile['id_peneliti']): ?>
                    <a href="<?= $link['link_tautan'] ?>" class="btn btn-primary btn-sm mt-2" target="_blank"><?= $link['nama_tautan'] ?></a>&nbsp;<br>
                <?php endif; ?>
            <?php endforeach; ?>
            <p></p>
            <address>
                <abbr title="Email">Email:</abbr>
                <a href="mailto:<?= $selected_profile['email_peneliti'] ?>"><?= $selected_profile['email_peneliti'] ?></a>
            </address>
            <?= $selected_profile['keterangan_tambahan'] ?>
        </div>


        <div class="col-md-8 col-sm-12">
            <h3 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;">Curriculum Vitae</h3>
            <hr>


            <div class="card">
                <div class="card-header">
                    <strong>Pendidikan</strong>
                </div>
                <div class="card-body border border-top-0 border-right-0 border-left-0 border-bottom">
                    <?php foreach ($pendidikan as $Pendidikan): ?>
                        <?php if ($Pendidikan['id_peneliti'] == $profile['id_peneliti']): ?>
                            <h5 class="card-title"><?= $Pendidikan['nama_instansi'] ?><br><small class="coklat"><?= $Pendidikan['gelar'] ?></small></h5>
                            <p class="card-text siji abuabu">
                                <?= $Pendidikan['fakultas'] ?><br>
                                <?= $Pendidikan['tugas_akhir'] ?><br>
                            </p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>Pekerjaan</strong>
                </div>
                <div class="card-body border border-top-0 border-right-0 border-left-0 border-bottom">
                    <?php foreach ($pekerjaan as $Pekerjaan): ?>
                        <?php if ($Pekerjaan['id_peneliti'] == $profile['id_peneliti']): ?>
                            <h5 class="card-title"><?= $Pekerjaan['nama_instansi'] ?><br><small class="coklat"><?= $Pekerjaan['pekerjaan'] ?></small></h5>
                            <p class="card-text siji abuabu">
                                <?= $Pekerjaan['waktu_pekerjaan'] ?><br>
                                <?= $Pekerjaan['keterangan_tambahan'] ?><br>
                            </p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <br>


            <div class="card">
                <div class="card-header">
                    <strong>Minat</strong>
                </div>
                <div class="card-body border border-top-0 border-right-0 border-left-0 border-bottom">
                    <?php foreach ($minat as $Minat): ?>
                        <?php if ($Minat['id_peneliti'] == $profile['id_peneliti']): ?>
                            <h5 class="card-title"><?= $Minat['nama_minat'] ?><br>
                                <small class="coklat"><?= $Minat['subtopik_minat'] ?></small></h5>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                </div>
            </div>
            <br>


            <div class="card">
                <div class="card-header">
                    <strong>Karya</strong>
                </div>
                <div class="card-body border border-top-0 border-right-0 border-left-0 border-bottom">
                    <?php foreach ($karya as $Karya): ?>
                        <?php if ($Karya['id_peneliti'] == $profile['id_peneliti']): ?>
                            <h5 class="card-title"><?= $Karya['nama_karya'] ?><br><small class="coklat"><?= $Karya['deskripsi_karya'] ?></small></h5>
                            <p class="card-text siji abuabu">
                                <?= $Karya['tahun_pengerjaan_karya'] ?><br>
                                <a href="<?= $Karya['tautan_karya'] ?>" class="btn btn-outline-primary btn-sm mt-2"><?= $Karya['nama_tautan_karya'] ?></a><br>
                            </p>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>
            </div>
            <br>

            <h3 style="color:#E31245; text-shadow: 1px 1px 1px #dddddd;">Publikasi Penelitian Trawaca&nbsp;<span class="badge badge-warning">9</span></h3>
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
        <br>
        </div>
    </div>
</div>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Footer -->
<footer class="py-2 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white siji">Copyright © Tim TRAWACA 2025</p>
    </div>
    <!-- /.container -->
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