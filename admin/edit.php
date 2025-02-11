<?php
global $conn;
include '../config/database.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM beranda WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tentang_trawaca = $_POST['tentang_trawaca'];
    $conn->query("UPDATE beranda SET tentang_trawaca='$tentang_trawaca' WHERE id=$id");
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paragraf</title>
    <link rel="stylesheet" href="../trawaca_bootstrap/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Paragraf</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Paragraf:</label>
            <textarea class="form-control" name="tentang_trawaca" rows="10" cols="50" required><?= $data['tentang_trawaca'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="admin.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
