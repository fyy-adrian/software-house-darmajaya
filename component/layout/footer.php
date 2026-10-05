<?php /* Penutup halaman. Opsional: $footerExtra = ' Dibuat untuk belajar.'; */ ?>
<footer class="border-t border-line bg-dark px-[5%] py-5 text-center text-[.8rem] text-[#6b7386] sm:py-[26px] sm:text-[.88rem]">
    &copy; <?= date('Y') ?> Study Club Software House.<?= htmlspecialchars($footerExtra ?? '') ?>
</footer>

<script>
// Animasi muncul sekali saat di-scroll (dimatikan jika user pilih reduced motion)
(function () {
    if (matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) return;
    const els = document.querySelectorAll('section h2, .reveal');
    els.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity .7s ease, transform .7s ease';
    });
    const io = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (!e.isIntersecting) return;
            const el = e.target;
            el.style.opacity = '1';
            el.style.transform = 'none';
            io.unobserve(el);
            // lepas style inline supaya efek hover kartu tetap normal
            setTimeout(() => { el.style.opacity = ''; el.style.transform = ''; el.style.transition = ''; }, 750);
        });
    }, { threshold: 0.15 });
    els.forEach(el => io.observe(el));
})();
</script>
</body>
</html>
