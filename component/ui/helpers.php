<?php
/**
 * Helper UI (Tailwind). Class yang dipakai berulang disimpan di sini
 * supaya semua halaman konsisten dan gampang diubah di satu tempat.
 */

function ui($key) {
    static $c = [
        // tombol
        'btn'         => 'inline-block cursor-pointer rounded-lg bg-primary px-6 py-3 text-center font-semibold text-[#171a21] transition duration-200 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(242,166,60,.25)]',
        'btnOutline'  => 'inline-block cursor-pointer rounded-lg border-[1.5px] border-line bg-transparent px-6 py-3 text-center font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:border-primary',
        'btnSm'       => 'inline-block rounded-md bg-primary px-3.5 py-1.5 text-[.82rem] font-semibold text-[#171a21] transition hover:brightness-110',
        // layout
        'grid'        => 'grid grid-cols-[repeat(auto-fit,minmax(min(100%,260px),340px))] justify-start gap-[18px] sm:gap-6',
        'rosterGrid'  => 'grid grid-cols-[repeat(auto-fit,minmax(min(100%,240px),280px))] justify-center gap-[18px] sm:gap-[22px]',
        'contactGrid' => 'grid grid-cols-[repeat(auto-fit,minmax(min(100%,220px),260px))] justify-center gap-[18px] sm:gap-6',
        // kartu
        'card'        => 'reveal group block min-w-0 overflow-hidden rounded-xl border border-line bg-surface transition duration-200 hover:-translate-y-1.5 hover:scale-[1.015] hover:border-primary hover:shadow-[0_12px_30px_rgba(255,140,0,.25)]',
        'featureCard' => 'reveal min-w-0 rounded-xl border border-line bg-surface p-[22px] sm:p-[26px]',
        'contactItem' => 'reveal block min-w-0 rounded-xl border border-line bg-surface px-4 py-[22px] text-center transition duration-300 hover:-translate-y-1.5 hover:border-primary hover:shadow-[0_12px_30px_rgba(242,166,60,.2)] sm:px-5 sm:py-7',
        'roster'      => 'reveal relative min-w-0 overflow-hidden rounded-2xl border border-transparent bg-gradient-to-br from-surface to-[#171a24] px-[22px] py-7 text-center transition duration-300 animate-cardGlow hover:-translate-y-[5px]',
        // form
        'formBox'     => 'mx-auto w-full max-w-[520px] rounded-xl border border-line bg-surface px-[18px] py-[22px] sm:p-8',
        'group'       => 'mb-[18px]',
        'label'       => 'mb-1.5 block text-[.88rem] font-semibold text-[#d7dbe3]',
        'input'       => 'w-full max-w-full rounded-lg border border-line bg-ink px-3 py-2.5 font-sans text-[.95rem] text-txt placeholder:text-[#6b7386] focus:border-primary focus:outline-none',
        'alertOk'     => 'mb-[18px] rounded-lg border border-mint/30 bg-mint/10 px-4 py-3 text-[.9rem] text-mint',
        'alertErr'    => 'mb-[18px] rounded-lg border border-[#ef5a5a]/30 bg-[#ef5a5a]/10 px-4 py-3 text-[.9rem] text-[#ef8a8a]',
        // teks
        'subtitle'    => 'mb-5 text-base font-bold uppercase tracking-[.08em] text-primary',
        'muted'       => 'text-muted',
    ];
    return $c[$key] ?? '';
}

/** Buka <section> dengan glow background. $tone: 'ink' (default) atau 'surface'. */
function section_open($tone = 'ink', $extra = '') {
    $bg = $tone === 'surface' ? 'bg-surface' : 'bg-ink';
    echo '<section class="relative scroll-mt-[70px] overflow-hidden px-[5%] py-12 sm:px-[6%] sm:py-[60px] xl:scroll-mt-[100px] xl:px-[8%] xl:py-[70px] ' . $bg . ' ' . $extra . '">';
    echo '<div class="pointer-events-none absolute inset-0 animate-glowMove bg-[length:150%_150%] blur-[40px] bg-[radial-gradient(circle_at_10%_20%,rgba(242,166,60,.10)_0%,transparent_35%),radial-gradient(circle_at_90%_80%,rgba(79,209,165,.08)_0%,transparent_35%)]"></div>';
    echo '<div class="relative z-10">';
}

function section_close() {
    echo '</div></section>';
}

/** Judul section + subjudul opsional. */
function section_title($text, $sub = null, $center = false) {
    $align = $center ? 'text-center' : 'text-left';
    $mb = $sub ? 'mb-3' : 'mb-6 sm:mb-[34px]';
    echo '<h2 class="' . $mb . ' ' . $align . ' text-[clamp(1.35rem,3.5vw,1.7rem)] font-semibold">' . htmlspecialchars($text) . '</h2>';
    if ($sub) {
        $m = $center ? 'mx-auto' : '';
        echo '<p class="' . $m . ' mb-8 max-w-[60ch] text-muted sm:mb-10 ' . $align . '">' . htmlspecialchars($sub) . '</p>';
    }
}

