<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
<?php include __DIR__ . '/index.css'; ?>
</style>

<nav class="navbar">
    <a href="/studyclub" class="logo">
        <img src="./assets/img/logo.jpg" alt="Darmajaya Software House" class="logo-img">
        <div class="logo-text">
            <span class="logo-title">Darmajaya Software House</span>
            <span class="logo-subtitle">Study Club Prodi Teknik Informatika - IIB Darmajaya |  18 September 2026</span>
        </div>
    </a>

    <button class="menu-toggle" id="menuToggle" aria-label="Buka menu" aria-expanded="false" aria-controls="navMenu">
        <i class="bi bi-list"></i>
    </button>
    <div class="nav-overlay" id="navOverlay"></div>

    <ul class="nav-menu" id="navMenu">
        <li class="nav-head">
            <span class="nav-head-title">Menu</span>
            <button class="nav-close" id="navClose" aria-label="Tutup menu"><i class="bi bi-x-lg"></i></button>
        </li>
        <li><a href="/studyclub"><i class="bi bi-house-door"></i> Beranda</a></li>
        <li><a href="berita.php"><i class="bi bi-newspaper"></i> Berita</a></li>
        <li><a href="karya.php"><i class="bi bi-code-slash"></i> Karya Mahasiswa</a></li>
        <li><a href="dokumentasi.php"><i class="bi bi-images"></i> Dokumentasi</a></li>
        <li><a href="pesan.php"><i class="bi bi-chat-dots"></i> Pesan Web</a></li>
        <li><a href="pendiri.php"><i class="bi bi-people"></i> Pendiri</a></li>
        <li><a href="daftar.php"><i class="bi bi-person-plus"></i> Daftar Anggota</a></li>
        <li><a href="admin/login.php" class="nav-cta"><i class="bi bi-box-arrow-in-right"></i> Login Admin</a></li>
    </ul>
</nav>

<script>
(function () {
    const toggle  = document.getElementById('menuToggle');
    const closeBtn = document.getElementById('navClose');
    const menu    = document.getElementById('navMenu');
    const overlay = document.getElementById('navOverlay');
    const links   = menu.querySelectorAll('a');

    function setOpen(open) {
        menu.classList.toggle('open', open);
        overlay.classList.toggle('show', open);
        toggle.setAttribute('aria-expanded', open);
        if (open) closeBtn.focus({ preventScroll: true });
        else toggle.focus({ preventScroll: true });
    }

    toggle.addEventListener('click', () => setOpen(true));
    closeBtn.addEventListener('click', () => setOpen(false));
    overlay.addEventListener('click', () => setOpen(false));
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && menu.classList.contains('open')) setOpen(false);
    });
    links.forEach(a => a.addEventListener('click', () => {
        menu.classList.remove('open');
        overlay.classList.remove('show');
        toggle.setAttribute('aria-expanded', false);
    }));

    // tandai menu aktif sesuai halaman
    const cur = location.pathname.split('/').filter(Boolean).pop() || 'studyclub';
    links.forEach(a => {
        if (a.classList.contains('nav-cta')) return;
        const t = a.getAttribute('href').split('/').filter(Boolean).pop();
        if (t === cur || (t === 'studyclub' && cur === 'index.php')) a.classList.add('active');
    });
})();
</script>