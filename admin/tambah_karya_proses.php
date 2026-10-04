<?php
include 'cek_login.php';
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul     = mysqli_real_escape_string($koneksi, $_POST['judul_karya']);
    $pembuat   = mysqli_real_escape_string($koneksi, $_POST['nama_pembuat']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $link      = mysqli_real_escape_string($koneksi, $_POST['link_demo']);
    $nama_file = "";

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $folder_upload = "../uploads/karya/";
        $ekstensi = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $ekstensi_diizinkan = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($ekstensi, $ekstensi_diizinkan)) {
            $nama_file = uniqid('karya_') . '.' . $ekstensi;
            move_uploaded_file($_FILES['gambar']['tmp_name'], $folder_upload . $nama_file);
        }
    }

    $sql = "INSERT INTO karya (judul_karya, nama_pembuat, deskripsi, link_demo, gambar)
            VALUES ('$judul', '$pembuat', '$deskripsi', '$link', '$nama_file')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: karya.php?sukses=1");
        exit;
    } else {
        die("Gagal menyimpan karya: " . mysqli_error($koneksi));
    }
}
?>
