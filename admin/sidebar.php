<?php /* Dipanggil dari header.php; memakai $menu dan $halaman. */ ?>
<aside id="sidebar"
       class="fixed top-16 bottom-0 left-0 z-30 w-60 bg-ink border-r border-line overflow-y-auto
              -translate-x-full lg:translate-x-0 transition-transform duration-200">
    <nav class="py-4">
        <p class="px-5 pb-2 text-[11px] font-semibold uppercase tracking-widest text-muted/70">Menu</p>
        <?php foreach ($menu as [$kunci, $file, $ikon, $label]):
            $aktif = ($halaman === $kunci); ?>
            <a href="<?= $file ?>"
               class="flex items-center gap-3 px-5 py-3 text-sm border-l-2 transition
                      <?= $aktif
                          ? 'bg-primary/10 text-primary border-primary font-semibold'
                          : 'text-muted border-transparent hover:bg-primary/10 hover:text-primary' ?>">
                <span class="text-base"><?= $ikon ?></span><?= $label ?>
            </a>
        <?php endforeach; ?>
        <div class="my-3 border-t border-line"></div>
        <a href="../index.php" class="flex items-center gap-3 px-5 py-3 text-sm text-muted border-l-2 border-transparent hover:bg-primary/10 hover:text-primary transition">
            <span class="text-base">🌐</span>Lihat Web
        </a>
        <a href="logout.php" class="flex items-center gap-3 px-5 py-3 text-sm text-muted border-l-2 border-transparent hover:bg-red-500/10 hover:text-red-400 transition">
            <span class="text-base">🚪</span>Logout
        </a>
    </nav>
</aside>
