<?php include 'backend/admin_backend.php'?>


<!DOCTYPE html>
<!-- saved from url=(0019)https://trawaca.id/ -->
<html lang="<?php echo $lang; ?>"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TRAWACA - Login</title>
    <link rel="shortcut icon" href="https://trawaca.id/images/trawaca_small_8.png">

    <!-- Bootstrap core CSS -->
    <link href="trawaca_bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="trawaca_bootstrap/business-frontpage.css" rel="stylesheet">
    <link href="trawaca_bootstrap/css" rel="stylesheet">
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
            <a class="nav-link " href="beranda.php"><?php echo $navigasiData['navigasi_beranda']['header']; ?></a>
          </li>
          <li class="nav-item " style="">
            <a class="nav-link " href="publikasi.php"><?php echo $navigasiData['navigasi_publikasi']['header']; ?></a>
          </li>
            <li class="nav-item " style="">
            <li class="nav-item active" style="background-color:#E31245;border-bottom: 2px solid white;">
                <a class="nav-link" href="admin.php">Admin</a>
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



<!-- Page Content -->
<body class="container mt-4">
    <h2 class="text-center mb-4">Manajemen Beranda</h2>
    <form method="POST" class="mb-3">
        <input type="hidden" name="id" id="id">
        <div class="mb-3">
            <input type="text" name="nama_header" class="form-control" placeholder="Nama Header" required>
        </div>
        <div class="mb-3">
            <input type="text" name="kode_bahasa" class="form-control" placeholder="Kode Bahasa" required>
        </div>
        <div class="mb-3">
            <input type="text" name="header" class="form-control" placeholder="Header" required>
        </div>
        <div class="mb-3">
            <input type="text" name="sub_header" class="form-control" placeholder="Sub Header" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <hr>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Header</th>
                <th>Kode Bahasa</th>
                <th>Header</th>
                <th>Sub Header</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($berandas as $row) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama_header']; ?></td>
                    <td><?= $row['kode_bahasa']; ?></td>
                    <td><?= $row['header']; ?></td>
                    <td><?= $row['sub_header']; ?></td>
                    <td>
                        <a href="?edit=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="?delete=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

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