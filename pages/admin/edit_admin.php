<?php
include "config.php";


//ambil id dari url
//kalau url ada id ,simpen ke var $id
//kalau tidak ada, isi $var id dengan Null, jadi $id = Null
$data= $_GET['id'] ?? null;


if($admin){
    $query = mysqli_query($koneksi, "SELECT * from tbl_admin where Id_admin = '$Id_admin'");
    $data = mysqli_fetch_assoc($query);

    //mysqli_fetch_assoc akan mengambil 1 baris data hasil dari $query
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Nama = $_POST['Nama'];
    $Alamat = $_POST['Alamat'];

   mysqli_query($koneksi, "update tbl_admin set Username= '$Username' , Password= '$Password' , Nama= '$Nama' , Alamat= '$Alamat' where Id_admin= '$Id_admin'");
}


//Update



if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Nama = $_POST['Nama'];
    $Alamat = $_POST['Alamat'];

    mysqli_query($koneksi, "INSERT INTO tbl_admin( Username, Password, Nama, Alamat) VALUES ('$Username','$Password','$Nama','$Alamat')");
    
    
}

include "header.php";

$current_page = basename(
  $_SERVER['PHP_SELF']);
?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Admin</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-0 ms-3">
            <form method="POST">
                        <div class="mb-3 pb-0 ms-3 me-3">
                            <label>Username</label>
                         <input type="text" class="form-control" name="username" value="<?= $data['Username']?>" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Foto</label>
                            <input type="text" class="form-control" name="Foto" required>
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