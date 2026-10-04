<?php
include 'cek_login.php';
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama      = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $keahlian  = mysqli_real_escape_string($koneksi, $_POST['keahlian']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $link      = mysqli_real_escape_string($koneksi, $_POST['link_portofolio']);
    $nama_file = "";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $folder_upload = "../uploads/portofolio/";
        if (!is_dir($folder_upload)) {
            mkdir($folder_upload, 0777, true);
        }
        $ekstensi = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        $ekstensi_diizinkan = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($ekstensi, $ekstensi_diizinkan)) {
            $nama_file = uniqid('portofolio_') . '.' . $ekstensi;
            move_uploaded_file($_FILES['foto']['tmp_name'], $folder_upload . $nama_file);
        }
    }

    $sql = "INSERT INTO portofolio_anggota (nama, keahlian, deskripsi, link_portofolio, foto)
            VALUES ('$nama', '$keahlian', '$deskripsi', '$link', '$nama_file')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: portofolio.php?sukses=1");
        exit;
    } else {
        die("Gagal menyimpan portofolio: " . mysqli_error($koneksi));
    }
}
?>