<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    require_once("koneksi.php");

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO user (username, password, email, nama_lengkap, alamat, role) 
          VALUES ('$username', '$password', '$email', '$namalengkap', '$alamat', 'user')";

    $sql = mysqli_query($koneksi, $query);

    if($sql) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Pendaftaran Berhasil',
                    icon: 'success'
                }).then(function() {
                    window.location.href = '../index.php';
                });
            });
        </script>";
    }
?>