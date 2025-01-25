<?php
session_start();  // Memulai sesi

// Koneksi ke database
require_once 'db.php';

// Menentukan kredensial admin
$admin_username = "admin";
$admin_password = "admin123";  // Gantilah dengan password yang lebih aman

// Memeriksa apakah form login sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil username dan password dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memeriksa apakah username dan password cocok dengan kredensial admin
    if ($username == $admin_username && $password == $admin_password) {
        // Jika cocok, buat sesi untuk admin
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = $username;

        // Redirect ke halaman dashboard admin
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Jika tidak cocok, tampilkan pesan error
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PT Telkom Witel Papua Barat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #0066cc, #33ccff);
        }
        .login-form {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #0066cc;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-login {
            width: 100%;
            background-color: #0066cc;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 4px;
        }
        .btn-login:hover {
            background-color: #004d99;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: white;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<!-- Login Container -->
<div class="login-container">
    <div class="login-form">
        <h2>Login Admin</h2>

        <!-- Menampilkan pesan error jika login gagal -->
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Form Login -->
        <form action="login.php" method="POST">
            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-login">Login</button>
        </form>

        <div class="footer">
            <p>&copy; 2025 PT Perikanan Indonesia</p>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
