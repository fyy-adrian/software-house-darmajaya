<?php
include 'config/koneksi.php';
$id = intval($_GET['id'] ?? 0);
$q = mysqli_query($koneksi, "SELECT * FROM karya WHERE id = $id");
$karya = $q ? mysqli_fetch_assoc($q) : null;

if (!$karya) {
    http_response_code(404);
    $judul = 'Karya tidak ditemukan';
    include 'component/layout/head.php';
    section_open();
    empty_state('🔍', 'Karya tidak ditemukan', 'Karya yang kamu cari mungkin sudah dihapus atau link-nya salah.', 'karya.php', 'Lihat Semua Karya');
    section_close();
    include 'component/layout/footer.php';
    exit;
}

$gambar = $karya['gambar'] ? 'uploads/karya/' . $karya['gambar'] : null;
$judul = $karya['judul_karya'];
include 'component/layout/head.php';
?>

<?php section_open(); ?>
    <article class="mx-auto max-w-[800px]">
        <h1 class="mb-2 text-left text-[clamp(1.35rem,3.5vw,1.7rem)] font-semibold"><?= htmlspecialchars($karya['judul_karya']) ?></h1>
        <p class="mb-5 text-[#9ca3af]">Oleh: <?= htmlspecialchars($karya['nama_pembuat']) ?> &middot; <?= date('d M Y', strtotime($karya['tanggal'])) ?></p>
        <?php if ($gambar): ?>
            <img src="<?= htmlspecialchars($gambar) ?>" alt="<?= htmlspecialchars($karya['judul_karya']) ?>" class="mb-5 w-full rounded-xl">
        <?php endif; ?>
        <p class="whitespace-pre-line"><?= htmlspecialchars($karya['deskripsi']) ?></p>
        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
            <?php if (!empty($karya['link_demo'])): ?>
                <a href="<?= htmlspecialchars($karya['link_demo']) ?>" target="_blank" rel="noopener" class="<?= ui('btn') ?>">Lihat Demo / Link Karya</a>
            <?php endif; ?>
            <a href="karya.php" class="<?= ui('btnOutline') ?>">&larr; Kembali ke Karya</a>
        </div>
    </article>
<?php section_close(); ?>

<?php include 'component/layout/footer.php'; ?>
