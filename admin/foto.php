<?php
    session_start();
    require_once("../config/koneksi.php");
    if($_SESSION['status'] != 'login') {
        echo "<script>
            alert('Anda belum login');
            location.href='../index.php';
        </script>";
    }

    $userid = $_SESSION['userid'];
    $nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto</title>
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
                    <a href="album.php" class="nav-link">Album</a>
                    <a href="foto.php" class="nav-link active">Foto</a>
                    <a href="user.php" class="nav-link">User</a>
                    </div>
                    <p class="m-1">Hello, <?php echo $nama ?></p>
                    <a href="../config/aksi_logout.php" class="btn btn-danger m-1 rounded-pill">Keluar</a>
                </div>
        </div>
    </nav>

    <div class="container pt-3">
        <p class="fs-2 text-center">Data Foto</p>

        <div class="row justify-content-end pt-3">
            <div class="col-auto">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Foto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                <label for="" class="form-label">Judul Foto</label>
                                <input type="text" class="form-control" name="judulfoto" required>
                                <label for="" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsifoto" required></textarea>
                                <label for="" class="form-label">Album</label>
                                <select class="form-control" name="albumid" required>
                                    <?php
                                        $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE id_user='$userid'");
                                        while($data_album = mysqli_fetch_array($sql_album)) { ?>
                                            <option value="<?php echo $data_album['id_album'] ?>">
                                                <?php echo $data_album['nama_album'] ?>
                                            </option>
                                    <?php } ?>
                                </select>
                                <label for="" class="form-label">File</label>
                                <input type="file" class="form-control" name="lokasifile" required>
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
                        <th>Foto</th>
                        <th>Judul Foto</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Akun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                        $no = 1;
                        $query = "SELECT * from foto INNER JOIN user ON foto.id_user=user.id_user";
                        $sql = mysqli_query($koneksi, $query);
                        while($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><img src="../assets/img/<?php echo $data['lokasi_file'] ?>" width="100"></td>
                        <td><?php echo $data['judul_foto'] ?></td>
                        <td><?php echo $data['deskripsi_foto'] ?></td>
                        <td><?php echo $data['tanggal_unggah'] ?></td>
                        <td><?php echo $data['nama_lengkap'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_foto']?>">Edit</button>
                            <div class="modal fade" id="edit<?php echo $data['id_foto']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="fotoid" value="<?php echo $data['id_foto']?>">
                                            <label for="" class="form-label">Judul Foto</label>
                                            <input type="text" class="form-control" name="judulfoto" value="<?php echo $data['judul_foto'] ?>" required>
                                            <label for="" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsifoto" required><?php echo $data['deskripsi_foto'] ?></textarea>
                                            <label for="" class="form-label">Album</label>
                                            <select class="form-control" name="albumid">
                                                <?php
                                                    $query_album = "SELECT * FROM album WHERE id_user='$userid'";

                                                    $sql_album = mysqli_query($koneksi, $query_album);
                                                    while($data_album = mysqli_fetch_array($sql_album)) { ?>
                                                        <option <?php if($data_album['id_album'] == $data['id_album']) { ?> selected="selected" <?php } ?>value="<?php echo $data_album['id_album'] ?>">
                                                            <?php echo $data_album['nama_album'] ?>
                                                        </option>
                                                <?php } ?>
                                            </select>
                                            <div class="row pt-3">
                                                <div class="col-md-4">
                                                    <img src="../assets/img/<?php echo $data['lokasi_file'] ?>" width="100">
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="" class="form-label">Ganti File</label>
                                                    <input type="file" class="form-control" name="lokasifile">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning" name="edit">Edit Data</button>
                                        </form>`
                                    </div>
                                </div>
                            </div>
                            </div>
                        
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_foto']?>">Hapus</button>
                            <div class="modal fade" id="hapus<?php echo $data['id_foto']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Foto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../config/aksi_foto.php" method="POST">
                                            <input type="hidden" name="fotoid" value="<?php echo $data['id_foto']?>">
                                            Apakah anda yakin akan menghapus data <strong><?php echo $data['judul_foto']?></strong> ?
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
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>