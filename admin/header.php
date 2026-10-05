<?php
// Header khusus halaman admin: <head>, Tailwind, top bar, dan sidebar.
// Sebelum include, set: $halaman (menu aktif) dan $judul (judul tab browser).
if (!isset($halaman)) $halaman = '';
if (!isset($judul))   $judul = 'Admin';
$admin_nama = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : 'Admin';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($judul) ?> - Admin Study Club</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: { DEFAULT: '#f2a63c', dark: '#d1861f' },
        mint: '#4fd1a5',
        ink: '#0c0e13',
        base: '#14171f',
        surface: '#1c202a',
        line: '#2a2f3b',
        muted: '#97a0b0',
      },
      fontFamily: {
        sans: ['Inter', 'Segoe UI', 'Arial', 'sans-serif'],
        display: ['Space Grotesk', 'Inter', 'sans-serif'],
      },
    },
  },
}
</script>
</head>
<body class="bg-base text-[#eceef2] font-sans antialiased min-h-screen">

<?php
// Daftar menu sidebar: [kunci, file, ikon, label]
$menu = [
    ['dashboard',   'dashboard.php',   '📊', 'Dashboard'],
    ['anggota',     'anggota.php',     '👥', 'Data Pendaftar'],
    ['berita',      'berita.php',      '📰', 'Kelola Berita'],
    ['karya',       'karya.php',       '🎨', 'Kelola Karya'],
    ['portofolio',  'portofolio.php',  '💼', 'Portofolio Anggota'],
    ['dokumentasi', 'dokumentasi.php', '📁', 'Dokumentasi'],
    ['pesanan',     'pesanan.php',     '🛒', 'Pesanan Website'],
];
?>

<!-- HEADER ADMIN -->
<header class="fixed top-0 inset-x-0 z-40 h-16 bg-ink border-b border-line flex items-center justify-between px-4 md:px-6">
    <div class="flex items-center gap-3">
        <button id="sidebar-toggle" type="button" aria-label="Buka menu"
                class="lg:hidden p-2 -ml-2 rounded-lg text-muted hover:text-primary hover:bg-white/5">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <a href="dashboard.php" class="font-display font-bold text-lg text-white">
            Study Club <span class="text-primary">Admin</span>
        </a>
    </div>
    <div class="flex items-center gap-3 md:gap-4">
        <span class="hidden sm:inline text-sm text-muted">Halo, <span class="text-white font-medium"><?= htmlspecialchars($admin_nama) ?></span> 👋</span>
        <a href="../index.php" target="_blank" class="hidden md:inline text-sm text-muted hover:text-primary">🌐 Lihat Web</a>
        <a href="logout.php" class="text-sm font-semibold px-3 py-1.5 rounded-lg border border-line text-[#eceef2] hover:border-red-400 hover:text-red-400 transition">Logout</a>
    </div>
</header>

<!-- Overlay sidebar (mobile) -->
<div id="sidebar-overlay" class="fixed inset-0 z-30 bg-black/60 hidden lg:hidden"></div>

<!-- SIDEBAR -->
<?php include 'sidebar.php'; ?>

<!-- KONTEN -->
<main class="pt-16 lg:pl-60 min-h-screen">
<div class="p-4 md:p-8">
