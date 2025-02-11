<?php
include '../config/database.php';

$id = $_GET['id'];
$conn->query("DELETE FROM beranda WHERE id=$id");
header("Location: admin.php");
?>
