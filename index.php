<?php
include "db.php";

// Mengatur header agar PHP memahami isi file sebagai HTML
header('Content-Type: text/html');

// Ambil data kontak dari database
$sqlKontak = "SELECT * FROM kontak LIMIT 1";
$resultKontak = $conn->query($sqlKontak);
$kontak = $resultKontak->fetch_assoc();

// Ambil data video dari database
$sqlVideos = "SELECT * FROM videos";
$resultVideos = $conn->query($sqlVideos);
?>

<!-- Memanggil file index.html -->
<?php include('index.html'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PT Telkom Witel Papua Barat</title>
</head>

<body>

<!-- Menampilkan Video -->
<div class="container mt-5">
    <h3 class="text-center">Video Perusahaan</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php while ($row = $resultVideos->fetch_assoc()) { 
            // Hapus pengecekan YouTube dan tampilkan semua video
        ?>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <!-- Judul Video -->
                        <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                        
                        <!-- Deskripsi Video -->
                        <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                        
                        <!-- Video embed -->
                        <?php if (!empty($row['video_url'])) { 
                            // Menambahkan parameter autoplay=0 untuk mencegah video otomatis diputar
                            $videoUrl = htmlspecialchars($row['video_url']);
                        ?>
                            <div class="embed-responsive embed-responsive-16by9 mb-3">
                                <iframe class="embed-responsive-item w-100" src="<?php echo $videoUrl; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
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
</div>

<!-- Kontak Section -->
<div class="container mt-5" id="contact">
    <h2 class="text-center text-danger">Kontak</h2>
    <?php if ($kontak) { ?>
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="text-center">Alamat: <?php echo $kontak['alamat']; ?></p>
                <p class="text-center">Email: <a href="mailto:<?php echo $kontak['email']; ?>"><?php echo $kontak['email']; ?></a></p>
                <p class="text-center">Telepon: <?php echo $kontak['telepon']; ?></p>
                <p class="text-center">Ponsel: <?php echo $kontak['ponsel']; ?></p>
            </div>
        </div>
    <?php } else { ?>
        <p class="text-center">Data kontak tidak tersedia.</p>
    <?php } ?>
</div>

<!-- Footer -->
<footer class="bg-danger text-white text-center py-3 mt-5">
    &copy; 2025 PT Witel Telkom Papua Barat. All Rights Reserved.
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
