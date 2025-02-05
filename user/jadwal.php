<?php
session_start();
require "../functions.php";
require "../session.php";
if ($role !== 'User') {
  header("location:../login.php");
};

$id_user = $_SESSION["id_user"];
$id_lpg = $_GET["id"];

$sewa = query("SELECT sewa.*, lapangan.nama, user.nama_lengkap
FROM sewa
JOIN lapangan ON sewa.id_lapangan = lapangan.id_lapangan
LEFT JOIN user ON sewa.id_user = user.id_user
WHERE lapangan.id_lapangan = '$id_lpg'
");
$profil = query("SELECT * FROM user WHERE id_user = '$id_user'")[0];


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jadwal Lapangan</title>
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <!-- Navbar -->
  <div class="container ">
    <nav class="navbar fixed-top bg-body-secondary navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="../kon1.png" alt="Logo" width="70" height="70" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="lapangan.php">Lapangan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="bayar.php">Pembayaran</a>
            </li>
          </ul>
          <?php
          if (isset($_SESSION['id_user'])) {
            // jika user telah login, tampilkan tombol profil dan sembunyikan tombol login
            echo '<a href="" data-bs-toggle="modal" data-bs-target="#profilModal" class="btn btn-inti"><i data-feather="user"></i></a>';
          } else {
            // jika user belum login, tampilkan tombol login dan sembunyikan tombol profil
            echo '<a href="login.php" class="btn btn-inti" type="submit">Login</a>';
          }
          ?>
        </div>
      </div>
    </nav>
  </div>
  <!-- End Navbar -->
  <?php include '../edit_profit_modal.php'?>

  <section class="lapangan mb-5" id="lapangan">
    <div class="container-fluid">
      <h2 class="text-head"><span>Jadwal</span> Lapangan </h2>
      <form action="" method="post" class="px-4">
        <table class="table my-5">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal Pesan</th>
              <th scope="col">Nama Pemesan</th>
              <th scope="col">Nama Lapangan</th>
              <th scope="col">Jam Main</th>
              <th scope="col">Lama Sewa</th>
              <th scope="col">jam Habis</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($sewa as $row) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $row["tanggal_pesan"] ?></td>
                <td><?= $row["nama_lengkap"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["jam_mulai"] ?></td>
                <td><?= $row["lama_sewa"] ?></td>
                <td><?= $row["jam_habis"] ?></td>
                <!-- Modal Bayar -->
                <div class="modal fade" id="bayarModal<?= $row["id_sewa"] ?>" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Bayar Lapangan <?= $row["nama"]; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" method="post">
                        <input type="hidden" name="idsewa" value="<?= $row["id_sewa"]; ?>">
                        <div class="modal-body">
                          <!-- konten form modal -->
                          <div class="row justify-content-center align-items-center">
                            <div class="col">
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jam Main</label>
                                <input type="datetime-local" name="tgl_main" class="form-control" id="exampleInputPassword1" value="<?= $row["jam_mulai"]; ?>" disabled>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jam Habis</label>
                                <input type="datetime-local" name="jam_habis" class="form-control" id="exampleInputPassword1" value="<?= $row["jam_habis"]; ?>" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Lama Main</label>
                                <input type="number" name="jam_mulai" class="form-control" id="exampleInputPassword1" value="<?= $row["lama"]; ?>" disabled>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" id="exampleInputPassword1" value="<?= $row["harga"]; ?>" disabled>
                              </div>
                            </div>
                            <div class="input-group ">
                              <div class="input-group-prepend border border-danger">
                                <span class="input-group-text">Total</span>
                              </div>
                              <input type="number" name="total" class="form-control border border-danger" id="exampleInputPassword1" value="<?= $row["total"]; ?>" disabled>
                            </div>
                            <div class="mt-3">
                              <label for="exampleInputPassword1" class="form-label">Upload Bukti</label>
                              <input type="file" name="bukti" class="form-control" id="exampleInputPassword1">
                            </div>
                          </div>
                        </div>
                        <div class="mt-3 mx-3">
                          <h6 class=" text-center border border-danger">Status : Belum Bayar</h6>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-inti" name="bayar" id="bayar">Bayar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modal Bayar -->

                <!-- Modal Detail -->
                <div class="modal fade" id="detailModal<?= $row["id_sewa"] ?>" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Detail Pembayaran Lapangan <?= $row["nama"]; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" method="post">
                        <div class="modal-body">
                          <!-- konten form modal -->
                          <div class="row justify-content-center align-items-center">
                            <div class="col">
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jam Main</label>
                                <input type="datetime-local" name="tgl_main" class="form-control" id="exampleInputPassword1" value="<?= $row["jam_mulai"]; ?>" disabled>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jam Habis</label>
                                <input type="datetime-local" name="jam_habis" class="form-control" id="exampleInputPassword1" value="<?= $row["jam_habis"]; ?>" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Lama Main</label>
                                <input type="number" name="jam_mulai" class="form-control" id="exampleInputPassword1" value="<?= $row["lama_sewa"]; ?>" disabled>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" id="exampleInputPassword1" value="<?= $row["harga"]; ?>" disabled>
                              </div>
                            </div>
                            <div class="input-group ">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Total</span>
                              </div>
                              <input type="number" name="total" class="form-control " id="exampleInputPassword1" value="<?= $row["total"]; ?>" disabled>
                            </div>
                            <div class="mt-3">
                              <label for="exampleInputPassword1" class="form-label">Upload Bukti</label>
                              <input type="file" name="bukti" class="form-control" id="exampleInputPassword1">
                            </div>
                          </div>
                        </div>
                        <div class="mt-3 mx-3">
                          <h6 class="text-center border border-danger">Status : <?= $row["konfirmasi"]; ?></h6>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modal Detail -->

                <!-- Modal Hapus -->
                <div class="modal fade" id="hapusModal<?= $row["id_sewa"]; ?>" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus Data</h5>
                      </div>
                      <div class="modal-body">
                        <p>Anda yakin ingin menghapus data ini?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="./controller/hapus.php?id=<?= $row["id_sewa"] ?>" class="btn btn-danger">Hapus</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal Hapus -->

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </form>
    </div>
  </section>

  <!-- footer -->
  <footer class="fixed-bottom py-3 mt-5">
    <div class="social">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
    </div>

    <div class="links">
      <a href="#home">Home</a>
      <a href="#about">Lapangan</a>
      <a href="#menu">Pembayaran</a>
      <a href="#contact">Kontak</a>
    </div>

    <div class="credit">
      <p>Created by <a href="#">MuhammadSurya & NurHalizah</a> &copy; 2023</p>
    </div>
  </footer>
  <!-- End Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script>
    feather.replace();
  </script>
</body>

</html>