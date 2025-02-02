<!DOCTYPE html>
<?php
    session_start();
    require 'koneksi.php';
    $id_dokter = $_SESSION ['id'];
    $username = $_SESSION['username'];
    $user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null; // Get user role or null

$user_role = $_SESSION['akses']; // Ambil peran pengguna dari session

// Cek apakah username kosong
if (empty($username)) {
    header("location:login.p\hp");
    exit();
}


    // Check user role and display content accordingly
    if ($user_role === 'admin') {
        // Admin specific code
    } elseif ($user_role === 'dokter') {
        // Doctor specific code
    } else {
        // Handle unauthorized access or default behavior
    }

    if ($username == "") {
        header("location:login.php");
    }
    
    if (session_status() === PHP_SESSION_NONE) {
        //session_name('adminlte_session'); // Nama unik untuk session
        session_start();
    }

    // Validasi session dan role pengguna
    if (!isset($_SESSION['akses']) || !isset($_SESSION['username'])) {
        // Redirect ke halaman login jika session tidak ada
        header('Location: login.php');
        exit();
    }
    //$loggedInDoctorId = $_SESSION['id'];

    $role = $_SESSION['akses'];
    $username = $_SESSION['username'];
    // Cek apakah pengguna sudah login dan memiliki peran

    // else if ($$_SESSION['akses'] != "admin") {
    //     echo '<script>alert("Anda tidak memiliki akses");window.location.href="login.php";</script>';
    //     $idDokter = $_SESSION['id'];
    // }
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Udinus Poliklinik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include ('components/navbar.php') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include ('components/sidebar.php') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include ('page/dokter/index.php') ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>