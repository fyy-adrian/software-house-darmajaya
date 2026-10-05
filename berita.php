<?php
include 'config/koneksi.php';
$judul = 'Berita';
include 'component/layout/head.php';
?>

<?php section_open(); section_title('Semua Berita'); ?>
    <div class="<?= ui('grid') ?>">
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
        if ($q && mysqli_num_rows($q) > 0):
            while ($row = mysqli_fetch_assoc($q)):
                $gambar = $row['gambar'] ? 'uploads/berita/' . $row['gambar'] : 'https://placehold.co/400x200?text=Berita';
                media_card('detail_berita.php?id=' . $row['id'], $gambar, 'berita', date('d M Y', strtotime($row['tanggal'])), $row['judul'], mb_strimwidth($row['isi'], 0, 90, '...'), 'Baca Selengkapnya');
            endwhile;
        else:
            empty_state('📰', 'Belum ada berita', 'Berita dan kegiatan terbaru Study Club akan muncul di sini.', 'index.php', 'Kembali ke Beranda');
        endif; ?>
    </div>
<?php section_close(); ?>

<?php include 'component/layout/footer.php'; ?>
