<?php
include "../header/header.php";
include "../header/config.php";

$data = false;

$current_page = basename(
  $_SERVER['PHP_SELF']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nama = $_POST['Nama'];
    $Visi = $_POST['Visi'];
    $Misi = $_POST['Misi'];

    //lokasi tujuan foto
    $folder ="../../assets";

    //ambil data
    $namafile = $_FILES['Foto']['name'];
    $tmpfile = $_FILES['Foto']['tmp_name']; //ambil lokasi sementara

    //$_FILES['foto']['name'];
    //$_FILES adalah variabel-variabel bawaaan php untuk menampung data file yang di upload.
    //['foto'] : name yg ada di form , ['name'] untuk mengambil nama asli file yang di-upload oleh user.

    //bikin nama unik biar ga nabrak
    $namaBaru = time() . "_" . $namafile;

    //pindahkan nama file
    move_uploaded_file($tmpfile,
    $folder . $namaBaru);

    $data = mysqli_query($koneksi, "INSERT INTO tbl_calon_ketua( Nama, Visi, Misi, Foto ) VALUES ('$Nama','$Visi','$Misi','$namaBaru')");

    if ($data){
      $data = true;
    }
}


?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Calon </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-0 ms-3">
            <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3 ms-3 me-3">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="Nama" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Visi</label>
                            <input type="text" class="form-control" name="Visi" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Misi</label>
                            <input type="text" class="form-control" name="Misi" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="Foto" required>
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
          window.location.href = "calon_ketua.php";
        })
        ;
      </script>
<?php } ?>     