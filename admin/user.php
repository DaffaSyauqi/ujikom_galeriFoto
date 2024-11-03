<?php
    session_start();
    require_once("../config/koneksi.php");
    $nama = $_SESSION['nama'];

    if($_SESSION['status'] != 'login') {
        echo "<script>
            alert('Anda belum login');
            location.href='../index.php';
        </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top navbar-custom shadow">
    <div class="container">
        <a class="fs-1 text-primary" href="index.php" style="text-decoration: none">Galeri Foto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
            <a href="galeri.php" class="nav-link">Galeri</a>
           <a href="album.php" class="nav-link">Album</a>
           <a href="foto.php" class="nav-link">Foto</a>
           <a href="user.php" class="nav-link active">User</a>
        </div>
        <p class="m-1">Hello, <?php echo $nama ?></p>
        <a href="../config/aksi_logout.php" class="btn btn-primary m-1 rounded-pill">Keluar</a>
        </div>
    </div>
    </nav>

    <div class="container pt-3">
        <p class="fs-2 text-center">Data User</p>

        <div class="row justify-content-end pt-3">
            <div class="col-auto">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="../config/aksi_user.php" method="POST">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required>
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" required>
                                <label for="" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="namalengkap" required>
                                <label for="" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" required>
                                <label for="" class="form-label">Role</label>
                                <select class="form-control" name="role" required>
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
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
                <thead >
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                        $no = 1;
                        $userid = $_SESSION['userid'];
                        $query = "SELECT * from user";
                        $sql = mysqli_query($koneksi, $query);
                        while($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr class="">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['username'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><?php echo $data['nama_lengkap'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td><?php echo $data['role'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_user']?>">Edit</button>
                            <div class="modal fade" id="edit<?php echo $data['id_user']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../config/aksi_user.php" method="POST">
                                            <input type="hidden" name="userid" value="<?php echo $data['id_user']?>">
                                            <label for="" class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?php echo $data['username']?>" required>
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $data['email']?>" required>
                                            <label for="" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="namalengkap" value="<?php echo $data['nama_lengkap']?>" required>
                                            <label for="" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']?>" required>
                                            <label for="" class="form-label">Role</label>
                                            <select class="form-control" name="role" required>
                                                <option value="" disabled selected>Pilih Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success mt-2" name="edit">Edit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_user']?>">Hapus</button>
                            <div class="modal fade" id="hapus<?php echo $data['id_user']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../config/aksi_user.php" method="POST">
                                        <input type="hidden" name="userid" value="<?php echo $data['id_user']?>">
                                        Apakah anda yakin akan menghapus data <strong><?php echo $data['nama_lengkap']?></strong> ?
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