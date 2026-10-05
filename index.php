<?php
include 'config/koneksi.php';
$judul = null; // beranda pakai judul default
$footerExtra = ' Dibuat untuk belajar.';
include 'components/layout/head.php';
?>

<!-- Ticker -->
<div class="w-full overflow-hidden whitespace-nowrap border-b border-line bg-gradient-to-r from-dark via-[#1a1d28] to-dark py-2 sm:py-2.5">
    <div class="inline-block animate-ticker">
        <span class="inline-block font-display text-[.78rem] font-semibold tracking-wide text-primary sm:text-[.88rem]">💻 BELAJAR CODING BARENG &nbsp; &bull; &nbsp; 🚀 BANGUN PORTOFOLIO NYATA &nbsp; &bull; &nbsp; 🤝 KOMUNITAS SUPORTIF &nbsp; &bull; &nbsp; 📢 PENDAFTARAN ANGGOTA BARU DIBUKA &nbsp; &bull; &nbsp; 💻 BELAJAR CODING BARENG &nbsp; &bull; &nbsp; 🚀 BANGUN PORTOFOLIO NYATA &nbsp; &bull; &nbsp; 🤝 KOMUNITAS SUPORTIF &nbsp; &bull; &nbsp; 📢 PENDAFTARAN ANGGOTA BARU DIBUKA &nbsp; &bull; &nbsp;</span>
    </div>
</div>

<!-- Hero -->
<section class="grid grid-cols-1 items-center gap-8 bg-dark px-[5%] pb-12 pt-10 text-white sm:px-[6%] sm:pb-[60px] sm:pt-[50px] min-[860px]:grid-cols-[minmax(0,1.1fr)_minmax(0,.9fr)] min-[860px]:gap-9 lg:pb-20 lg:pt-[70px] xl:gap-[50px] xl:px-[8%] xl:pb-[100px] xl:pt-[90px]">
    <div class="min-w-0">
        <div class="mb-[22px] inline-flex max-w-full flex-wrap items-center gap-2 rounded-full border border-primary/30 bg-primary/10 px-3 py-1.5 text-[.76rem] font-medium text-primary animate-badgeGlow sm:px-3.5 sm:text-[.82rem]">
            <span class="inline-block h-[7px] w-[7px] shrink-0 rounded-full bg-mint shadow-[0_0_6px_#4fd1a5] animate-dotBlink"></span>
            <span class="text-[.72rem] font-bold tracking-[.06em] text-mint max-[380px]:hidden">LIVE</span>
            <span id="badge-text" class="inline-block animate-badgeFade">Semangat belajar, raih prestasi!</span>
        </div>
        <h1 class="mb-[18px] text-[clamp(1.9rem,5vw,2.6rem)] font-semibold leading-[1.2] max-[380px]:text-[1.7rem]">Belajar coding,<br>bangun <span class="text-primary">karya nyata.</span></h1>
        <p class="mb-[30px] max-w-[46ch] text-[clamp(.95rem,2.4vw,1.05rem)] text-muted">Study Club Software House adalah wadah mahasiswa belajar pemrograman bareng, saling berbagi ilmu, dan menghasilkan karya yang bisa dipakai orang lain.</p>
        <div class="flex flex-col gap-3.5 sm:flex-row sm:flex-wrap">
            <a href="daftar.php" class="<?= ui('btn') ?>">Daftar Jadi Anggota</a>
            <a href="karya.php" class="<?= ui('btnOutline') ?>">Lihat Karya Mahasiswa</a>
        </div>
    </div>

    <div class="w-full max-w-full min-w-0 overflow-hidden rounded-xl border border-line bg-surface animate-codeGlow">
        <div class="flex gap-[7px] border-b border-line bg-[#171a22] px-4 py-3">
            <span class="h-[11px] w-[11px] rounded-full bg-[#ef5a5a] animate-dotPulse"></span>
            <span class="h-[11px] w-[11px] rounded-full bg-[#f2c94c] animate-dotPulse [animation-delay:.2s]"></span>
            <span class="h-[11px] w-[11px] rounded-full bg-mint animate-dotPulse [animation-delay:.4s]"></span>
        </div>
        <pre id="typingCode" class="m-0 h-[170px] overflow-hidden whitespace-pre-wrap break-words p-4 font-mono text-[.76rem] leading-[1.75] sm:h-[190px] sm:p-[22px] sm:text-[.86rem] sm:leading-[1.9] lg:h-[210px]"></pre>
    </div>
