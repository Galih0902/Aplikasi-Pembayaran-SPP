<?php
include 'koneksi.php';
$id = $_GET["id"];

// Hapus terlebih dahulu baris-baris terkait dari tabel 'siswa'
$query_siswa = "DELETE FROM siswa WHERE id_kelas='$id'";
$hasil_query_siswa = mysqli_query($koneksi, $query_siswa);

// Periksa query siswa, apakah ada kesalahan
if (!$hasil_query_siswa) {
  die("Gagal menghapus data siswa: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
}

// Setelah menghapus data siswa terkait, lakukan penghapusan pada tabel 'kelas'
$query_kelas = "DELETE FROM kelas WHERE id_kelas='$id'";
$hasil_query_kelas = mysqli_query($koneksi, $query_kelas);

// Periksa query kelas, apakah ada kesalahan
if (!$hasil_query_kelas) {
  die("Gagal menghapus data kelas: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='kelas.php';</script>";
}
