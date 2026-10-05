<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin - Study Club Software House</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: { extend: {
    colors: { primary: { DEFAULT: '#f2a63c', dark: '#d1861f' }, mint: '#4fd1a5', ink: '#0c0e13', base: '#14171f', surface: '#1c202a', line: '#2a2f3b', muted: '#97a0b0' },
    fontFamily: { sans: ['Inter', 'Segoe UI', 'Arial', 'sans-serif'], display: ['Space Grotesk', 'Inter', 'sans-serif'] },
  } },
}
</script>
</head>
<body class="bg-ink text-[#eceef2] font-sans antialiased min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-[380px] bg-surface border border-line rounded-xl p-6 sm:p-8">
    <h2 class="font-display text-2xl font-semibold text-white mb-5">Login Admin</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="mb-5 px-4 py-3 rounded-lg text-sm bg-[#ef5a5a]/10 text-[#ef8a8a] border border-[#ef5a5a]/30">Username atau password salah!</div>
    <?php endif; ?>

    <form action="login_proses.php" method="POST" class="space-y-5">
        <div>
            <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Username</label>
            <input type="text" name="username" required class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] focus:outline-none focus:border-primary">
        </div>
        <div>
            <label class="block mb-1.5 text-sm font-semibold text-[#d7dbe3]">Password</label>
            <input type="password" name="password" required class="w-full px-3 py-2.5 bg-base border border-line rounded-lg text-[.95rem] text-[#eceef2] focus:outline-none focus:border-primary">
        </div>
        <button type="submit" class="w-full px-6 py-3 font-semibold rounded-lg bg-primary text-[#171a21] hover:bg-primary-dark transition">Login</button>
    </form>
    <p class="mt-4 text-center text-sm"><a href="../index.php" class="text-muted hover:text-primary">&larr; Kembali ke Beranda</a></p>
</div>

</body>
</html>