/** Tampilan ketika data kosong / tidak ditemukan. */
function empty_state($icon, $title, $desc, $href = null, $label = null) { ?>
    <div class="col-span-full w-full rounded-xl border border-dashed border-line bg-surface/60 px-6 py-12 text-center">
        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-primary/10 text-2xl text-primary"><?= $icon ?></div>
        <h3 class="mb-1 text-lg font-semibold text-white"><?= htmlspecialchars($title) ?></h3>
        <p class="mx-auto max-w-[44ch] text-sm text-muted"><?= htmlspecialchars($desc) ?></p>
        <?php if ($href): ?>
            <a href="<?= htmlspecialchars($href) ?>" class="<?= ui('btn') ?> mt-5 !px-5 !py-2.5 text-sm"><?= htmlspecialchars($label) ?></a>
        <?php endif; ?>
    </div>
<?php }

/** Kartu gambar + judul overlay (dipakai berita & karya). */
function media_card($href, $img, $alt, $tanggal, $judul, $teks, $btn) { ?>
    <a href="<?= htmlspecialchars($href) ?>" class="<?= ui('card') ?>">
        <div class="relative overflow-hidden">
            <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($alt) ?>" class="block h-[180px] w-full rounded-t-xl object-cover object-center transition-transform duration-[400ms] group-hover:scale-[1.08] sm:h-[200px]">
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-surface from-0% via-surface/55 via-35% to-transparent"></div>
            <span class="absolute left-3 top-3 z-[2] rounded-md bg-dark/85 px-3 py-[5px] text-[.75rem] font-bold tracking-wide text-primary"><?= htmlspecialchars($tanggal) ?></span>
            <h3 class="absolute inset-x-3.5 bottom-3.5 z-[2] text-base font-bold leading-[1.3] text-white sm:inset-x-4 sm:text-[1.05rem]"><?= htmlspecialchars($judul) ?></h3>
        </div>
        <div class="rounded-b-xl bg-surface p-4 sm:p-[18px]">
            <p class="mb-3.5 text-[.92rem] text-muted"><?= htmlspecialchars($teks) ?></p>
            <span class="inline-block rounded-lg border-[1.5px] border-primary px-[18px] py-[9px] text-[.85rem] font-semibold text-primary transition group-hover:bg-primary group-hover:text-[#171a21]"><?= htmlspecialchars($btn) ?> &rarr;</span>
        </div>
    </a>
<?php }

/**
 * Kartu roster (pendiri, pengurus, portofolio anggota).
 * $d: nama, badge, desc, inisial, foto (url|null), verified (bool), link (url|null), big (bool)
 */
function roster_card(array $d) {
    $big = !empty($d['big']);
    $size = $big ? 'h-[76px] w-[76px] text-[1.7rem]' : 'h-[72px] w-[72px] text-[1.6rem]';
    ?>
    <div class="<?= ui('roster') ?>">
        <?php if (!empty($d['foto'])): ?>
            <img src="<?= htmlspecialchars($d['foto']) ?>" alt="<?= htmlspecialchars($d['nama']) ?>" class="mx-auto mb-[18px] block h-[72px] w-[72px] rounded-[14px] border-2 border-primary object-cover">
        <?php else: ?>
            <div class="mx-auto mb-[18px] flex <?= $size ?> items-center justify-center rounded-[14px] bg-gradient-to-br from-primarydark to-primary font-display font-bold text-[#171a21]"><?= htmlspecialchars($d['inisial'] ?? strtoupper(substr($d['nama'], 0, 1))) ?></div>
        <?php endif; ?>
        <h3 class="mb-2.5 text-[1.05rem] text-white"><?= htmlspecialchars($d['nama']) ?></h3>
        <?php if (!empty($d['badge'])): ?>
            <span class="mb-3.5 inline-block rounded-md border border-primary/30 bg-primary/10 px-2.5 py-1 text-[.7rem] font-bold tracking-[.04em] text-primary"><?= htmlspecialchars($d['badge']) ?></span>
        <?php endif; ?>
        <p class="mb-[18px] text-[.87rem] leading-[1.6] text-muted"><?= htmlspecialchars($d['desc'] ?? '') ?></p>
        <?php if (!empty($d['link'])): ?>
            <a href="<?= htmlspecialchars($d['link']) ?>" target="_blank" rel="noopener" class="inline-block rounded-lg border-[1.5px] border-primary px-[18px] py-[9px] text-[.85rem] font-semibold text-primary transition hover:bg-primary hover:text-[#171a21]">Lihat Portofolio &rarr;</a>
        <?php endif; ?>
        <?php if (!empty($d['verified'])): ?>
            <div class="flex items-center justify-center gap-1.5 border-t border-line pt-3 text-[.72rem] font-semibold tracking-[.08em] text-mint animate-verifiedGlow before:h-[7px] before:w-[7px] before:rounded-full before:bg-mint before:shadow-[0_0_6px_#4fd1a5] before:animate-verifiedBlink">SC VERIFIED</div>
        <?php endif; ?>
    </div>
<?php }
