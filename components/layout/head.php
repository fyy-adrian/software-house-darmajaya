<?php
/**
 * Pembuka halaman: <head>, Tailwind, navbar.
 * Set $judul sebelum include, contoh: $judul = 'Berita';
 */
require_once __DIR__ . '/../ui/helpers.php';
$judul = isset($judul) ? $judul . ' - Study Club Software House' : 'Study Club Software House';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($judul) ?></title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: { extend: {
    colors: {
      primary: '#f2a63c', primarydark: '#d1861f', mint: '#4fd1a5',
      dark: '#0c0e13', ink: '#14171f', surface: '#1c202a',
      line: '#2a2f3b', txt: '#eceef2', muted: '#97a0b0'
    },
    fontFamily: {
      sans: ['Inter', 'Segoe UI', 'Tahoma', 'Arial', 'sans-serif'],
      display: ['Space Grotesk', 'Inter', 'sans-serif'],
      mono: ['JetBrains Mono', 'monospace']
    },
    keyframes: {
      badgeGlow:    { '0%,100%': { boxShadow: '0 0 10px rgba(79,209,165,.2)' }, '50%': { boxShadow: '0 0 24px rgba(79,209,165,.55)' } },
      dotBlink:     { '0%,100%': { opacity: 1 }, '50%': { opacity: .3 } },
      dotPulse:     { '0%,100%': { opacity: 1, transform: 'scale(1)' }, '50%': { opacity: .4, transform: 'scale(1.3)' } },
      glowMove:     { '0%': { backgroundPosition: '0% 0%' }, '100%': { backgroundPosition: '100% 100%' } },
      codeGlow:     { '0%,100%': { boxShadow: '0 20px 50px rgba(0,0,0,.5), 0 0 40px rgba(242,166,60,.18)' }, '50%': { boxShadow: '0 20px 50px rgba(0,0,0,.5), 0 0 55px rgba(79,209,165,.22)' } },
      badgeFade:    { '0%': { opacity: 0, transform: 'translateY(6px)' }, '100%': { opacity: 1, transform: 'translateY(0)' } },
      tickerScroll: { '0%': { transform: 'translateX(0%)' }, '100%': { transform: 'translateX(-50%)' } },
      cardGlow:     { '0%,100%': { boxShadow: '0 0 12px rgba(242,166,60,.25)' }, '50%': { boxShadow: '0 0 20px rgba(79,209,165,.35)' } },
      verifiedBlink:{ '0%,100%': { opacity: 1, transform: 'scale(1)' }, '50%': { opacity: .35, transform: 'scale(1.4)' } },
      verifiedGlow: { '0%,100%': { textShadow: '0 0 0 transparent' }, '50%': { textShadow: '0 0 10px rgba(79,209,165,.7)' } }
    },
    animation: {
      badgeGlow: 'badgeGlow 2.5s ease-in-out infinite',
      dotBlink: 'dotBlink 1.2s ease-in-out infinite',
      dotPulse: 'dotPulse 1.6s ease-in-out infinite',
      glowMove: 'glowMove 10s ease-in-out infinite alternate',
      codeGlow: 'codeGlow 4s ease-in-out infinite',
      badgeFade: 'badgeFade .5s ease',
      ticker: 'tickerScroll 22s linear infinite',
      cardGlow: 'cardGlow 3s ease-in-out infinite',
      verifiedBlink: 'verifiedBlink 1.4s ease-in-out infinite',
      verifiedGlow: 'verifiedGlow 1.4s ease-in-out infinite'
    }
  } }
}
</script>
<style type="text/tailwindcss">
  @layer base {
    h1, h2, h3 { @apply font-display break-words; }
    p, a, span { @apply break-words; }
  }
</style>
<style>
  @media (prefers-reduced-motion: reduce) {
    *, *::before, *::after { animation: none !important; transition: none !important; }
  }
</style>
</head>
<body class="max-w-full overflow-x-hidden bg-ink font-sans leading-[1.6] text-txt">

<?php include __DIR__ . '/navbar.php'; ?>
