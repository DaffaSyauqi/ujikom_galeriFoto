<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    session_start();
    require_once("koneksi.php");

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $sql = mysqli_query($koneksi, $query);
    $cek = mysqli_num_rows($sql);

    if ($cek > 0) {
        $data = mysqli_fetch_array($sql);

        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama_lengkap'];
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['status'] = 'login';
        $_SESSION['role'] = $data['role'];

        if ($data['role'] == 'admin') {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Selamat Datang!',
                        text: 'Anda berhasil masuk',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../admin/index.php';
                    });
                });
            </script>";
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Selamat Datang!',
                        text: 'Anda berhasil masuk',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '../user/index.php';
                    });
                });
            </script>";
        }
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Gagal Masuk!',
                    text: 'Username atau password salah',
                    icon: 'error'
                }).then(function() {
                    window.location.href = '../index.php';
                });
            });
        </script>";
    }
?>
