<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'dashboard';
$judul = 'Dashboard';

$total_anggota = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as jml FROM anggota"))['jml'];
$total_berita  = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as jml FROM berita"))['jml'];
$total_karya   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as jml FROM karya"))['jml'];

$stat = [
    ['Total Pendaftar', $total_anggota, '👥', 'anggota.php'],
    ['Total Berita',    $total_berita,  '📰', 'berita.php'],
    ['Total Karya',     $total_karya,   '🎨', 'karya.php'],
];
include 'header.php';
?>

<div class="mb-6">
    <h1 class="font-display text-xl md:text-2xl font-semibold text-white">Dashboard</h1>
    <p class="text-sm text-muted mt-1">Ringkasan data Study Club.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
    <?php foreach ($stat as [$label, $nilai, $ikon, $link]): ?>
    <a href="<?= $link ?>" class="block bg-surface border border-line rounded-xl p-6 transition hover:border-primary hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(242,166,60,.2)]">
        <div class="flex items-center justify-between mb-3">
            <h3 class="font-display font-semibold text-white"><?= $label ?></h3>
            <span class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-lg"><?= $ikon ?></span>
        </div>
        <p class="font-display text-4xl font-bold text-primary"><?= $nilai ?></p>
    </a>
    <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>
