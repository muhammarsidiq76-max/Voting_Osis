<?php
include "../header/config.php";

$calon = 0;
$current_page = basename($_SERVER['PHP_SELF']);

$data = false;

//ambil id dari url
//kalau url ada id ,simpen ke var $id
//kalau tidak ada, isi $var id dengan Null, jadi $id = Null
$Id_calon= $_GET['Id'] ?? null;

if($Id_calon){
    $query = mysqli_query($koneksi, "SELECT * from tbl_calon_ketua where Id_calon = '$Id_calon'");
    $calon = mysqli_fetch_assoc($query);

    //mysqli_fetch_assoc akan mengambil 1 baris data hasil dari $query
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nama = $_POST['Nama'];
    $Visi = $_POST['Visi'];
    $Misi = $_POST['Misi'];

    if ($_FILES['foto']['name'] != ""){
        $foto = $_FILES['foto']['name'];
        $tmp= $_FILES['foto']['tmp_name'];
    

    $folder ="../../assets";


    move_uploaded_file($tmp,
    $folder . $Foto);

    //update = foto

    $sql = "UPDATE tbl_calon_ketua SET
    
    Nama = '$Nama',
    Visi = '$Visi',
    Misi = '$Misi',
    Foto = '$Foto',
    WHERE Id_calon= '$Id_calon' ";
}else {
    $sql = "UPDATE tbl_calon_ketua SET
    
    Nama = '$Nama',
    Visi = '$Visi',
    Misi = '$Misi',
    WHERE Id_calon= '$Id_calon'";
}
  $data =  mysqli_query($koneksi, "update tbl_calon_ketua set Nama= '$Nama' , Visi= '$Visi' , Misi= '$Misi' , Foto= '$Foto'  where Id_calon= '$Id_calon'");


//update

    
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
                         <input type="text" class="form-control" name="Nama" value="<?= $calon['Nama']?>" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Visi</label>
                            <input type="text" class="form-control" name="Visi" value="<?= $calon['Visi']?>" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Misi</label>
                            <input type="text" class="form-control" name="Misi" value="<?= $calon['Misi']?>" required>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="Foto" value="<?= $calon['Foto']?>" required>
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