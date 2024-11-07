<?php
    session_start();
    require_once("../config/koneksi.php");

    if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
        echo "<script>
            window.addEventListener('load', function() {
                Swal.fire({
                    title: 'Gagal Masuk!',
                    text: 'Anda Belum Login',
                    icon: 'error'
                }).then(function() {
                    window.location.href = '../index.php';
                });
            });
        </script>";
        exit();
    }

    $userid = $_SESSION['userid'];
    $nama = $_SESSION['nama'];

    $limit = 8;

    $query_total = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM foto WHERE id_user='$userid'");
    $data_total = mysqli_fetch_assoc($query_total);
    $total_data = $data_total['total'];

    $total_pages = ceil($total_data / $limit);

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE id_user='$userid' LIMIT $start, $limit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
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
                    <a href="galeri.php" class="nav-link active">Galeri</a>
                    <a href="album.php" class="nav-link">Album</a>
                    <a href="foto.php" class="nav-link">Foto</a>
                </div>
                <p class="m-1">Hello, <?php echo $nama ?></p>
                <a href="../config/aksi_logout.php" class="btn btn-danger m-1 rounded-pill">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container pt-5 mt-4">
        <div class="row">
            <?php while($data = mysqli_fetch_array($query)) { ?>
                <div class="col-md-3 mt-2">
                    <div class="card shadow-lg mb-4">
                        <img src="../assets/img/<?php echo $data['lokasi_file']?>" 
                             class="card-img-top" 
                             title="<?php echo $data['judul_foto']?>" 
                             style="height:15rem; object-fit:cover; border-radius:8px 8px 0 0;">
                        <div class="card-body text-center">
                            <h6 class="card-title text-truncate"><?php echo $data['judul_foto'] ?></h6>
                        </div>
                        <div class="card-footer text-center">
                            <div class="mb-2">
                                <a class="text-danger"><i class="fa fa-heart"></i></a>
                                <?php 
                                    $fotoid = $data['id_foto'];
                                    $like = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE id_foto='$fotoid'");
                                    echo "<span>" . mysqli_num_rows($like) . " Suka</span>";
                                ?>
                            </div>
                            <div>
                                <a class="text-primary"><i class="fa fa-comment"></i></a>
                                <?php
                                    $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentar_foto WHERE id_foto='$fotoid'");
                                    echo "<span>" . mysqli_num_rows($jmlkomen) . " Komentar</span>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        
        <?php if ($total_pages > 1): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mt-4">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
    
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
