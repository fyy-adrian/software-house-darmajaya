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
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body style="background:var(--dark);min-height:100vh;display:flex;align-items:center;justify-content:center;">

<div class="form-box" style="width:380px;">
    <h2 style="margin-bottom:20px;">Login Admin</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-error">Username atau password salah!</div>
    <?php endif; ?>

    <form action="login_proses.php" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn" style="background:var(--primary);color:#fff;width:100%;">Login</button>
    </form>
    <p style="margin-top:14px;text-align:center;"><a href="../index.php">&larr; Kembali ke Beranda</a></p>
</div>

</body>
</html>
