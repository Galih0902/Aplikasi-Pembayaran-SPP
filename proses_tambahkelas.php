<?php
// Memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Membaca data dari form
  $nama_kelas = $_POST['nama_kelas'];
  $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

  // Memeriksa apakah data telah diisi dengan benar
  if (!empty($nama_kelas) && !empty($kompetensi_keahlian)) {
    // Menghindari serangan SQL Injection
    $nama_kelas = mysqli_real_escape_string($koneksi, $nama_kelas);
    $kompetensi_keahlian = mysqli_real_escape_string($koneksi, $kompetensi_keahlian);

    // Menjalankan query INSERT
    $query = "INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES ('$nama_kelas', '$kompetensi_keahlian')";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dijalankan
    if ($result) {
      echo "<script>alert('Data berhasil ditambah.');window.location='kelas.php';</script>";
    } else {
      echo "Query gagal dijalankan: " . mysqli_error($koneksi);
    }
  } else {
    echo "Form harus diisi dengan lengkap!";
  }
}
