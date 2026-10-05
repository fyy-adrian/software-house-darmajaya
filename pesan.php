<?php
$judul = 'Pesan Website';
include 'component/layout/head.php';
?>

<?php section_open(); section_title('Pesan Jasa Pembuatan Website'); ?>
    <div class="<?= ui('formBox') ?>">
        <?php if (isset($_GET['sukses'])): ?>
            <div class="<?= ui('alertOk') ?>">Pesanan berhasil dikirim! Tim kami akan menghubungi kamu segera.</div>
        <?php endif; ?>

        <form action="pesan_proses.php" method="POST">
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="nama">Nama Lengkap</label>
                <input class="<?= ui('input') ?>" type="text" id="nama" name="nama" required>
            </div>
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="kontak">Kontak (Email / No. WhatsApp)</label>
                <input class="<?= ui('input') ?>" type="text" id="kontak" name="kontak" required>
            </div>
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="jenis_web">Jenis Website</label>
                <select class="<?= ui('input') ?>" id="jenis_web" name="jenis_web" required>
                    <option value="">-- Pilih Jenis Website --</option>
                    <option value="Landing Page">Landing Page</option>
                    <option value="Company Profile">Company Profile</option>
                    <option value="Toko Online / E-Commerce">Toko Online / E-Commerce</option>
                    <option value="Sistem Informasi / Aplikasi Web">Sistem Informasi / Aplikasi Web</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="deskripsi_kebutuhan">Deskripsi Kebutuhan</label>
                <textarea class="<?= ui('input') ?> min-h-[90px] resize-y" id="deskripsi_kebutuhan" name="deskripsi_kebutuhan" placeholder="Ceritain kebutuhan website kamu di sini..." required></textarea>
            </div>
            <button type="submit" class="<?= ui('btn') ?> w-full">Kirim Pesanan</button>
        </form>
    </div>
<?php section_close(); ?>

<?php include 'component/layout/footer.php'; ?>
