<?php
include 'config/koneksi.php';
$judul = 'Karya Mahasiswa';
include 'components/layout/head.php';
?>

<?php section_open(); section_title('Karya Mahasiswa'); ?>
    <div class="<?= ui('grid') ?>">
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM karya ORDER BY tanggal DESC");
        if ($q && mysqli_num_rows($q) > 0):
            while ($row = mysqli_fetch_assoc($q)):
                $gambar = $row['gambar'] ? 'uploads/karya/' . $row['gambar'] : 'https://placehold.co/400x200?text=Karya';
                media_card('detail_karya.php?id=' . $row['id'], $gambar, 'karya', date('d M Y', strtotime($row['tanggal'])), $row['judul_karya'], 'Oleh: ' . $row['nama_pembuat'], 'Lihat Karya');
            endwhile;
        else:
            empty_state('💻', 'Belum ada karya', 'Karya mahasiswa akan tampil di sini setelah diupload.', 'daftar.php', 'Daftar Jadi Anggota');
        endif; ?>
    </div>
<?php section_close(); ?>

<?php section_open('surface'); section_title('Portofolio Anggota', 'Kunjungi web portofolio pribadi anggota Study Club untuk lihat karya lengkapnya.'); ?>
    <div class="<?= ui('rosterGrid') ?>">
        <?php
        $qp = mysqli_query($koneksi, "SELECT * FROM portofolio_anggota ORDER BY tanggal DESC");
        if ($qp && mysqli_num_rows($qp) > 0):
            while ($rowp = mysqli_fetch_assoc($qp)):
                roster_card([
                    'nama'  => $rowp['nama'],
                    'badge' => $rowp['keahlian'],
                    'desc'  => $rowp['deskripsi'],
                    'foto'  => $rowp['foto'] ? 'uploads/portofolio/' . $rowp['foto'] : null,
                    'link'  => $rowp['link_portofolio'],
                ]);
            endwhile;
        else:
            empty_state('👤', 'Belum ada portofolio anggota', 'Portofolio anggota akan ditampilkan di sini setelah ditambahkan admin.');
        endif; ?>
    </div>
<?php section_close(); ?>

<?php include 'components/layout/footer.php'; ?>
