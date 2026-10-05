<?php
include 'config/koneksi.php';
$judul = 'Pendiri';
include 'component/layout/head.php';

// Ubah data di sini. Kosongkan array kalau datanya belum ada.
$pendiri = [
    ['nama' => 'Nama Pendiri 1', 'badge' => 'FOUNDER',    'inisial' => 'A', 'desc' => 'Deskripsi singkat kontribusi pendiri pertama dalam membangun Study Club.'],
    ['nama' => 'Nama Pendiri 2', 'badge' => 'CO-FOUNDER', 'inisial' => 'B', 'desc' => 'Deskripsi singkat kontribusi pendiri kedua dalam membangun Study Club.'],
    ['nama' => 'Nama Pendiri 3', 'badge' => 'CO-FOUNDER', 'inisial' => 'C', 'desc' => 'Deskripsi singkat kontribusi pendiri ketiga dalam membangun Study Club.'],
];
$pengurus = [
    ['nama' => 'Nama Ketua',     'badge' => 'KETUA STUDY CLUB', 'inisial' => 'K', 'desc' => 'Memimpin jalannya kegiatan belajar, project, dan koordinasi anggota Study Club.'],
    ['nama' => 'Nama Wakil',     'badge' => 'WAKIL KETUA',      'inisial' => 'W', 'desc' => 'Membantu koordinasi internal dan menjaga keberlangsungan program Study Club.'],
    ['nama' => 'Nama Sekretaris','badge' => 'SEKRETARIS',       'inisial' => 'S', 'desc' => 'Mengelola administrasi, dokumentasi kegiatan, dan komunikasi anggota.'],
];
?>

<?php section_open(); section_title('Pendiri & Pengurus Study Club', 'Sosok-sosok di balik lahirnya Study Club Software House Darmajaya.'); ?>

    <h3 class="<?= ui('subtitle') ?>">Pendiri</h3>
    <div class="<?= ui('rosterGrid') ?>">
        <?php if ($pendiri): foreach ($pendiri as $p) roster_card($p + ['verified' => true, 'big' => true]);
        else: empty_state('👤', 'Data pendiri belum tersedia', 'Informasi pendiri akan ditampilkan di sini.'); endif; ?>
    </div>

    <h3 class="<?= ui('subtitle') ?> mt-[50px]">Pengurus</h3>
    <div class="<?= ui('rosterGrid') ?>">
        <?php if ($pengurus): foreach ($pengurus as $p) roster_card($p + ['verified' => true]);
        else: empty_state('👥', 'Data pengurus belum tersedia', 'Informasi pengurus akan ditampilkan di sini.'); endif; ?>
    </div>

<?php section_close(); ?>

<?php include 'component/layout/footer.php'; ?>
