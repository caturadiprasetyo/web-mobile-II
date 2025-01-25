<?php
include 'db.php';

// Ambil data berita dari database
$sqlBerita = "SELECT * FROM berita";
$resultBerita = $conn->query($sqlBerita);

// Ambil data dokumen dari database
$sqlDocuments = "SELECT * FROM documents";
$resultDocuments = $conn->query($sqlDocuments);

// Ambil data video dari database
$sqlVideos = "SELECT * FROM videos";
$resultVideos = $conn->query($sqlVideos);

// Ambil data kontak dari database
$sqlKontak = "SELECT * FROM kontak LIMIT 1";
$resultKontak = $conn->query($sqlKontak);
$kontak = $resultKontak->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Telkom Witel Papua Barat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       /* Custom Styles */
       .carousel-item {
            height: 550px;
        }

        .carousel-caption {
            bottom: 20%;
            text-align: center;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
        }

        /* Hero Section */
        .hero {
            background-image: url('image/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Footer */
        footer {
            background-color: #f8f9fa;
            padding: 40px 0;
        }

        .footer-list {
            list-style: none;
            padding-left: 0;
        }

        .footer-list li {
            margin-bottom: 50px;
        }

        .social-link ion-icon {
            font-size: 25px;
            color: #007bff;
        }

        /* CTA Section */
        .cta {
            background-color:rgb(6, 49, 95);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .cta a {
            background-color: #ff5722;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .cta a:hover {
            background-color: #e64a19;
        }

        /* Navbar */
        .navbar {
            background-color: #ffffff;
            padding: 15px 0;
        }

        .navbar .navbar-brand img {
            height: 70px;
        }

        .navbar-nav a {
            font-weight: bold;
        }

        .navbar-toggler {
            border-color: #007bff;
        }
    </style>
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


   
    <div class="container mt-5 pt-5">
    <h2 class="text-center"></h2>
  <!-- Menampilkan Berita -->
<h3>Berita</h3>
<div class="row">
    <?php while ($row = $resultBerita->fetch_assoc()) { ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <p class="card-text"><?php echo substr($row['content'], 0, 100); ?>...</p>
                    <!-- Ganti link untuk mengarah ke halaman detail berita -->
                    <a href="berita_detail.php?id=<?php echo $row['id']; ?>">lihat selengkapnya ..</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<!-- Menampilkan Dokumen -->
<h3 class="mt-5">Dokumen</h3>
<div class="row">
    <?php while ($row = $resultDocuments->fetch_assoc()) { 
        $filePath = $row['file_path'];
        $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <?php if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) { ?>
                    <img src="<?php echo $filePath; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                <?php } elseif ($fileExtension == 'pdf') { ?>
                    <img src="image/logo-jpg.png" class="card-img-top" alt="PDF Document" style="width: 135px; height: 100px;">
                <?php } elseif (in_array($fileExtension, ['doc', 'docx'])) { ?>
                    <img src="image/word-icon.png" class="card-img-top" alt="Word Document" style="width: 100px; height: 100px;">
                <?php } elseif (in_array($fileExtension, ['xls', 'xlsx'])) { ?>
                    <img src="image/excel-icon.png" class="card-img-top" alt="Excel Document" style="width: 100px; height: 100px;">
                <?php } else { ?>
                    <img src="image/logo-documents.png" class="card-img-top" alt="Dokumen" style="width: 100px; height: 100px;">
                <?php } ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                    <p class="card-text text-primary"><?php echo $row['description']; ?></p>
                    <a href="<?php echo $filePath; ?>" download class="btn btn-success btn-sm">Download</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<!-- Menampilkan Video -->
<h3 class="mt-5">Video</h3>
<div class="video-container row">
    <?php while ($row = $resultVideos->fetch_assoc()) { ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column text-start">
                    <!-- Judul Video -->
                    <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                    
                    <!-- Deskripsi Video -->
                    <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                    
                    <!-- Video embed -->
                    <?php if (!empty($row['video_url'])) { 
                        // Menambahkan parameter autoplay=0 untuk mencegah video otomatis diputar
                        $videoUrl = htmlspecialchars($row['video_url']);
                        if (strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false) {
                            // Jika URL adalah link YouTube, menambahkan autoplay=0
                            $videoUrl = preg_replace('/(\?|\&)autoplay=[0-9]+/', '', $videoUrl) . (strpos($videoUrl, '?') === false ? '?' : '&') . 'autoplay=0';
                        }
                    ?>
                        <iframe class="mb-3 w-100" height="200" src="<?php echo $videoUrl; ?>" frameborder="0" allowfullscreen></iframe>
                    <?php } else { ?>
                        <p class="text-danger">Video tidak tersedia untuk diputar.</p>
                    <?php } ?>

                    <!-- Tombol download -->
                    <?php if (!empty($row['video_file_path']) && file_exists($row['video_file_path'])) { ?>
                        <a href="<?php echo htmlspecialchars($row['video_file_path']); ?>" download class="btn btn-success btn-sm mt-auto">Download Video</a>
                    <?php } else { ?>
                        <p class="text-danger mt-auto"></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<br>
<br>

      <!-- Footer -->
      <footer class="bg-danger text-white text-center py-3 mt-5">
        &copy; 2025 PT Witel Telkom Papua Barat. All Rights Reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
