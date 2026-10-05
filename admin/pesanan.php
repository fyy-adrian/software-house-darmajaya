<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'pesanan';
$judul = 'Pesanan Website';

$q = mysqli_query($koneksi, "SELECT * FROM pesanan_web ORDER BY tanggal DESC");
include 'header.php';
?>

<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
    <h1 class="font-display text-xl md:text-2xl font-semibold text-white">Pesanan Jasa Pembuatan Website</h1>
</div>

<?php if (isset($_GET['hapus'])): ?>
    <div class="mb-5 px-4 py-3 rounded-lg text-sm bg-mint/10 text-mint border border-mint/30">Pesanan berhasil dihapus.</div>
<?php endif; ?>
<div class="overflow-x-auto rounded-xl border border-line bg-surface">
<table class="w-full text-sm">
    <thead class="bg-[#171a22]">
        <tr>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">#</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Nama</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Kontak</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Jenis Web</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Deskripsi Kebutuhan</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Tanggal</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-line">
        <?php $no = 1; while ($row = mysqli_fetch_assoc($q)): ?>
        <tr class="hover:bg-white/[.02]">
            <td class="px-4 py-3 text-[#cbd2dd]"><?= $no++ ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['nama']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['kontak']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['jenis_web']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd] min-w-[220px]"><?= htmlspecialchars($row['deskripsi_kebutuhan']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd] whitespace-nowrap"><?= date('d M Y H:i', strtotime($row['tanggal'])) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd] whitespace-nowrap"><div class="flex gap-2">
                <a href="hapus_pesanan.php?id=<?= $row['id'] ?>" class="inline-block px-3.5 py-1.5 text-[.82rem] font-semibold rounded-md bg-[#ef5a5a] text-white hover:bg-red-600 transition" onclick="return confirm('Yakin hapus pesanan ini?')">Hapus</a>
            </div></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>

<?php include 'footer.php'; ?>
