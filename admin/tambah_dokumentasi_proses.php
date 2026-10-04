<?php
include 'cek_login.php';
$halaman = 'dokumentasi';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Dokumentasi</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar"><h2>Tambah Dokumentasi / Pengumuman</h2></div>

        <div class="form-box" style="max-width:600px;">
            <form action="tambah_dokumentasi_proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi (opsional)</label>
                    <textarea name="deskripsi" style="min-height:100px;"></textarea>
                </div>
                <div class="form-group">
                    <label>File (PDF / Word)</label>
                    <input type="file" name="file" accept=".pdf,.doc,.docx" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">Simpan Dokumentasi</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>