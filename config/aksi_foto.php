<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    session_start();
    require_once("koneksi.php");
    $role = $_SESSION['role'];

    if(isset($_POST['tambah'])) {
        $judulfoto = $_POST['judulfoto'];
        $deskripsifoto = $_POST['deskripsifoto'];
        $tanggalunggah = date('Y-m-d');
        $albumid = $_POST['albumid'];
        $userid = $_SESSION['userid'];
        $foto = $_FILES['lokasifile']['name'];
        $tmp = $_FILES['lokasifile']['tmp_name'];
        $lokasi = '../assets/img/';
        $namafoto = rand(). '-'.$foto;

        move_uploaded_file($tmp, $lokasi.$namafoto);

        $query = "INSERT INTO foto (judul_foto, deskripsi_foto, tanggal_unggah, lokasi_file, id_album, id_user) 
          VALUES ('$judulfoto', '$deskripsifoto', '$tanggalunggah', '$namafoto', '$albumid', '$userid')";

        $sql = mysqli_query($koneksi, $query);

        if ($role == 'admin') {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Ditambahkan',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../admin/foto.php';
                    });
                });
            </script>";
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Ditambahkan',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../user/foto.php';
                    });
                });
            </script>";
        }
    }

    if(isset($_POST['edit'])) {
        $fotoid = $_POST['fotoid'];
        $judulfoto = $_POST['judulfoto'];
        $deskripsifoto = $_POST['deskripsifoto'];
        $tanggalunggah = date('Y-m-d');
        $albumid = $_POST['albumid'];
        $userid = $_SESSION['userid'];
        $foto = $_FILES['lokasifile']['name'];
        $tmp = $_FILES['lokasifile']['tmp_name'];
        $lokasi = '../assets/img/';
        $namafoto = rand(). '-'.$foto;

        if($foto == null) {
            $query = "UPDATE foto SET judul_foto='$judulfoto', deskripsi_foto='$deskripsifoto', tanggal_unggah='$tanggalunggah', id_album='$albumid' WHERE id_foto='$fotoid'";
            $sql = mysqli_query($koneksi, $query);
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE id_foto='$fotoid'");

            $data = mysqli_fetch_array($query);
            if(is_file('../assets/img/'.$data['lokasi_file'])) {
                unlink('../assets/img/'.$data['lokasi_file']);
            }
            move_uploaded_file($tmp, $lokasi.$namafoto);
            $sql = mysqli_query($koneksi, "UPDATE foto SET judul_foto='$judulfoto', deskripsi_foto='$deskripsifoto', tanggal_unggah='$tanggalunggah', lokasi_file='$namafoto', id_album='$albumid' WHERE id_foto='$fotoid'");
        }

        if ($role == 'admin') {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Diperbarui',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../admin/foto.php';
                    });
                });
            </script>";
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Diperbarui',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../user/foto.php';
                    });
                });
            </script>";
        }
    }

    if(isset($_POST['hapus'])) {
        $fotoid = $_POST['fotoid'];

        $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE id_foto='$fotoid'");
        $data = mysqli_fetch_array($query);
        if(is_file('../assets/img/'.$data['lokasi_file'])) {
            unlink('../assets/img/'.$data['lokasi_file']);
        }

        $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE id_foto='$fotoid'");

        if ($role == 'admin') {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Dihapus',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../admin/foto.php';
                    });
                });
            </script>";
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Dihapus',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../user/foto.php';
                    });
                });
            </script>";
        }
    }
?>