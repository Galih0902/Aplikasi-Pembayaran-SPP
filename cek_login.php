<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyiapkan pernyataan SQL
$stmt = $koneksi->prepare("SELECT * FROM petugas WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// menghitung jumlah data yang ditemukan
$cek = $result->num_rows;

// cek apakah username dan password di temukan pada database
if ($cek > 0) {
    $data = $result->fetch_assoc();

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:dashboard.php");
    } elseif ($data['level'] == "petugas") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "petugas";
        // alihkan ke halaman dashboard petugas
        header("location:dashboard.php");
    } elseif ($data['level'] == "siswa") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "siswa";
        // alihkan ke halaman dashboard siswa
        header("location:history.php");
    } else {
        // alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
