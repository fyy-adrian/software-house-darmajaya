-- =========================================================
-- DATABASE: studyclub_db
-- Cara pakai: buka phpMyAdmin (http://localhost/phpmyadmin)
-- -> tab "Import" -> pilih file ini -> klik "Go"
-- Atau tinggal copy-paste semua isi file ini ke tab "SQL"
-- =========================================================

CREATE DATABASE IF NOT EXISTS studyclub_db;
USE studyclub_db;

-- Tabel admin (pengelola web)
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Akun admin default -> username: admin | password: admin123
INSERT INTO admin (username, password) VALUES
('admin', '$2y$10$sO2wCMpB3atS8QLi5eSkPecsQ1sdh0hfz6EjVFwcWSgraEUprvugK');

-- Tabel pendaftar / calon anggota study club
CREATE TABLE anggota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    nim VARCHAR(30) NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    alasan_gabung TEXT,
    tanggal_daftar DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabel berita / pengumuman yang diupload admin
CREATE TABLE berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    isi TEXT NOT NULL,
    gambar VARCHAR(255),
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabel karya mahasiswa yang diupload admin
CREATE TABLE karya (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul_karya VARCHAR(150) NOT NULL,
    nama_pembuat VARCHAR(100) NOT NULL,
    deskripsi TEXT NOT NULL,
    gambar VARCHAR(255),
    link_demo VARCHAR(255),
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
);
