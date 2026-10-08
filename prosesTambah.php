<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$nama = $_POST["nama"];
$kategori = $_POST["kategori"];
$harga = $_POST["harga"];

$folderTujuan = "bukti_bayar/";
$namaFile = basename($_FILES["buktiBayar"]["name"]);
$alamatFile = $folderTujuan . $namaFile;

if (move_uploaded_file($_FILES["buktiBayar"]["tmp_name"], $alamatFile)) {
    $_SESSION["daftarWar"][] = [
        "nama" => $nama,
        "kategori" => $kategori,
        "harga" => $harga,
        "bukti" => $alamatFile
    ];
}

header("Location: dashboard.php");
exit;
