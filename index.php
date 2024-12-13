<!DOCTYPE html>
<html lang="en">

<style>
    .client_section {
        padding: 50px 0;
        background-color: #f7f7f7;
        color: #333;
    }

    .heading_container {
        text-align: center;
        margin-bottom: 40px;
    }

    .heading_container h2 {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .testimonial-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 20px;
    }

    .card {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-content {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 20px;
        padding: 20px;
    }

    .img-box {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .img-box img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }

    .text-content {
        text-align: left;
    }

    .text-content h6 {
        font-size: 18px;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .location {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
    }

    .testimonial-text {
        font-size: 14px;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .card-content {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .img-box {
            justify-content: center;
            margin-bottom: 15px;
        }
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Poliklinik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="hold-transition login-page">
    <?php
    session_start();
    include_once 'navbar.php';

    // Fungsi untuk redirect ke halaman login jika belum login
    function redirectToLoginIfNotLoggedIn()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: loginAdmin.php");
            exit;
        }
    }

    ?>
    
    <div class="container mt-5">
        <div class="row justify-content-lg-center">
            <div class="col-md-6">
                <div class="card">
                <i class=""></i>
                    <div class="card-body">
                        <i class="fas fa-hospital fa-fw mb-3 text-primary" style="font-size: 34px;"></i>
                        <h3 class="">Pasien</h3>
                        <p class="card-text">Sebagai Pasien dapat melakukan registrasi terlebih dahulu untuk melakukan pendaftaran Pasien</p>
                        <a href="loginPasien.php" class="btn btn-primary btn-block">Masuk</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-user-md fa-fw mb-3 text-primary" style="font-size: 34px;"></i>
                        <h3 class="">Dokter</h3>
                        <p class="card-text">Sebagai Dokter dapat melakukan login terlebih dahulu untuk melakukan pelayanan kepada Pasien
                            dahulu</p>
                        <div class="d-grid">
                            <a href="loginUser.php" class="btn btn-primary btn-block">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-user-md fa-fw mb-3 text-primary" style="font-size: 34px;"></i>
                        <h3 class="">Admin</h3>
                        <p class="card-text">Sebagai Adminr dapat melakukan login terlebih dahulu untuk melakukan pelayanan kepada Pasien
                            dahulu</p>
                        <div class="d-grid">
                            <a href="loginUser.php" class="btn btn-primary btn-block">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>