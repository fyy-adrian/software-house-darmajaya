<?php
include 'config/koneksi.php';
$judul = 'Tentang Kami';
include 'components/layout/head.php';

$sejarah = [
    ['2023', 'Awal Terbentuk',        'Study Club dimulai dari inisiatif beberapa mahasiswa yang rutin belajar bareng, membahas project sederhana, dan saling bantu tugas pemrograman.'],
    ['2024', 'Resmi Jadi Komunitas',  'Terbentuk struktur kepengurusan pertama, mulai ada agenda belajar rutin, sharing session, dan project kolaboratif antar anggota.'],
    ['2025', 'Ekspansi Program',      'Mulai membuka layanan pesan website untuk umum, membangun portofolio karya mahasiswa, dan memperluas jaringan anggota lintas angkatan.'],
    ['2026', 'Study Club Hari Ini',   'Berkembang jadi Software House yang aktif mengerjakan project nyata, mendokumentasikan karya, dan terus regenerasi anggota baru tiap tahunnya.'],
];
?>

<?php section_open(); section_title('Tentang Software House', 'Perjalanan Study Club Software House Darmajaya, dari ide sederhana menjadi wadah belajar dan berkarya bagi mahasiswa Teknik Informatika.'); ?>

    <div class="reveal mx-auto mb-[50px] max-w-[760px] rounded-xl border border-line bg-surface p-[22px] sm:p-[26px]">
        <p class="text-[.98rem] leading-[1.8] text-muted">
            Study Club Software House lahir dari keresahan sekelompok mahasiswa Teknik Informatika IIB Darmajaya yang ingin punya ruang belajar coding
            yang lebih nyata — bukan cuma teori di kelas, tapi praktik langsung lewat project, kolaborasi tim, dan mentoring antar anggota.
            Berawal dari kumpul-kumpul kecil membahas tugas kuliah, komunitas ini berkembang jadi wadah resmi yang menaungi puluhan mahasiswa
            untuk belajar web development, mobile development, dan software engineering secara konsisten.
        </p>
    </div>

    <h3 class="<?= ui('subtitle') ?>">Sejarah Singkat</h3>
    <div class="relative mx-auto max-w-[700px] border-l-2 border-line pl-[22px] sm:pl-[30px]">
        <?php foreach ($sejarah as [$tahun, $judulS, $desc]): ?>
        <div class="reveal relative mb-10 before:absolute before:-left-[29px] before:top-1 before:h-3 before:w-3 before:rounded-full before:bg-primary before:shadow-[0_0_0_4px_rgba(242,166,60,.2)] sm:before:-left-[37px]">
            <div class="mb-1.5 inline-block font-display text-base font-bold text-primary"><?= $tahun ?></div>
            <h3 class="mb-1.5 text-[1.05rem] text-white"><?= $judulS ?></h3>
            <p class="text-[.9rem] leading-[1.6] text-muted"><?= $desc ?></p>
        </div>
        <?php endforeach; ?>
    </div>

<?php section_close(); ?>

<?php include 'components/layout/footer.php'; ?>
