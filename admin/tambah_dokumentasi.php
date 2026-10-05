<?php
include 'cek_login.php';
$halaman = 'dokumentasi';
$judul = 'Tambah Dokumentasi';
include 'header.php';
?>

<div class="flex items-center justify-between gap-3 mb-6">
    <h1 class="font-display text-xl md:text-2xl font-semibold text-white">Tambah Dokumentasi / Pengumuman</h1>
    <a href="dokumentasi.php" class="text-sm text-muted hover:text-primary">&larr; Kembali</a>
</div>

<div class="w-full max-w-[600px] bg-surface border border-line rounded-xl p-5 md:p-8">
    <form action="tambah_dokumentasi_proses.php" method="POST" enctype="multipart/form-data" class="space-y-5">
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Judul</label>
                <input type="text" name="judul" required class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary">
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Deskripsi (opsional)</label>
                <textarea name="deskripsi" rows="4" class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary resize-y"></textarea>
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">File (PDF / Word)</label>
                <input type="file" name="file" accept=".pdf,.doc,.docx" required class="w-full text-sm text-muted file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-[#171a21] file:font-semibold hover:file:bg-primary-dark">
            </div>
        <button type="submit" class="w-full px-6 py-3 font-semibold rounded-lg bg-primary text-[#171a21] hover:bg-primary-dark transition">Simpan Dokumentasi</button>
    </form>
</div>

<?php include 'footer.php'; ?>
