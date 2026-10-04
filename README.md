# Website Study Club Software House

Website sederhana pakai **PHP native + MySQL (XAMPP)**, dibuat untuk pemula.

## Fitur
- **Publik (tanpa login):** lihat beranda, berita, karya mahasiswa, dan daftar jadi anggota.
- **Admin (login):** dashboard, lihat data pendaftar, upload/hapus berita, upload/hapus karya mahasiswa.

## Struktur Folder
```
studyclub/
├── admin/              -> semua halaman khusus admin (butuh login)
├── assets/css/         -> file styling (style.css)
├── config/koneksi.php  -> pengaturan koneksi database
├── uploads/berita/     -> tempat gambar berita tersimpan
├── uploads/karya/      -> tempat gambar karya tersimpan
├── database.sql        -> struktur database (import ini duluan)
├── index.php, berita.php, karya.php, daftar.php, dst -> halaman publik
```

## Cara Menjalankan (Step by Step)

### 1. Install XAMPP
Download di https://www.apachefriends.org/ kalau belum punya, lalu install.

### 2. Copy folder project ke htdocs
- Buka folder instalasi XAMPP, biasanya `C:\xampp\htdocs\` (Windows) atau `/Applications/XAMPP/htdocs/` (Mac).
- Copy folder `studyclub` ini ke dalam folder `htdocs`.

### 3. Jalankan Apache & MySQL
- Buka **XAMPP Control Panel**.
- Klik **Start** pada **Apache** dan **MySQL**.

### 4. Buat & Import Database
- Buka browser, akses `http://localhost/phpmyadmin`.
- Klik tab **Import**.
- Pilih file `database.sql` dari folder project.
- Klik **Go**. Database `studyclub_db` beserta isinya (termasuk akun admin) otomatis terbuat.

### 5. Buka Website
- Di browser, akses: `http://localhost/studyclub/`
- Website publik sudah bisa diakses tanpa login.

### 6. Login sebagai Admin
- Akses: `http://localhost/studyclub/admin/login.php`
- **Username:** `admin`
- **Password:** `admin123`

> ⚠️ Ganti password ini nanti kalau website sudah dipakai beneran (lihat bagian "Ganti Password Admin" di bawah).

## Cara Ngoding/Edit di VSCode
1. Buka VSCode → **File > Open Folder** → pilih folder `studyclub` yang ada di `htdocs`.
2. Install extension **PHP Intelephense** (opsional, biar auto-complete PHP lebih enak).
3. Edit file mana pun, simpan (Ctrl+S), lalu **refresh browser** — nggak perlu restart Apache, PHP langsung baca perubahan.
4. Kalau ubah struktur tabel, edit juga `database.sql` biar dokumentasinya tetap sinkron.

## Alur Kerja Tiap Fitur (biar paham logikanya)
- **Lihat berita/karya:** `index.php` / `berita.php` / `karya.php` → query `SELECT` ke tabel `berita`/`karya` → ditampilkan pakai `while` loop.
- **Daftar anggota:** `daftar.php` (form) → submit ke `daftar_proses.php` → `INSERT` ke tabel `anggota` → redirect balik ke `daftar.php` dengan pesan sukses.
- **Login admin:** `login.php` (form) → submit ke `login_proses.php` → cek username & `password_verify()` ke tabel `admin` → kalau cocok, simpan `$_SESSION['admin_id']`.
- **Proteksi halaman admin:** setiap file di folder `admin/` (kecuali `login.php`) meng-include `cek_login.php` di baris paling atas — kalau belum login, otomatis dilempar ke halaman login.
- **Upload berita/karya:** form pakai `enctype="multipart/form-data"` → file gambar disimpan ke folder `uploads/` pakai `move_uploaded_file()`, sedangkan nama filenya disimpan di database.

## Ganti Password Admin
Untuk generate hash password baru, buat file PHP sementara isinya:
```php
<?php echo password_hash('password_baru_kamu', PASSWORD_DEFAULT); ?>
```
Jalankan di browser, copy hasilnya, lalu update kolom `password` pada tabel `admin` di phpMyAdmin dengan hash tersebut.

## Ide Pengembangan Selanjutnya
- Tambah fitur edit berita/karya (sekarang baru bisa tambah & hapus).
- Tambah pagination kalau data sudah banyak.
- Tambah validasi supaya email/NIM tidak boleh daftar dua kali.
- Bikin mahasiswa bisa login sendiri untuk upload karyanya (saat ini karya diupload lewat admin).
