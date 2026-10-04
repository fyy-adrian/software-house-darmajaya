<?php
include 'cek_login.php';
$halaman = 'karya';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Karya</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar"><h2>Tambah Karya Mahasiswa</h2></div>

        <div class="form-box" style="max-width:600px;">
            <form action="tambah_karya_proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul Karya</label>
                    <input type="text" name="judul_karya" required>
                </div>
                <div class="form-group">
                    <label>Nama Pembuat</label>
                    <input type="text" name="nama_pembuat" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" style="min-height:120px;" required></textarea>
                </div>
                <div class="form-group">
                    <label>Link Demo / Repo (opsional)</label>
                    <input type="text" name="link_demo" placeholder="https://...">
                </div>
                <div class="form-group">
                    <label>Gambar / Screenshot (opsional)</label>
                    <input type="file" name="gambar" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">Simpan Karya</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
