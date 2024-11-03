<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    session_start();
    require_once("koneksi.php");
    $role = $_SESSION['role'];

    $fotoid = $_POST['fotoid'];
    $userid = $_SESSION['userid'];
    $isikomentar = $_POST['isikomentar'];
    $tanggalkomentar = date('Y-m-d');

    $query = "INSERT INTO komentar_foto (id_foto, id_user, isi_komentar, tanggal_komentar) VALUES ('$fotoid', '$userid', '$isikomentar', '$tanggalkomentar')";

    $sql = mysqli_query($koneksi, $query);

    if ($role == 'admin') {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Komentar Berhasil Ditambahkan',
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
                    title: 'Berhasil!',
                    text: 'Komentar Berhasil Ditambahkan',
                    icon: 'success'
                }).then(function() {
                    window.location.href = '../user/index.php';
                });
            });
        </script>";
    }
?>