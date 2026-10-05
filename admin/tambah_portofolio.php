<?php
include 'cek_login.php';
$halaman = 'portofolio';
$judul = 'Tambah Portofolio Anggota';
include 'header.php';
?>

<div class="flex items-center justify-between gap-3 mb-6">
    <h1 class="font-display text-xl md:text-2xl font-semibold text-white">Tambah Portofolio Anggota</h1>
    <a href="portofolio.php" class="text-sm text-muted hover:text-primary">&larr; Kembali</a>
</div>

<div class="w-full max-w-[600px] bg-surface border border-line rounded-xl p-5 md:p-8">
    <form action="tambah_portofolio_proses.php" method="POST" enctype="multipart/form-data" class="space-y-5">
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Nama Anggota</label>
                <input type="text" name="nama" required class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary">
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Keahlian / Peran (misal: Frontend Developer)</label>
                <input type="text" name="keahlian" required class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary">
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="4" class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary resize-y"></textarea>
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Link Portofolio (web pribadi)</label>
                <input type="text" name="link_portofolio" placeholder="https://..." required class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary">
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Foto (opsional)</label>
                <input type="file" name="foto" accept="image/*" class="w-full text-sm text-muted file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-[#171a21] file:font-semibold hover:file:bg-primary-dark">
            </div>
        <button type="submit" class="w-full px-6 py-3 font-semibold rounded-lg bg-primary text-[#171a21] hover:bg-primary-dark transition">Simpan Portofolio</button>
    </form>
</div>

<?php include 'footer.php'; ?>
