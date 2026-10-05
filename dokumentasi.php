<?php
include 'config/koneksi.php';
$judul = 'Dokumentasi & Pengumuman';
include 'components/layout/head.php';
?>

<?php section_open(); section_title('Dokumentasi & Pengumuman'); ?>
    <div class="mx-auto flex max-w-[900px] flex-col gap-4 xl:mx-0">
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM dokumentasi ORDER BY tanggal DESC");
        if ($q && mysqli_num_rows($q) > 0):
            while ($row = mysqli_fetch_assoc($q)):
                $ext = strtoupper(pathinfo($row['file'], PATHINFO_EXTENSION));
        ?>
        <div class="reveal flex flex-wrap items-center gap-4 rounded-xl border border-line bg-surface p-4 sm:flex-nowrap sm:p-5">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg border border-primary/30 bg-primary/10 text-xs font-bold text-primary"><?= htmlspecialchars($ext) ?></div>
            <div class="min-w-0 flex-1 basis-[200px]">
                <h3 class="text-[1.05rem] text-white"><?= htmlspecialchars($row['judul']) ?></h3>
                <?php if (!empty($row['deskripsi'])): ?>
                    <p class="mt-1 text-[.9rem] text-muted"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
                <?php endif; ?>
                <div class="mt-2 text-[.8rem] text-[#6b7386]"><?= date('d M Y', strtotime($row['tanggal'])) ?></div>
            </div>
            <a href="uploads/dokumentasi/<?= htmlspecialchars($row['file']) ?>" class="<?= ui('btnSm') ?>" download>Download</a>
        </div>
        <?php endwhile; else:
            empty_state('📄', 'Belum ada dokumentasi', 'Dokumentasi dan pengumuman Study Club akan muncul di sini.');
        endif; ?>
    </div>
<?php section_close(); ?>

<?php include 'components/layout/footer.php'; ?>
