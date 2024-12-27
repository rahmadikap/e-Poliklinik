<?php
session_start(); // Start the session
include '../../koneksi.php'; // Include your database connection

// Check if the user is logged in and has the right role
if (!isset($_SESSION['akses']) || !isset($_SESSION['username'])) {
    echo '<script>';
    echo 'alert("Anda tidak memiliki akses untuk melakukan ini.");';
    echo 'window.location.href = "../../login.php";'; // Redirect to the login page
    echo '</script>';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $password = $_POST["password"]; // Get the password from the form
    //password di has simpan di db password
    
    // Get the user's role from the session
    $role = $_SESSION['akses'];
    $loggedInDoctorId = $_SESSION['id']; // Assuming this is the logged-in doctor's ID

    // Prepare the base update query
    $query = "UPDATE dokter SET 
        nama = '$nama', 
        alamat = '$alamat',
        no_hp = '$no_hp'";

    // Check if the password is provided and hash it
    if (!empty($password)) {
        $hashedPassword = md5($password); // Hash the password using MD5
        $query .= ", password = '$hashedPassword'"; // Add password update to the query
    }

    if ($role === 'admin') {
        // Admin can update all fields including poli
        $poli = $_POST["poli"];
        $query .= ", id_poli = '$poli'"; // Add poli update to the query
    } elseif ($role === 'dokter') {
        // Dokter can only update their own data without changing poli
        if ($id != $loggedInDoctorId) {
            echo '<script>';
            echo 'alert("Anda tidak memiliki akses untuk mengubah data dokter lain.");';
            echo 'window.location.href = "../../dokter.php";'; // Redirect to the doctor page
            echo '</script>';
            exit();
        }
    } else {
        // Handle unauthorized access
        echo '<script>';
        echo 'alert("Anda tidak memiliki akses untuk melakukan ini.");';
        echo 'window.location.href = "../../login.php";'; // Redirect to the login page
        echo '</script>';
        exit();
    }

    // Complete the query with the WHERE clause
    $query .= " WHERE id = '$id'";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, redirect kembali ke halaman index atau sesuaikan dengan kebutuhan Anda
        echo '<script>';
        echo 'alert("Data dokter berhasil diubah!");';
        echo 'window.location.href = "../../dokter.php";';
        echo '</script>';
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
?>