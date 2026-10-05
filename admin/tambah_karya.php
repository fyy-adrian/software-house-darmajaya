<?php
include 'cek_login.php';
$halaman = 'karya';
$judul = 'Tambah Karya';
include 'header.php';
?>

<div class="flex items-center justify-between gap-3 mb-6">
    <h1 class="font-display text-xl md:text-2xl font-semibold text-white">Tambah Karya Mahasiswa</h1>
    <a href="karya.php" class="text-sm text-muted hover:text-primary">&larr; Kembali</a>
</div>

<div class="w-full max-w-[600px] bg-surface border border-line rounded-xl p-5 md:p-8">
    <form action="tambah_karya_proses.php" method="POST" enctype="multipart/form-data" class="space-y-5">
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Judul Karya</label>
                <input type="text" name="judul_karya" required class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary">
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Nama Pembuat</label>
                <input type="text" name="nama_pembuat" required class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary">
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Deskripsi</label>
                <textarea name="deskripsi" rows="5" required class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary resize-y"></textarea>
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Link Demo / Repo (opsional)</label>
                <input type="text" name="link_demo" placeholder="https://..." class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] placeholder-muted/60 focus:outline-none focus:border-primary">
            </div>
            <div>
                <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Gambar / Screenshot (opsional)</label>
                <input type="file" name="gambar" accept="image/*" class="w-full text-sm text-muted file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-[#171a21] file:font-semibold hover:file:bg-primary-dark">
            </div>
        <button type="submit" class="w-full px-6 py-3 font-semibold rounded-lg bg-primary text-[#171a21] hover:bg-primary-dark transition">Simpan Karya</button>
    </form>
</div>

<?php include 'footer.php'; ?>
