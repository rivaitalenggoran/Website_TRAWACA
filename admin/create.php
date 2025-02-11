<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tentang_trawaca = $_POST['tentang_trawaca'];
    $conn->query("INSERT INTO beranda (tentang_trawaca) VALUES ('$tentang_trawaca')");
    header("Location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paragraf</title>
    <link rel="stylesheet" href="../trawaca_bootstrap/bootstrap.min.css">
    <!-- Bootstrap core CSS -->
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Paragraf</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Paragraf:</label>
            <textarea class="form-control" name="tentang_trawaca" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="admin.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>

</html>
