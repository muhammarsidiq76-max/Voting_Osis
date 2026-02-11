
<?php
include "../header/config.php";


//ambil id dari url
//kalau url ada id ,simpen ke var $id
//kalau tidak ada, isi $var id dengan Null, jadi $id = Null
$id_siswa= $_GET['id'] ?? null;


if($id_siswa){
    $query = mysqli_query($koneksi, "SELECT * from tbl_siswa where id_siswa = '$id_siswa'");
    $siswa = mysqli_fetch_assoc($query);

    //mysqli_fetch_assoc akan mengambil 1 baris data hasil dari $query
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

   mysqli_query($koneksi, "update tbl_siswa set nama= '$nama' , kelas= '$kelas' , jurusan= '$jurusan' , alamat= '$alamat' where id_siswa= '$id_siswa'");
}


//Update



if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO tbl_siswa( Nama, Kelas, Jurusan, Alamat) VALUES ('$nama','$kelas','$jurusan','$alamat')");
    
    $current_page = basename(
      $_SERVER['PHP_SELF']);
}

$data = false;

$current_page = basename($_SERVER['PHP_SELF']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $data = mysqli_query($koneksi, "INSERT INTO tbl_siswa( Nama, Kelas, Jurusan, Alamat) VALUES ('$nama','$kelas','$jurusan','$alamat')");
    
    if ($data){
      $data = true;
    }

}

include "../header/header.php";
?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Siswa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-0 ms-3">
            <form method="POST">
                        <div class="mb-3 pb-0 ms-3 me-3">
                            <label>Nama</label>
                         <input type="text" class="form-control" name="nama" value="<?= $siswa['Nama']?>" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Kelas</label>
                            <input type="text" class="form-control" name="kelas" value="<?= $siswa['Kelas']?>" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" value="<?= $siswa['Jurusan']?>" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $siswa['Alamat']?>" required>
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

<?php if($data) { ?>
      
      <script>
        Swal.fire({
          title: "Berhasil!",
          text: "Kamu telah klik tombol!",
          icon: "success",
          showConfirmButton: false,
          timer: 2000
        }).then(() => {
          window.location.href = "siswa.php";
        })
        ;
      </script>
<?php } ?>