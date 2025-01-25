<?php
include 'db.php';

// Ambil semua data kontak dari database
$sqlKontak = "SELECT * FROM kontak";
$resultKontak = $conn->query($sqlKontak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Telkom Witel Papua Barat</title>
    <!-- Bootstrap CSS -->
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
                        <a class="nav-link text-danger" href="#index.php"><h6>Beranda</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="tentangkami.php"><h6>Tentang Kami</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="infopublik.php"><h6>Informasi Publik</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="#contact"><h6>Kontak</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="login.html"><h6>Login</h6></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mt-5 pt-5">
        <h2 class="text-center mb-4 mt-5">Informasi Kontak</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-danger text-white">
                        Kontak Kami
                    </div>
                    <div class="card-body">
                        <?php if ($resultKontak->num_rows > 0) { ?>
                            <ul class="list-group list-group-flush">
                                <?php while ($kontak = $resultKontak->fetch_assoc()) { ?>
                                    <li class="list-group-item">
                                        <p class="text-center"><strong>Alamat:</strong> <?php echo $kontak['alamat']; ?></p>
                                        <p class="text-center"><strong>Email:</strong> <a href="mailto:<?php echo $kontak['email']; ?>"><?php echo $kontak['email']; ?></a></p>
                                        <p class="text-center"><strong>Telepon:</strong> <?php echo $kontak['telepon']; ?></p>
                                        <p class="text-center"><strong>Ponsel:</strong> <?php echo $kontak['ponsel']; ?></p>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } else { ?>
                            <p class="text-center text-danger">Data kontak tidak ditemukan.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
