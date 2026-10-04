<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pesan Website - Study Club Software House</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="section">
    <h2>Pesan Jasa Pembuatan Website</h2>
    <div class="form-box">
        <?php if (isset($_GET['sukses'])): ?>
            <div class="alert alert-success">Pesanan berhasil dikirim! Tim kami akan menghubungi kamu segera.</div>
        <?php endif; ?>

        <form action="pesan_proses.php" method="POST">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>Kontak (Email / No. WhatsApp)</label>
                <input type="text" name="kontak" required>
            </div>
            <div class="form-group">
                <label>Jenis Website</label>
                <select name="jenis_web" required>
                    <option value="">-- Pilih Jenis Website --</option>
                    <option value="Landing Page">Landing Page</option>
                    <option value="Company Profile">Company Profile</option>
                    <option value="Toko Online / E-Commerce">Toko Online / E-Commerce</option>
                    <option value="Sistem Informasi / Aplikasi Web">Sistem Informasi / Aplikasi Web</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label>Deskripsi Kebutuhan</label>
                <textarea name="deskripsi_kebutuhan" placeholder="Ceritain kebutuhan website kamu di sini..." required></textarea>
            </div>
            <button type="submit" class="btn" style="background:var(--primary);color:#fff;width:100%;">Kirim Pesanan</button>
        </form>
    </div>
</section>

<footer>&copy; <?= date('Y') ?> Study Club Software House.</footer>
</body>
</html>