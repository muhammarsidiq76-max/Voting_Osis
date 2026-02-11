<?php
include "header.php";
include "config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Nama = $_POST['Nama'];
    $Alamat = $_POST['Alamat'];

    mysqli_query($koneksi, "INSERT INTO tbl_admin( Username, Password, Nama, Alamat) VALUES ('$Username','$Password','$Nama','$Alamat')");
}

$current_page = basename(
  $_SERVER['PHP_SELF']);
?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Akun Admin</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-0 ms-3">
            <form method="POST">
                        <div class="mb-3 ms-3 me-3">
                            <label>Username</label>
                            <input type="text" class="form-control" name="Username" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Password</label>
                            <input type="text" class="form-control" name="Password" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="Nama" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="Alamat" required>
                        </div>

                        <button class="btn btn-primary w-100 me-3">
                           Kirim
                        </button>
            </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
                