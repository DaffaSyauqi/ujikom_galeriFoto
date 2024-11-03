<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    session_start();
    require_once("koneksi.php");

    $komentarid = $_GET['komentarid'];

    $query = "DELETE FROM komentar_foto WHERE id_komentar='$komentarid'";
    $sql = mysqli_query($koneksi, $query);

    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Komentar Berhasil Dihapus',
                icon: 'success'
            }).then(function() {
                window.location.href = '../admin/index.php';
            });
        });
    </script>"
?>