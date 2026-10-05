<?php
$judul = 'Daftar Anggota';
include 'component/layout/head.php';
?>

<?php section_open(); section_title('Form Pendaftaran Anggota'); ?>
    <div class="<?= ui('formBox') ?>">
        <?php if (isset($_GET['sukses'])): ?>
            <div class="<?= ui('alertOk') ?>">Pendaftaran berhasil dikirim! Kamu akan dihubungi lebih lanjut oleh admin.</div>
        <?php endif; ?>

        <form action="daftar_proses.php" method="POST">
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="nama_lengkap">Nama Lengkap</label>
                <input class="<?= ui('input') ?>" type="text" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="nim">NIM</label>
                <input class="<?= ui('input') ?>" type="text" id="nim" name="nim" required>
            </div>
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="jurusan">Jurusan</label>
                <input class="<?= ui('input') ?>" type="text" id="jurusan" name="jurusan" required>
            </div>
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="email">Email</label>
                <input class="<?= ui('input') ?>" type="email" id="email" name="email" required>
            </div>
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="no_hp">No. HP / WhatsApp</label>
                <input class="<?= ui('input') ?>" type="text" id="no_hp" name="no_hp" required>
            </div>
            <div class="<?= ui('group') ?>">
                <label class="<?= ui('label') ?>" for="alasan_gabung">Alasan Ingin Bergabung</label>
                <textarea class="<?= ui('input') ?> min-h-[90px] resize-y" id="alasan_gabung" name="alasan_gabung"></textarea>
            </div>
            <button type="submit" class="<?= ui('btn') ?> w-full">Kirim Pendaftaran</button>
        </form>
    </div>
<?php section_close(); ?>

<?php include 'component/layout/footer.php'; ?>
