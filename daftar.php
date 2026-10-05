<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Anggota - Study Club Software House</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'component\layout\navbar\index.php'; ?>

<section class="section">
    <h2>Form Pendaftaran Anggota</h2>
    <div class="form-box">
        <?php if (isset($_GET['sukses'])): ?>
            <div class="alert alert-success">Pendaftaran berhasil dikirim! Kamu akan dihubungi lebih lanjut oleh admin.</div>
        <?php endif; ?>

        <form action="daftar_proses.php" method="POST">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required>
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" required>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>No. HP / WhatsApp</label>
                <input type="text" name="no_hp" required>
            </div>
            <div class="form-group">
                <label>Alasan Ingin Bergabung</label>
                <textarea name="alasan_gabung"></textarea>
            </div>
            <button type="submit" class="btn" style="background:var(--primary);color:#fff;width:100%;">Kirim Pendaftaran</button>
        </form>
    </div>
</section>

<footer>&copy; <?= date('Y') ?> Study Club Software House.</footer>
</body>
</html>
