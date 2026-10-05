<?php
include 'cek_login.php';
include '../config/koneksi.php';
$halaman = 'anggota';
$judul = 'Data Pendaftar';

$q = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY tanggal_daftar DESC");
include 'header.php';
?>

<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
    <h1 class="font-display text-xl md:text-2xl font-semibold text-white">Data Pendaftar Anggota</h1>
</div>

<div class="overflow-x-auto rounded-xl border border-line bg-surface">
<table class="w-full text-sm">
    <thead class="bg-[#171a22]">
        <tr>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">#</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Nama</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">NIM</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Jurusan</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Email</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">No. HP</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Alasan Gabung</th>
            <th class="px-4 py-3 text-left font-semibold text-[#d7dbe3] whitespace-nowrap">Tanggal Daftar</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-line">
        <?php $no = 1; while ($row = mysqli_fetch_assoc($q)): ?>
        <tr class="hover:bg-white/[.02]">
            <td class="px-4 py-3 text-[#cbd2dd]"><?= $no++ ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['nama_lengkap']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['nim']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['jurusan']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['email']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd]"><?= htmlspecialchars($row['no_hp']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd] min-w-[220px]"><?= htmlspecialchars($row['alasan_gabung']) ?></td>
            <td class="px-4 py-3 text-[#cbd2dd] whitespace-nowrap"><?= date('d M Y H:i', strtotime($row['tanggal_daftar'])) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>

<?php include 'footer.php'; ?>