</section>

<!-- Kenapa Gabung -->
<?php section_open('surface'); section_title('Kenapa Gabung Study Club?'); ?>
    <div class="<?= ui('grid-3') ?>">
        <?php
        $fitur = [
            ['&lt;/&gt;',  'Belajar Bareng',      'Sharing session rutin seputar bahasa pemrograman, framework, dan tools yang dipakai di industri.'],
            ['&#9733;',    'Portofolio Nyata',    'Setiap anggota didorong bikin karya yang bisa ditampilkan di halaman Karya Mahasiswa.'],
            ['&#128101;',  'Komunitas Suportif',  'Tempat bertanya dan berkembang bareng teman-teman yang punya minat sama di dunia software.'],
        ];
        foreach ($fitur as [$ikon, $judulF, $desc]): ?>
        <div class="<?= ui('featureCard') ?>">
            <div class="mb-4 flex h-[42px] w-[42px] items-center justify-center rounded-[10px] bg-primary/10 text-[1.2rem] text-primary"><?= $ikon ?></div>
            <h3 class="mb-2 text-[1.05rem]"><?= $judulF ?></h3>
            <p class="text-[.92rem] text-muted"><?= $desc ?></p>
        </div>
        <?php endforeach; ?>
    </div>
<?php section_close(); ?>

<!-- Berita Terbaru -->
<?php section_open(); section_title('Berita Terbaru'); ?>
    <div class="<?= ui('grid') ?>">
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3");
        if ($q && mysqli_num_rows($q) > 0):
            while ($row = mysqli_fetch_assoc($q)):
                $gambar = $row['gambar'] ? 'uploads/berita/' . $row['gambar'] : 'https://placehold.co/400x200?text=Berita';
                media_card('detail_berita.php?id=' . $row['id'], $gambar, 'berita', date('d M Y', strtotime($row['tanggal'])), $row['judul'], mb_strimwidth($row['isi'], 0, 90, '...'), 'Baca Selengkapnya');
            endwhile;
        else:
            empty_state('📰', 'Belum ada berita', 'Berita dan kegiatan terbaru Study Club akan muncul di sini.');
        endif; ?>
    </div>
<?php section_close(); ?>

<!-- Karya Terbaru -->
<?php section_open('surface'); section_title('Karya Mahasiswa Terbaru'); ?>
    <div class="<?= ui('grid') ?>">
        <?php
        $q2 = mysqli_query($koneksi, "SELECT * FROM karya ORDER BY tanggal DESC LIMIT 3");
        if ($q2 && mysqli_num_rows($q2) > 0):
            while ($row = mysqli_fetch_assoc($q2)):
                $gambar = $row['gambar'] ? 'uploads/karya/' . $row['gambar'] : 'https://placehold.co/400x200?text=Karya';
                media_card('detail_karya.php?id=' . $row['id'], $gambar, 'karya', date('d M Y', strtotime($row['tanggal'])), $row['judul_karya'], 'Oleh: ' . $row['nama_pembuat'], 'Lihat Karya');
            endwhile;
        else:
            empty_state('💻', 'Belum ada karya', 'Karya mahasiswa akan tampil di sini setelah diupload.', 'daftar.php', 'Daftar Jadi Anggota');
        endif; ?>
    </div>
<?php section_close(); ?>

