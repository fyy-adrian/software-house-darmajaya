<?php
include 'cek_login.php';
$halaman = 'berita';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Berita</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar"><h2>Tambah Berita Baru</h2></div>

        <div class="form-box" style="max-width:600px;">
            <form action="tambah_berita_proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" name="judul" required>
                </div>
                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea name="isi" style="min-height:150px;" required></textarea>
                </div>
                <div class="form-group">
                    <label>Gambar (opsional)</label>
                    <input type="file" name="gambar" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">Simpan Berita</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
