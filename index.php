<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Study Club Software House</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/style.css?v=2">
</head>
<body>

<?php include 'component\layout\navbar\index.php'; ?>

<div class="ticker-wrap">
    <div class="ticker">
        <span>💻 BELAJAR CODING BARENG &nbsp; &bull; &nbsp; 🚀 BANGUN PORTOFOLIO NYATA &nbsp; &bull; &nbsp; 🤝 KOMUNITAS SUPORTIF &nbsp; &bull; &nbsp; 📢 PENDAFTARAN ANGGOTA BARU DIBUKA &nbsp; &bull; &nbsp; 💻 BELAJAR CODING BARENG &nbsp; &bull; &nbsp; 🚀 BANGUN PORTOFOLIO NYATA &nbsp; &bull; &nbsp; 🤝 KOMUNITAS SUPORTIF &nbsp; &bull; &nbsp; 📢 PENDAFTARAN ANGGOTA BARU DIBUKA &nbsp; &bull; &nbsp;</span>
    </div>
</div>
<section class="hero">
    <div>
        <div class="hero-badge"><span class="live-dot"></span> <span class="live-label">LIVE</span> <span id="badge-text">Semangat belajar, raih prestasi!</span></div>
        <h1>Belajar coding,<br>bangun <span class="accent-line">karya nyata.</span></h1>
        <p>Study Club Software House adalah wadah mahasiswa belajar pemrograman bareng, saling berbagi ilmu, dan menghasilkan karya yang bisa dipakai orang lain.</p>
        <div class="hero-actions">
            <a href="daftar.php" class="btn">Daftar Jadi Anggota</a>
            <a href="karya.php" class="btn btn-outline">Lihat Karya Mahasiswa</a>
        </div>
    </div>
    <div class="code-window">
        <div class="cw-head"><span></span><span></span><span></span></div>
        <pre class="cw-body" id="typingCode"></pre>
    </div>
</section>

<section class="section">
    <h2>Kenapa Gabung Study Club?</h2>
    <div class="grid">
        <div class="card feature-card">
            <div class="f-icon">&lt;/&gt;</div>
            <h3>Belajar Bareng</h3>
            <p>Sharing session rutin seputar bahasa pemrograman, framework, dan tools yang dipakai di industri.</p>
        </div>
        <div class="card feature-card">
            <div class="f-icon">&#9733;</div>
            <h3>Portofolio Nyata</h3>
            <p>Setiap anggota didorong bikin karya yang bisa ditampilkan di halaman Karya Mahasiswa.</p>
        </div>
        <div class="card feature-card">
            <div class="f-icon">&#128101;</div>
            <h3>Komunitas Suportif</h3>
            <p>Tempat bertanya dan berkembang bareng teman-teman yang punya minat sama di dunia software.</p>
        </div>
    </div>
</section>


<section class="section">
    <h2>Berita Terbaru</h2>
    <div class="grid">
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3");
        if (mysqli_num_rows($q) > 0):
            while ($row = mysqli_fetch_assoc($q)):
                $gambar = $row['gambar'] ? 'uploads/berita/' . $row['gambar'] : 'https://placehold.co/400x200?text=Berita';
        ?>
       <a href="detail_berita.php?id=<?= $row['id'] ?>" class="card">
   <div class="card-img-wrap">
    <img src="<?= htmlspecialchars($gambar) ?>" alt="berita">
    <span class="card-date"><?= date('d M Y', strtotime($row['tanggal'])) ?></span>
    <h3 class="card-title-overlay"><?= htmlspecialchars($row['judul']) ?></h3>
</div>
<div class="card-body">
    <p><?= htmlspecialchars(mb_strimwidth($row['isi'], 0, 90, '...')) ?></p>
    <span class="card-btn">Baca Selengkapnya &rarr;</span>
</div>
</a>
        <?php endwhile; else: ?>
            <p>Belum ada berita.</p>
        <?php endif; ?>
    </div>
