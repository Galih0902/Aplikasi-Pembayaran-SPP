<?php
include('koneksi.php');

// Menghitung jumlah siswa
$query_jumlah_siswa = "SELECT COUNT(*) as total_siswa FROM siswa";
$result_jumlah_siswa = mysqli_query($koneksi, $query_jumlah_siswa);
$data_jumlah_siswa = mysqli_fetch_assoc($result_jumlah_siswa);
$total_siswa = $data_jumlah_siswa['total_siswa'];

// Menghitung jumlah kelas
$query_jumlah_kelas = "SELECT COUNT(*) as total_kelas FROM kelas";
$result_jumlah_kelas = mysqli_query($koneksi, $query_jumlah_kelas);
$data_jumlah_kelas = mysqli_fetch_assoc($result_jumlah_kelas);
$total_kelas = $data_jumlah_kelas['total_kelas'];

?>

<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
  <?php
  include('tampilan/header.php');
  include('tampilan/sidebar.php');
  include('tampilan/footer.php');
  ?>

  <!-- Main Content -->
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>DATA SISWA & DATA KELAS</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
          <div class="breadcrumb-item text-primary"><a href="siswa.php">Data Siswa</a></div>
          <div class="breadcrumb-item text-primary"><a href="kelas.php">Data Kelas</a></div>
        </div>
      </div>

      <!-- Menampilkan jumlah siswa dan kelas -->
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <a href="siswa.php" style="text-decoration: none;">
                <div class="card-body">
                  <h4 class="card-title">JUMLAH SISWA</h4>
                  <h1 class="card-text"><?php echo $total_siswa; ?></h1>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <a href="kelas.php" style="text-decoration: none;">
                <div class="card-body">
                  <h4 class="card-title">JUMLAH KELAS</h4>
                  <h1 class="card-text"><?php echo $total_kelas; ?></h1>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <!-- Tabel siswa -->
          <div class="col-md-12">
            <div class="card">
              <!-- ... kode tabel siswa ... -->
            </div>
          </div>
        </div>
    </section>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>