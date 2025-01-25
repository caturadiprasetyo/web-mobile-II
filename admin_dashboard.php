
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top bg-white">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="image/download__2_-removebg-preview (1).png" alt="Logo" style="width: 125px; padding: 10px;">
        </a>
        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="Logout.php">
                        <strong><h5>Logout</h5></strong>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Kontainer Utama -->
    <div class="container text-danger mt-5">
        <h2>Admin Dashboard</h2>
<?php

include './db.php';


// Proses Upload Berita
if (isset($_POST['submit_berita'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "INSERT INTO berita (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        echo "Berita berhasil ditambahkan!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Proses Upload Dokumen
if (isset($_POST['submit_dokumen'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $file = $_FILES['file']['name'];
    $target = "uploads/" . basename($file);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $sql = "INSERT INTO documents (name, file_path, description) VALUES ('$name', '$target', '$description')";
        if ($conn->query($sql) === TRUE) {
            echo "Dokumen berhasil diunggah!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Gagal mengunggah dokumen.";
    }
}

if (isset($_POST['update_kontak'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $ponsel = $_POST['ponsel'];

    // Update kontak in the database
    $sql = "UPDATE kontak SET nama='$nama', alamat='$alamat', email='$email', telepon='$telepon', ponsel='$ponsel' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Kontak berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}


// Proses Upload Video
if (isset($_POST['submit_video'])) {
    $title = $_POST['video_title'];
    $description = $_POST['video_description'];

    // Pastikan file video tersedia
    if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] === UPLOAD_ERR_OK) {
        $video_file = $_FILES['video_file']['name'];
        $target = "videos/" . basename($video_file);

        // Pindahkan file video ke folder yang sesuai
        if (move_uploaded_file($_FILES['video_file']['tmp_name'], $target)) {
            // Insert data video ke database
            $sql = "INSERT INTO videos (title, video_url, description) VALUES ('$title', '$target', '$description')";
            if ($conn->query($sql) === TRUE) {
                echo "Video berhasil diunggah!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Gagal mengunggah video.";
        }
    } else {
        echo "Tidak ada file video yang diunggah atau terjadi kesalahan.";
    }
}



// Proses Hapus Berita
if (isset($_GET['delete_berita'])) {
    $id = $_GET['delete_berita'];
    $sql = "DELETE FROM berita WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Berita berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Proses Hapus Kontak
if (isset($_GET['delete_kontak'])) {
    $id = $_GET['delete_kontak'];
    $sql = "DELETE FROM kontak WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Kontak berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}


// Proses Hapus Dokumen
if (isset($_GET['delete_dokumen'])) {
    $id = $_GET['delete_dokumen'];
    $sql = "SELECT file_path FROM documents WHERE id = $id";
    $result = $conn->query($sql);
    $file = $result->fetch_assoc();
    unlink($file['file_path']);  // Hapus file dokumen dari server
    $sql = "DELETE FROM documents WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Dokumen berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Proses Hapus Video
if (isset($_GET['delete_video'])) {
    $id = $_GET['delete_video'];
    $sql = "DELETE FROM videos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Video berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Admin Dashboard</h2>

        <!-- Form Upload Berita -->
        <h3>Tambah Berita</h3>
        <form action="admin_dashboard.php" method="POST">
            <input type="text" name="title" class="form-control" placeholder="Judul Berita" required><br>
            <textarea name="content" class="form-control" placeholder="Isi Berita" required></textarea><br>
            <button type="submit" name="submit_berita" class="btn btn-primary">Upload Berita</button>
        </form>

        <hr>

        <!-- Form Upload Dokumen -->
        <h3>Tambah Dokumen</h3>
        <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" class="form-control" placeholder="Nama Dokumen" required><br>
            <textarea name="description" class="form-control" placeholder="Deskripsi Dokumen" required></textarea><br>
            <input type="file" name="file" class="form-control" required><br>
            <button type="submit" name="submit_dokumen" class="btn btn-primary">Upload Dokumen</button>
        </form>

        <hr>

        <!-- Form Upload Video -->
        <h3>Tambah Video</h3>
        <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="video_title" class="form-control" placeholder="Judul Video" required><br>
    <textarea name="video_description" class="form-control" placeholder="Deskripsi Video" required></textarea><br>
    <input type="file" name="video_file" class="form-control" accept="video/*" required><br>
    <button type="submit" name="submit_video" class="btn btn-primary">Upload Video</button>
</form>


        <hr>

        <h3>Kelola Data Kontak</h3>

        <?php
// Jika form disubmit
if (isset($_POST['update_kontak'])) {
    // Mendapatkan data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $ponsel = $_POST['ponsel'];

    // Cek apakah id sudah ada (untuk update) atau belum (untuk insert)
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update kontak yang sudah ada
        $id = $_POST['id'];
        $sql = "UPDATE kontak SET nama = '$nama', alamat = '$alamat', email = '$email', telepon = '$telepon', ponsel = '$ponsel' WHERE id = $id";
    } else {
        // Insert kontak baru
        $sql = "INSERT INTO kontak (nama, alamat, email, telepon, ponsel) VALUES ('$nama', '$alamat', '$email', '$telepon', '$ponsel')";
    }

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "Kontak berhasil disimpan!";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}

// Ambil data kontak jika ada untuk diupdate
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kontak WHERE id = $id LIMIT 1";
    $result = $conn->query($sql);
    $kontak = $result->fetch_assoc();
}
?>

<!-- Formulir untuk Menambah atau Mengedit Kontak -->
<form action="admin_dashboard.php" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($kontak['id']) ? $kontak['id'] : ''; ?>">
    <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo isset($kontak['nama']) ? $kontak['nama'] : ''; ?>" required><br>
    <textarea name="alamat" class="form-control" placeholder="Alamat" required><?php echo isset($kontak['alamat']) ? $kontak['alamat'] : ''; ?></textarea><br>
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo isset($kontak['email']) ? $kontak['email'] : ''; ?>" required><br>
    <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo isset($kontak['telepon']) ? $kontak['telepon'] : ''; ?>" required><br>
    <input type="text" name="ponsel" class="form-control" placeholder="Ponsel" value="<?php echo isset($kontak['ponsel']) ? $kontak['ponsel'] : ''; ?>" required><br>
    <button type="submit" name="update_kontak" class="btn btn-primary">Simpan</button>
</form>


<hr>
        <!-- Daftar Berita -->
<h3>Daftar Berita</h3>
<ul class="list-group">
    <?php
    $sql = "SELECT * FROM berita";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item'>";
        echo "<strong>" . $row['title'] . "</strong><br>";
        echo "<p>" . $row['content'] . "</p>";
        echo "<a href='admin_dashboard.php?edit_berita=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a> ";
        echo "<a href='admin_dashboard.php?delete_berita=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a>";
        echo "</li>";
    }
    if (isset($_GET['edit_berita'])) {
        $id = $_GET['edit_berita'];
        $sql = "SELECT * FROM berita WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <form action="admin_dashboard.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required><br>
            <textarea name="content" class="form-control" required><?php echo $row['content']; ?></textarea><br>
            <button type="submit" name="update_berita" class="btn btn-success">Simpan Perubahan</button>
        </form>
        <?php
    }
    ?>
</ul>

<hr>

<!-- Daftar Dokumen -->
<h3>Daftar Dokumen</h3>
<ul class="list-group">
    <?php
    $sql = "SELECT * FROM documents";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item'>";
        echo "<strong>" . $row['name'] . "</strong><br>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<a href='admin_dashboard.php?edit_dokumen=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a> ";
        echo "<a href='admin_dashboard.php?delete_dokumen=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a>";
        echo "</li>";
    }
    if (isset($_GET['edit_dokumen'])) {
        $id = $_GET['edit_dokumen'];
        $sql = "SELECT * FROM documents WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <form action="admin_dashboard.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required><br>
            <textarea name="description" class="form-control" required><?php echo $row['description']; ?></textarea><br>
            <button type="submit" name="update_dokumen" class="btn btn-success">Simpan Perubahan</button>
        </form>
        <?php
    }
    
    ?>
</ul>

<hr>
<!-- Menampilkan Daftar Kontak -->
<h3>Daftar Kontak</h3>
<ul class="list-group">
    <?php
    $sql = "SELECT * FROM kontak";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item'>";
        echo "<strong>" . $row['nama'] . "</strong><br>";
        echo "<p><strong>Alamat:</strong> " . $row['alamat'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>Telepon:</strong> " . $row['telepon'] . "</p>";
        echo "<p><strong>Ponsel:</strong> " . $row['ponsel'] . "</p>";
        echo "<a href='admin_dashboard.php?edit_kontak=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a> ";
        echo "<a href='admin_dashboard.php?delete_kontak=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a>";
        echo "</li>";
    }
    ?>
</ul>
<hr>

<!-- Daftar Video -->
<h3>Daftar Video</h3>
<?php
$sql = "SELECT * FROM videos";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    // Menambahkan parameter autoplay=1 pada URL video (untuk otomatis memutar video)
    $video_url_with_autoplay = $row['video_url'] . (strpos($row['video_url'], '?') === false ? '?' : '&') . 'autoplay=1';
    
    echo "<div class='card mb-3'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>" . htmlspecialchars($row['title']) . "</h5>";
    echo "<p class='card-text'>" . htmlspecialchars($row['description']) . "</p>";
    echo "<iframe width='560' height='315' src='" . htmlspecialchars($video_url_with_autoplay) . "' frameborder='0' allowfullscreen></iframe><br>";
    echo "<a href='admin_dashboard.php?edit_video=" . $row['id'] . "' class='btn btn-warning btn-sm mt-2'>Edit</a> ";
    echo "<a href='admin_dashboard.php?delete_video=" . $row['id'] . "' class='btn btn-danger btn-sm mt-2'>Hapus</a>";
    echo "</div>";
    echo "</div>";
}
?>


<?php
// Update Berita
if (isset($_POST['update_berita'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "UPDATE berita SET title = '$title', content = '$content' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Berita berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Update Dokumen
if (isset($_POST['update_dokumen'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sql = "UPDATE documents SET name = '$name', description = '$description' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Dokumen berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Update Video
if (isset($_POST['update_video'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $video_url = $_POST['video_url'];
    $description = $_POST['description'];
    $sql = "UPDATE videos SET title = '$title', video_url = '$video_url', description = '$description' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Video berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}



?>

    </div>
</body>
</html>

<?php
$conn->close();
?>
