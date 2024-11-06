<?php
    session_start();
    require_once("../config/koneksi.php");
    if ($_SESSION['status'] != 'login') {
        echo "<script>
            alert('Anda belum login');
            location.href='../index.php';
        </script>";
    }

    $userid = $_SESSION['userid'];
    $nama = $_SESSION['nama'];
    $role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top navbar-custom shadow">
        <div class="container">
            <a class="fs-1 text-danger" href="index.php" style="text-decoration: none">Galeri Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a href="galeri.php" class="nav-link">Galeri</a>
                    <a href="album.php" class="nav-link">Album</a>
                    <a href="foto.php" class="nav-link">Foto</a>
                    <a href="user.php" class="nav-link">User</a>
                </div>
                <p class="m-1">Hello, <?php echo $nama ?></p>
                <a href="../config/aksi_logout.php" class="btn btn-danger m-1 rounded-pill">Keluar</a>
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
                <img src="../assets/img/<?php echo $data['lokasi_file'] ?>" title="<?php echo $data['judul_foto'] ?>">
            </div>
        </a>
        <div class="modal fade" id="komentar<?php echo $data['id_foto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="../assets/img/<?php echo $data['lokasi_file'] ?>" class="card-img-top" title="<?php echo $data['judul_foto'] ?>">
                            </div>
                            <div class="col-md-4">
                                <div class="m-2">
                                        <div class="icon-heart pt-3">
                                            <?php
                                                $fotoid = $data['id_foto'];
                                                $ceksuka = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE id_foto='$fotoid' AND id_user='$userid'");
                                                
                                                $like = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE id_foto='$fotoid'");
                                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                                                    <a style="float: right; color: red; text-decoration: none;" href="../config/proses_like.php?fotoid=<?php echo $data['id_foto'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart fa-2x"></i></a>
                                                <?php } else { ?>
                                                    <a style="float: right; color: red; text-decoration: none;" href="../config/proses_like.php?fotoid=<?php echo $data['id_foto'] ?>" type="submit" name="suka"><i class="fa fa-heart-o fa-2x"></i></a>
                                                <?php } ?>
                                            <div class="like-count">
                                                <?php echo mysqli_num_rows($like); ?>
                                            </div>
                                                
                                        </div>

                                        <div class="sticky pt-5 text-center">
                                        <strong><?php echo $data['judul_foto'] ?></strong><br>
                                            <span class="badge bg-secondary"><?php echo $data['nama_lengkap'] ?></span>
                                            <span class="badge bg-secondary"><?php echo $data['tanggal_unggah'] ?></span>
                                            <span class="badge bg-secondary"><?php echo $data['nama_album'] ?></span>
                                        </div>
                                        <hr>
                                        <p align="left">
                                            <?php echo $data['deskripsi_foto'] ?>
                                        </p>
                                        <hr>
                                        
                                        <?php
                                            $komentar = mysqli_query($koneksi, "SELECT * FROM komentar_foto INNER JOIN user ON komentar_foto.id_user=user.id_user WHERE komentar_foto.id_foto = '$fotoid'");
                                            while ($row = mysqli_fetch_array($komentar)) { ?>
                                                <p align="left">
                                                    <strong><?php echo $row['nama_lengkap'] ?> :</strong>
                                                    <?php echo $row['isi_komentar'] ?>
                                                    <?php if ($role == 'admin' || $row['id_user'] == $userid) { ?>
                                            <a style="float: right; color: red; text-decoration: none;" href="../config/hapus_komentar.php?komentarid=<?php echo $row['id_komentar'] ?>" type="submit" name="hapuskomen">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        <?php } ?>
                                                </p>
                                            <?php } ?>
                                            
                                        <hr>
                                        <div class="sticky-bottom">
                                            <form action="../config/proses_komentar.php" method="POST">
                                                <div class="input-group">
                                                    <input type="hidden" name="fotoid" value="<?php echo $data['id_foto'] ?>">
                                                    <input type="text" class="form-control" name="isikomentar" placeholder="Tambah Komentar" required>
                                                    <div class="input-group-prepend">
                                                        <button type="submit" class="btn btn-danger" name="kirimkomentar">Kirim</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
