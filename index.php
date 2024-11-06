<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
        <div class="container">
            <a class="fs-1 text-danger" href="index.php" style="text-decoration: none">Galeri Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto"></div>
                <button type="button" class="btn btn-danger m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#login">Masuk</button>
                <button type="button" class="btn btn-secondary m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#register">Daftar</button>
            </div>
        </div>
    </nav>

    <section class="hero-section text-white text-center d-flex align-items-center justify-content-center" style="background-color: #dc3545; height: 100vh;">
        <div class="container">
            <h1 class="display-4 fw-bold">Temukan Inspirasi Tak Terbatas</h1>
            <p class="lead mb-4">Platform untuk berbagi dan menemukan gambar menarik.</p>
            <a href="#about" class="btn btn-light btn-lg rounded-pill">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    <section id="about" class="hero-section text-dark text-center d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="container text-center">
            <h2 class="mb-4">Tentang Galeri Foto</h2>
            <p class="lead">Galeri Foto adalah platform untuk menyimpan, berbagi, dan menemukan inspirasi visual melalui berbagai koleksi gambar.</p>
        </div>
    </section>

    <section class="hero-section text-dark text-center d-flex align-items-center justify-content-center" style="background-color: #6c757d; height: 100vh;">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4 text-white">Contoh Gambar</h1>
            <div class="row">
                <div class="col-md-4 mb-3">
                        <div class="card border-0">
                            <img src="assets/img/50448647-Chainsaw Man.png" class="card-img-top" alt="Gambar 1" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Animation</h5>
                            </div>
                        </div>
                </div>
                <div class="col-md-4 mb-3">
                        <div class="card border-0">
                            <img src="assets/img/341911571-A List of Artificial Intelligence (AI) Tools for Personal use - 2024.jpg" class="card-img-top" alt="Gambar 2" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Tech</h5>
                            </div>
                        </div>
                </div>
                <div class="col-md-4 mb-3">
                        <div class="card border-0">
                            <img src="assets/img/1813310077-pemandangan indah.jpg" class="card-img-top" alt="Gambar 3" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Pemandangan</h5>
                            </div>
                        </div>
                </div>
            </div>
            <a href="gambar.php" class="btn btn-light btn-lg rounded-pill mt-4">Lihat Gambar Lainnya</a>
        </div>
    </section>

    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="wrapper">
                    <p class="fs-3 text-center">Selamat Datang!</p>
                    <form action="config/aksi_login.php" method="POST">
                        <div class="form-field d-flex align-items-center">
                            <input type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-field d-flex align-items-center">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <button class="btn btn-danger mt-3">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="wrapper">
                    <p class="fs-3 text-center">Selamat Datang!</p>
                    <form action="config/aksi_register.php" method="POST">
                        <div class="form-field d-flex align-items-center">
                            <input type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-field d-flex align-items-center">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-field d-flex align-items-center">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-field d-flex align-items-center">
                            <input type="text" name="namalengkap" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-field d-flex align-items-center">
                            <input type="text" name="alamat" placeholder="Alamat" required>
                        </div>
                        <button class="btn btn-secondary mt-3" name="kirim">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