<!-- Hubungi Kami -->
<?php section_open(); section_title('Hubungi Kami', 'Punya pertanyaan atau mau gabung? Langsung aja hubungi kami lewat kontak di bawah ini.', true); ?>
    <div class="<?= ui('contactGrid') ?>">
        <?php
        $kontak = [
            ['https://wa.me/6281234567890', '&#128241;', 'WhatsApp', '+62 812-3456-7890', true],
            ['mailto:studyclub@darmajaya.ac.id', '&#9993;', 'Email', 'studyclub@darmajaya.ac.id', false],
            ['https://www.instagram.com/darmajayashclub/', '&#128247;', 'Instagram', '@darmajayashclub', true],
        ];
        foreach ($kontak as [$href, $ikon, $nama, $teks, $blank]): ?>
        <a href="<?= $href ?>" <?= $blank ? 'target="_blank" rel="noopener"' : '' ?> class="<?= ui('contactItem') ?>">
            <div class="mx-auto mb-3.5 flex h-[52px] w-[52px] items-center justify-center rounded-full bg-primary/10 text-[1.4rem] text-primary"><?= $ikon ?></div>
            <h3 class="mb-1.5 text-[1.05rem] text-white"><?= $nama ?></h3>
            <p class="text-[.9rem] text-muted"><?= $teks ?></p>
        </a>
        <?php endforeach; ?>
    </div>
<?php section_close(); ?>


<script>
// Efek mengetik di code window
const codeSnippets = [
`<span class="text-violet-400">class</span> <span class="text-mint">StudyClub</span> {
    <span class="text-violet-400">function</span> <span class="text-primary">belajar</span>() {
        <span class="text-muted">// coding, diskusi, project</span>
        <span class="text-violet-400">return</span> <span class="text-mint">'karya nyata'</span>;
    }
}`,
`<span class="text-violet-400">function</span> <span class="text-primary">buatKarya</span>(<span class="text-mint">ide</span>) {
    <span class="text-muted">// riset, desain, ngoding</span>
    <span class="text-violet-400">const</span> hasil = ide.<span class="text-primary">wujudkan</span>();
    <span class="text-violet-400">return</span> hasil;
}`,
`<span class="text-violet-400">const</span> anggota = {
    <span class="text-primary">semangat</span>: <span class="text-mint">'tinggi'</span>,
    <span class="text-primary">belajar</span>: <span class="text-mint">'terus'</span>,
    <span class="text-primary">gabung</span>: () => <span class="text-mint">'daftar.php'</span>
};`
];

let snippetIndex = 0;
const el = document.getElementById('typingCode');

function typeSnippet(text, callback) {
    let plainLength = text.replace(/<[^>]+>/g, '').length;
    let i = 0;
    el.innerHTML = '';

    function step() {
        i++;
        el.innerHTML = visibleSlice(text, i);
        if (i < plainLength) {
            setTimeout(step, 22);
        } else {
            setTimeout(callback, 1800);
        }
    }
    step();
}

function visibleSlice(html, count) {
    let result = '';
    let visibleCount = 0;
    let inTag = false;
    for (let ch of html) {
        if (ch === '<') inTag = true;
        result += ch;
        if (!inTag && ch !== '>') visibleCount++;
        if (ch === '>') inTag = false;
        if (visibleCount >= count && !inTag) break;
    }
    return result;
}

function eraseSnippet(callback) {
    let current = el.innerHTML;
    function step() {
        if (current.length > 0) {
            current = current.slice(0, -1).replace(/<[^\/][^>]*$/, '').replace(/<\/[a-z]+>?$/i, '');
            el.innerHTML = current;
            setTimeout(step, 6);
        } else {
            callback();
        }
    }
    step();
}

function loopTyping() {
    typeSnippet(codeSnippets[snippetIndex], function() {
        eraseSnippet(function() {
            snippetIndex = (snippetIndex + 1) % codeSnippets.length;
            loopTyping();
        });
    });
}

if (el) loopTyping();

// Ganti teks badge LIVE
const badgeQuotes = [
    "Semangat belajar, raih prestasi!",
    "Satu langkah kecil, sejuta manfaat",
    "Gabung sekarang, jadi bagian dari kami",
    "Konsisten hari ini, sukses di masa depan"
];
let badgeIndex = 0;
const badgeEl = document.getElementById('badge-text');
setInterval(() => {
    badgeIndex = (badgeIndex + 1) % badgeQuotes.length;
    badgeEl.style.animation = 'none';
    badgeEl.offsetHeight;
    badgeEl.textContent = badgeQuotes[badgeIndex];
    badgeEl.style.animation = 'badgeFade 0.5s ease';
}, 3000);
</script>

<?php include 'components/layout/footer.php'; ?>
