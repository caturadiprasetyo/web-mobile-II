<?php
include 'db.php';

// Mengambil data kontak dari database
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

        .text-justify {
        text-align: justify;
        }

        /* Hero Section */
        .hero {
            background-image: url('image/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin-top: 220px;
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
            margin-bottom: 10px;
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

    <!-- Hero Section -->
    <section class="hero">
    <div class="container text-danger text-center">
        <h1 class="display-4">PT Telkom Witel Papua Barat</h1>
        <p class="lead text-dark text-justify"> 
            PT Telkom Witel Papua Barat adalah salah satu wilayah kerja PT Telekomunikasi 
            Indonesia yang berada di bawah Regional VII Kawasan Timur Indonesia (KTI). Witel Papua Barat melayani
            area Provinsi Papua Barat, termasuk Kota Sorong, Kabupaten Sorong, Manokwari, Fakfak, dan wilayah lainnya. Fokus operasionalnya adalah menyediakan layanan telekomunikasi, internet, dan solusi digital untuk mendukung pertumbuhan ekonomi, pendidikan, dan pemerintahan di Papua Barat.
        </p>
        <br>
        <h3 class="text-start">Perkembangan dan Layanan</h3>
        <p>
            <ul>
                <li class="text-justify text-dark">Era Telepon Kabel: Sejarah Telkom di Papua Barat 
                dimulai dengan penyediaan layanan telekomunikasi tradisional seperti 
                telepon kabel untuk kebutuhan komunikasi masyarakat dan instansi pemerintahan.</li>
                <li class="text-justify text-dark mt-2">
                Digitalisasi: Dengan perkembangan teknologi, Telkom Witel Papua Barat mulai 
                menyediakan layanan internet, seperti IndiHome dan jaringan serat optik (fiber optic), 
                untuk meningkatkan konektivitas di wilayah yang cukup menantang secara geografis.
                </li>
                <li class="text-justify text-dark mt-2">
                Ekspansi Infrastruktur: Telkom turut membangun infrastruktur telekomunikasi di wilayah terpencil 
                dan pulau-pulau di Papua Barat. Salah satunya adalah pemasangan kabel bawah laut yang 
                menghubungkan Papua Barat dengan wilayah lain di Indonesia.
                </li>
                <li class="text-justify text-dark mt-2">
                Transformasi Digital: Witel Papua Barat mendukung inisiatif transformasi digital nasional melalui 
                layanan ICT (Information and Communication Technology) untuk segmen bisnis, pemerintahan, UMKM, 
                hingga pendidikan.
                </li>
            </ul>
            <br>
        </p>
        <h3 class="text-start">Visi & Misi</h3>
            <p class="text-justify text-dark">Telkom Witel Papua Barat memiliki peran strategis dalam memperluas jaringan dan memastikan pemerataan akses 
                telekomunikasi di Indonesia bagian timur. Misinya adalah mendukung pemerataan digitalisasi, meningkatkan 
                konektivitas masyarakat, serta mendorong pertumbuhan ekonomi di Papua Barat.
            </p>
        <br>
        <h3 class="text-start">Inisiatif Sosial</h3>
        <p class="text-justify text-dark">
        Telkom Witel Papua Barat memiliki peran strategis dalam memperluas jaringan dan memastikan pemerataan akses telekomunikasi di Indonesia bagian timur. 
        Misinya adalah mendukung pemerataan digitalisasi, meningkatkan konektivitas masyarakat, serta mendorong pertumbuhan ekonomi di Papua Barat.
        </p>
    </div>
</section>

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
