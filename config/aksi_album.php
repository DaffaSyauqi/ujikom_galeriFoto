<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    session_start();
    require_once("koneksi.php");
    $role = $_SESSION['role'];

    if(isset($_POST['tambah'])) {
        $namaalbum = $_POST['namaalbum'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = date('Y-m-d');
        $userid = $_SESSION['userid'];

        $query = "INSERT INTO album (nama_album, deskripsi, tanggal_dibuat, id_user) 
          VALUES ('$namaalbum', '$deskripsi', '$tanggal', '$userid')";

        $sql = mysqli_query($koneksi, $query);

        if ($role == 'admin') {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Ditambahkan',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../admin/album.php';
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
                        window.location.href = '../user/album.php';
                    });
                });
            </script>";
        }
    }

    if(isset($_POST['edit'])) {
        $albumid = $_POST['albumid'];
        $namaalbum = $_POST['namaalbum'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = date('Y-m-d');
        $userid = $_SESSION['userid'];

        $query = "UPDATE album SET nama_album='$namaalbum', deskripsi='$deskripsi', tanggal_dibuat='$tanggal' WHERE id_album='$albumid'";

        $sql = mysqli_query($koneksi, $query);

        if ($role == 'admin') {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Diperbarui',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../admin/album.php';
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
                        window.location.href = '../user/album.php';
                    });
                });
            </script>";
        }
    }

    if(isset($_POST['hapus'])) {
        $albumid = $_POST['albumid'];

        $query = "DELETE FROM album WHERE id_album='$albumid'";

        $sql = mysqli_query($koneksi, $query);

        if ($role == 'admin') {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Dihapus',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../admin/album.php';
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
                        window.location.href = '../user/album.php';
                    });
                });
            </script>";
        }
    }
?>