<?php
    session_start();
    require_once("config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Galeri Foto</title>
    <link rel="stylesheet" href="assets/css/login-register.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container">
        <a class="fs-1 text-primary" href="index.php" style="text-decoration: none">Galeri Foto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
           
        </div>
        <button type="button" class="btn btn-primary m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#login">Masuk</button>
        <button type="button" class="btn btn-secondary m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#register">Daftar</button>
        </div>
    </div>
    </nav>

    <div class="container-img">
        <?php
            $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.id_user=user.id_user INNER JOIN album ON foto.id_album=album.id_album");
            while ($data = mysqli_fetch_array($query)) {
        ?>
        <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['id_foto'] ?>">
            <div class="box">
                <img src="assets/img/<?php echo $data['lokasi_file'] ?>" title="<?php echo $data['judul_foto'] ?>">
            </div>
        </a>
        <?php } ?>
    </div>

    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="wrapper">
                <p class="fs-3 text-center">Selamat Datang!</p>
                <form action="config/aksi_login.php" method="POST">
                    <div class="form-field d-flex align-items-center">
                        <span class="far fa-user"></span>
                        <input type="text" name="username" id="userName" placeholder="Username" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-key"></span>
                        <input type="password" name="password" id="pwd" placeholder="Password" required>
                    </div>
                    <button class="btn mt-3">Masuk</button>
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
            <form class="mt-3" action="config/aksi_register.php" method="POST">
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
                <button class="btn mt-3" name="kirim">Daftar</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>