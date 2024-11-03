<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    session_start();
    session_destroy();

    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Sampai Jumpa Lagi!',
                    text: 'Anda Berhasil Keluar',
                    icon: 'success'
                }).then(function() {
                    window.location.href = '../index.php';
                });
            });
        </script>";
?>