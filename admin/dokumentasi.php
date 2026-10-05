<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'dokumentasi';
$judul = 'Kelola Dokumentasi';

$q = mysqli_query($koneksi, "SELECT * FROM dokumentasi ORDER BY tanggal DESC");
include 'header.php';
?>

<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
    <h1 class="font-display text-xl md:text-2xl font-semibold text-white">Kelola Dokumentasi &amp; Pengumuman</h1>
    <a href="tambah_dokumentasi.php" class="inline-block px-3.5 py-1.5 text-[.82rem] font-semibold rounded-md bg-primary text-[#171a21] hover:bg-primary-dark transition">+ Tambah Dokumentasi</a>
</div>

<?php if (isset($_GET['sukses'])): ?>
    <div class="mb-5 px-4 py-3 rounded-lg text-sm bg-mint/10 text-mint border border-mint/30">Berhasil disimpan!</div>
<?php endif; ?>
<?php if (isset($_GET['hapus'])): ?>
    <div class="mb-5 px-4 py-3 rounded-lg text-sm bg-mint/10 text-mint border border-mint/30">Dokumentasi berhasil dihapus.</div>
<?php endif; ?>
<div class="overflow-x-auto rounded-xl border border-line bg-surface">
<table class="w-full text-sm">
    <thead class="bg-[#171a22]">
        <tr>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">#</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Judul</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">File</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Tanggal</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-line">
        <?php $no = 1; while ($row = mysqli_fetch_assoc($q)): ?>
        <tr class="hover:bg-white/[.02]">
            <td class="px-4 py-3 text-[#cbd2dd]"><?= $no++ ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['judul']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['file']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd] whitespace-nowrap"><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd] whitespace-nowrap"><div class="flex gap-2">
                <a href="../uploads/dokumentasi/<?= htmlspecialchars($row['file']) ?>" target="_blank" class="inline-block px-3.5 py-1.5 text-[.82rem] font-semibold rounded-md bg-primary text-[#171a21] hover:bg-primary-dark transition">Lihat</a>
                <a href="hapus_dokumentasi.php?id=<?= $row['id'] ?>" class="inline-block px-3.5 py-1.5 text-[.82rem] font-semibold rounded-md bg-[#ef5a5a] text-white hover:bg-red-600 transition" onclick="return confirm('Yakin hapus dokumentasi ini?')">Hapus</a>
            </div></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>

<?php include 'footer.php'; ?>
