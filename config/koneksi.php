<?php
// =========================================================
// FILE KONEKSI DATABASE
// Sesuaikan 4 variabel di bawah ini kalau setting XAMPP kamu beda
// Default XAMPP: host=localhost, user=root, password=kosong
// =========================================================
$host = "localhost";
$user = "root";
$pass = "";
$nama_db = "studyclub_db";

$koneksi = mysqli_connect($host, $user, $pass, $nama_db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error() .
        "<br>Pastikan XAMPP (Apache & MySQL) sudah running dan database 'studyclub_db' sudah dibuat.");
}
?>