</section>

<section class="section">   
    <h2>Karya Mahasiswa Terbaru</h2>
    <div class="grid">
        <?php
        $q2 = mysqli_query($koneksi, "SELECT * FROM karya ORDER BY tanggal DESC LIMIT 3");
        if (mysqli_num_rows($q2) > 0):
            while ($row = mysqli_fetch_assoc($q2)):
                $gambar = $row['gambar'] ? 'uploads/karya/' . $row['gambar'] : 'https://placehold.co/400x200?text=Karya';
        ?>
    <a href="detail_karya.php?id=<?= $row['id'] ?>" class="card">
    <div class="card-img-wrap">
    <img src="<?= htmlspecialchars($gambar) ?>" alt="karya">
    <span class="card-date"><?= date('d M Y', strtotime($row['tanggal'])) ?></span>
    <h3 class="card-title-overlay"><?= htmlspecialchars($row['judul_karya']) ?></h3>
</div>
<div class="card-body">
    <p>Oleh: <?= htmlspecialchars($row['nama_pembuat']) ?></p>
    <span class="card-btn">Lihat Karya &rarr;</span>
</div>
</a>
        <?php endwhile; else: ?>
            <p>Belum ada karya yang diupload.</p>
        <?php endif; ?>
    </div>
</section>

<section class="section" style="text-align:center;">
    <h2 style="text-align:center;">Hubungi Kami</h2>
    <p style="color:var(--text-muted); max-width:50ch; margin:0 auto 40px;">
        Punya pertanyaan atau mau gabung? Langsung aja hubungi kami lewat kontak di bawah ini.
    </p>
    <div class="contact-grid">
        <a href="https://wa.me/6281234567890" target="_blank" class="contact-item">
            <div class="contact-icon">&#128241;</div>
            <h3>WhatsApp</h3>
            <p>+62 812-3456-7890</p>
        </a>
        <a href="mailto:studyclub@darmajaya.ac.id" class="contact-item">
            <div class="contact-icon">&#9993;</div>
            <h3>Email</h3>
            <p>studyclub@darmajaya.ac.id</p>
        </a>
       <a href="https://www.instagram.com/darmajayashclub/" target="_blank" class="contact-item">
    <div class="contact-icon">&#128247;</div>
    <h3>Instagram</h3>
    <p>@darmajayashclub</p>
</a>
    </div>
</section>

<footer>
    &copy; <?= date('Y') ?> Study Club Software House. Dibuat untuk belajar.
</footer>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.fade-in, .section h2, .card, .contact-item, .feature-card');
    items.forEach(el => el.classList.add('fade-in'));

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            } else {
                entry.target.classList.remove('visible');
            }
        });
    }, { threshold: 0.15 });

    items.forEach(el => observer.observe(el));
});
</script>
<script>
const codeSnippets = [
`<span class="c1">class</span> <span class="c2">StudyClub</span> {
    <span class="c1">function</span> <span class="c3">belajar</span>() {
        <span class="c4">// coding, diskusi, project</span>
        <span class="c1">return</span> <span class="c2">'karya nyata'</span>;
    }
}`,
`<span class="c1">function</span> <span class="c3">buatKarya</span>(<span class="c2">ide</span>) {
    <span class="c4">// riset, desain, ngoding</span>
    <span class="c1">const</span> hasil = ide.<span class="c3">wujudkan</span>();
    <span class="c1">return</span> hasil;
}`,
`<span class="c1">const</span> anggota = {
    <span class="c3">semangat</span>: <span class="c2">'tinggi'</span>,
    <span class="c3">belajar</span>: <span class="c2">'terus'</span>,
    <span class="c3">gabung</span>: () => <span class="c2">'daftar.php'</span>
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
        let visible = visibleSlice(text, i);
        el.innerHTML = visible;
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
</script>
<script>
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
</body>
</html>