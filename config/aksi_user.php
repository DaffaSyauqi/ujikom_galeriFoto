<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    session_start();
    require_once("koneksi.php");

    if(isset($_POST['tambah'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $namalengkap = $_POST['namalengkap'];
        $alamat = $_POST['alamat'];
        $role = $_POST['role'];

        $query = "INSERT INTO user (username, password, email, nama_lengkap, alamat, role) 
          VALUES ('$username', '$password', '$email', '$namalengkap', '$alamat', '$role')";

        $sql = mysqli_query($koneksi, $query);

        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data Berhasil Ditambahkan',
                    icon: 'success'
                }).then(function() {
                    window.location.href = '../admin/user.php';
                });
            });
        </script>";
    }

    if(isset($_POST['edit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $namalengkap = $_POST['namalengkap'];
        $alamat = $_POST['alamat'];
        $role = $_POST['role'];
        $userid = $_POST['userid'];

        $query = "UPDATE user SET username='$username', email='$email', nama_lengkap='$namalengkap', alamat='$alamat', role='$role' WHERE id_user='$userid'";

        $sql = mysqli_query($koneksi, $query);

        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data Berhasil Diperbarui',
                    icon: 'success'
                }).then(function() {
                    window.location.href = '../admin/user.php';
                });
            });
        </script>";
    }

    if(isset($_POST['hapus'])) {
        $userid = $_POST['userid'];

        $query = "DELETE FROM user WHERE id_user='$userid'";

        $sql = mysqli_query($koneksi, $query);

        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data Berhasil Dihapus',
                    icon: 'success'
                }).then(function() {
                    window.location.href = '../admin/user.php';
                });
            });
        </script>";
    }
?>