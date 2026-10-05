<?php
// Menu: [href, ikon bootstrap-icons, label, file-file yang menandai menu ini aktif]
$menu = [
    ['/studyclub',       'bi-house-door', 'Beranda',         ['index.php']],
    ['berita.php',       'bi-newspaper',  'Berita',          ['berita.php', 'detail_berita.php']],
    ['karya.php',        'bi-code-slash', 'Karya Mahasiswa', ['karya.php', 'detail_karya.php']],
    ['dokumentasi.php',  'bi-images',     'Dokumentasi',     ['dokumentasi.php']],
    ['pesan.php',        'bi-chat-dots',  'Pesan Web',       ['pesan.php']],
    ['pendiri.php',      'bi-people',     'Pendiri',         ['pendiri.php']],
    ['daftar.php',       'bi-person-plus','Daftar Anggota',  ['daftar.php']],
];
$halaman = basename($_SERVER['SCRIPT_NAME']);

// style tombol bulat bersama (hamburger & close)
$iconBtn = 'flex shrink-0 cursor-pointer items-center justify-center rounded-xl border border-line bg-surface text-primary transition duration-200 hover:border-primary hover:bg-primary/10 hover:shadow-[0_6px_18px_rgba(242,166,60,.22)] active:scale-[.92] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[3px] focus-visible:outline-primary';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<nav class="sticky top-0 z-[100] flex flex-nowrap items-center justify-between gap-3 border-b border-line bg-dark px-[5%] py-3 text-white min-[601px]:gap-6 min-[601px]:py-4 min-[1025px]:px-[8%] min-[1025px]:py-[18px]">

    <!-- Logo -->
    <a href="/studyclub" class="flex min-w-0 items-center gap-2.5 font-display min-[601px]:gap-3">
        <img src="./assets/img/logo.jpg" alt="Darmajaya Software House"
             class="block h-10 w-10 shrink-0 rounded-full bg-[#f7d149] object-cover p-1 shadow-[0_2px_8px_rgba(0,0,0,.15)] min-[601px]:h-[46px] min-[601px]:w-[46px]">
        <div class="flex min-w-0 flex-col justify-center leading-[1.35]">
            <span class="text-[.85rem] font-bold tracking-[.02em] text-white min-[381px]:text-[.92rem] min-[601px]:text-[1.05rem]">Darmajaya Software House</span>
            <span class="text-[.6rem] font-medium tracking-[.03em] text-muted max-[380px]:hidden min-[601px]:text-[.68rem]">Study Club Prodi Teknik Informatika - IIB Darmajaya |  18 September 2026</span>
        </div>
    </a>

    <!-- Tombol hamburger -->
    <button id="menuToggle" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="navMenu"
            class="<?= $iconBtn ?> h-[42px] w-[42px] text-[1.5rem] min-[601px]:h-11 min-[601px]:w-11">
        <i class="bi bi-list leading-none"></i>
    </button>

    <!-- Overlay -->
    <div id="navOverlay" data-open="false"
         class="invisible fixed inset-0 z-[1040] bg-[rgba(8,9,13,.65)] opacity-0 backdrop-blur-[3px] transition-[opacity,visibility] duration-300 data-[open=true]:visible data-[open=true]:opacity-100"></div>

    <!-- Sidebar -->
    <ul id="navMenu" data-open="false"
        class="invisible fixed right-0 top-0 z-[1050] flex h-screen h-dvh w-full max-w-full translate-x-[105%] list-none flex-col items-stretch gap-1 overflow-y-auto overflow-x-hidden overscroll-contain border-l border-line bg-dark px-4 pb-[calc(20px+env(safe-area-inset-bottom,0px))] text-left shadow-[-10px_0_40px_rgba(0,0,0,.45)] [scrollbar-color:#2a2f3b_transparent] [scrollbar-width:thin] [transition:transform_.35s_cubic-bezier(.22,.8,.3,1),visibility_0s_linear_.35s] will-change-transform data-[open=true]:visible data-[open=true]:translate-x-0 data-[open=true]:[transition:transform_.35s_cubic-bezier(.22,.8,.3,1),visibility_0s] max-[600px]:border-l-0 max-[600px]:px-[18px] max-[600px]:shadow-none min-[601px]:w-[380px] min-[1025px]:w-[340px]">

        <li class="sticky top-0 z-[2] mb-2 flex shrink-0 items-center justify-between border-b border-line bg-dark pb-3 pt-3.5 min-[601px]:pb-3.5 min-[601px]:pt-4 [@media(max-height:480px)]:pb-2 [@media(max-height:480px)]:pt-2.5">
            <span class="font-display text-[.85rem] font-bold uppercase tracking-[.14em] text-primary min-[601px]:text-[.8rem]">Menu</span>
            <button id="navClose" type="button" aria-label="Tutup menu"
                    class="<?= $iconBtn ?> group h-11 w-11 text-[1.25rem]">
                <i class="bi bi-x-lg leading-none transition-transform duration-300 group-hover:rotate-90"></i>
            </button>
        </li>

        <?php foreach ($menu as [$href, $ikon, $label, $files]):
            $aktif = in_array($halaman, $files, true); ?>
        <li class="shrink-0">
            <a href="<?= $href ?>" <?= $aktif ? 'aria-current="page"' : '' ?>
               class="group relative flex items-center justify-start gap-3.5 whitespace-nowrap rounded-[10px] p-3.5 text-left text-base font-medium transition-[background,color,padding,transform] duration-200 before:absolute before:inset-y-[20%] before:left-0 before:w-[3px] before:origin-center before:rounded-[3px] before:bg-gradient-to-b before:from-primary before:to-mint before:transition-transform before:duration-200 hover:bg-primary/10 hover:pl-5 hover:text-primary hover:before:scale-y-100 active:scale-[.97] active:bg-primary/20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary min-[601px]:px-3.5 min-[601px]:py-3 min-[601px]:text-[.95rem] [@media(max-height:480px)]:!py-[9px] <?= $aktif ? 'bg-primary/15 font-semibold text-primary before:scale-y-100' : 'text-[#cbd2dd] before:scale-y-0' ?>">
                <i class="bi <?= $ikon ?> text-[1.25rem] transition duration-200 group-hover:-rotate-6 group-hover:scale-[1.15] group-hover:text-primary min-[601px]:text-[1.15rem] <?= $aktif ? 'text-primary' : 'text-muted' ?>"></i>
                <?= $label ?>
            </a>
        </li>
        <?php endforeach; ?>

        <!-- Login Admin (paling bawah) -->
        <li class="mt-auto shrink-0 pt-3.5 [@media(max-height:480px)]:pt-2">
            <a href="admin/login.php"
               class="flex items-center justify-center gap-3.5 rounded-[10px] bg-primary px-[18px] py-3.5 text-base font-semibold text-[#171a21] transition duration-200 hover:-translate-y-0.5 hover:bg-primarydark hover:shadow-[0_8px_20px_rgba(242,166,60,.28)] active:scale-[.97] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary min-[601px]:py-3 min-[601px]:text-[.92rem]">
                <i class="bi bi-box-arrow-in-right"></i> Login Admin
            </a>
        </li>
    </ul>
</nav>

<script>
(function () {
    const toggle   = document.getElementById('menuToggle');
    const closeBtn = document.getElementById('navClose');
    const menu     = document.getElementById('navMenu');
    const overlay  = document.getElementById('navOverlay');

    function setOpen(open, focus = true) {
        menu.dataset.open = open;
        overlay.dataset.open = open;
        toggle.setAttribute('aria-expanded', open);
        if (!focus) return;
        if (open) closeBtn.focus({ preventScroll: true });
        else toggle.focus({ preventScroll: true });
    }

    toggle.addEventListener('click', () => setOpen(true));
    closeBtn.addEventListener('click', () => setOpen(false));
    overlay.addEventListener('click', () => setOpen(false));
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && menu.dataset.open === 'true') setOpen(false);
    });
    menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => setOpen(false, false)));
})();
</script>