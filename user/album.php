<?php
    session_start();
    require_once("../config/koneksi.php");
    if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
        echo "<script>
            window.addEventListener('load', function() {
                Swal.fire({
                    title: 'Gagal Masuk!',
                    text: 'Anda Belum Login',
                    icon: 'error'
                }).then(function() {
                    window.location.href = '../index.php';
                });
            });
        </script>";
        exit();
    }
    
    $nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
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
           <a href="album.php" class="nav-link active">Album</a>
           <a href="foto.php" class="nav-link">Foto</a>
        </div>
        <p class="m-1">Hello, <?php echo $nama ?></p>
        <a href="../config/aksi_logout.php" class="btn btn-danger m-1 rounded-pill">Keluar</a>
        </div>
    </div>
    </nav>

    <div class="container pt-3">
        <p class="fs-2 text-center">Data Album</p>

        <div class="row justify-content-end pt-3">
            <div class="col-auto">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Album</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="../config/aksi_album.php" method="POST">
                                <label for="" class="form-label">Nama Album</label>
                                <input type="text" class="form-control" name="namaalbum" required>
                                <label for="" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success mt-2" name="tambah">Tambah</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>

        <div class="row pt-3">
            <table class="table table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Album</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                        $no = 1;
                        $userid = $_SESSION['userid'];
                        $query = "SELECT * from album  WHERE id_user='$userid'";
                        $sql = mysqli_query($koneksi, $query);
                        while($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['nama_album'] ?></td>
                        <td><?php echo $data['deskripsi'] ?></td>
                        <td><?php echo $data['tanggal_dibuat'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_album']?>">Edit</button>
                            <div class="modal fade" id="edit<?php echo $data['id_album']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Album</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../config/aksi_album.php" method="POST">
                                        <input type="hidden" name="albumid" value="<?php echo $data['id_album']?>">
                                        <label for="" class="form-label">Nama Album</label>
                                        <input type="text" class="form-control" name="namaalbum" value="<?php echo $data['nama_album'] ?>" required>
                                        <label for="" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" required><?php echo $data['deskripsi'] ?></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning" name="edit">Edit</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_album']?>">Hapus</button>
                            <div class="modal fade" id="hapus<?php echo $data['id_album']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Album</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../config/aksi_album.php" method="POST">
                                        <input type="hidden" name="albumid" value="<?php echo $data['id_album']?>">
                                        Apakah anda yakin akan menghapus data <strong><?php echo $data['nama_album']?></strong> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>