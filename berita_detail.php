<?php
include 'db.php';

// Mengambil ID berita dari parameter URL
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Pastikan ID valid
if ($id > 0) {
    // Ambil data berita berdasarkan ID
    $sql = "SELECT * FROM berita WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $berita = $result->fetch_assoc();
    } else {
        echo "Berita tidak ditemukan.";
        exit;
    }
} else {
    echo "ID berita tidak valid.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita - PT Telkom Witel Papua Barat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand text-primary" href="#">
                <img src="./image/download__2_-removebg-preview (1).png" alt="Logo" style="height: 70px; margin-right: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="index.php">
                            <h6>Beranda</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="tentangkami.php">
                            <h6>Tentang Kami</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="infopublik.php">
                            <h6>Informasi Publik</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="kontak.php">
                            <h6>Kontak</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="login.html">
                            <h6>Login</h6>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<br><br><br>
    <div class="container mt-5 pt-5">
        <h2 class="text-center">Detail Berita</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $berita['title']; ?></h3>
                        <p class="card-text"><?php echo nl2br($berita['content']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br><br> 
<br><br><br> 
<br><br><br> 
    <!-- Footer -->
    <footer class="bg-danger text-white text-center py-3 mt-5">
        &copy; 2025 PT Witel Telkom Papua Barat. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
