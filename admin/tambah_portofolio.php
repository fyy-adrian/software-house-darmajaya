<?php
include 'cek_login.php';
$halaman = 'portofolio';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Portofolio Anggota</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="admin-content">
        <div class="topbar"><h2>Tambah Portofolio Anggota</h2></div>

        <div class="form-box" style="max-width:600px;">
            <form action="tambah_portofolio_proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Anggota</label>
                    <input type="text" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Keahlian / Peran (misal: Frontend Developer)</label>
                    <input type="text" name="keahlian" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi Singkat</label>
                    <textarea name="deskripsi" style="min-height:100px;"></textarea>
                </div>
                <div class="form-group">
                    <label>Link Portofolio (web pribadi)</label>
                    <input type="text" name="link_portofolio" placeholder="https://..." required>
                </div>
                <div class="form-group">
                    <label>Foto (opsional)</label>
                    <input type="file" name="foto" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">Simpan Portofolio</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>