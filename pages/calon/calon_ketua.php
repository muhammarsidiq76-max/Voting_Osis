<?php
include "../header/header.php";
include "../header/config.php";

$current_page = basename(
  $_SERVER['PHP_SELF']);
?>


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Calon Ketua</h6>
            </div>
            <button class="btn btn-outline-warning btn-sm w-100">
                           Tambah Calon
                        </button>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Visi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Misi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "select * from tbl_calon_ketua");
                    foreach($query as $data): 

                    ?>
                    <div class="d-flex">
                        <?$no++?>
                    </div>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../../assets<?= $data['Foto'] ?>" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $data['Nama']?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $data['Visi']?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?= $data['Misi']?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $data['Foto']?></span>
                      </td>
                      <td class="align-middle">
                      <a href="edit_calon.php?id=<?=$data['Id_calon'] ;?>" class="text-secondary font-weight-bold text-xs" 
                            data-toggle="tooltip" 
                            data-original-title="Edit calon_ketua">
                            <button class="btn btn-primary w-100 me-3">
                              Edit
                            </button>
                        </a>
                      </td>
                      <td class="align-middle">
                        <a href="#" class="text-secondary font-weight-bold text-xs" 
                            onclick="hapuscalon(<?= $data['Id_calon']?>)"
                            data-toggle="tooltip" 
                            data-original-title="Delete calon_ketua">
                            <button class="btn btn-danger w-100 me-3">
                              Delete
                            </button>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach?>

                    <script>
                      function hapussiswa(Id_calon){
                      Swal.fire({
                        title: "Apakah anda yakin?",
                        text: "File akan terhapus permanen!",
                        showDenyButton: true,
                        // showCancelButton: true,
                        confirmButtonText: "Ya!",
                        cancelButtonText: 'Batal',
                        // denyButtonText: `Batal!`,
                      }).then((result) => {
                        if (result.isConfirmed) {
                          window.location = 'delete_calon_ketua.php?id= ' + Id_siswa;
                          timer: 2000
                          Swal.fire("data berubah!", "", "success");
                        } else if (result.isDenied) {
                          Swal.fire("Data tidak berubah", "", "info");
                        }
                      });
                    }
                      </script>
                  </tbody>